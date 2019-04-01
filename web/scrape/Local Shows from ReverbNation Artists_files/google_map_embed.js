Reverb = window["Reverb"] || {}

Reverb.GMaps = (function($){

  var loaded = !1;
  var callbacks = [];
  var key = !1;

  var initialize = function(){
    if(!key){
      key = Reverb.config.google_key;
      if (!key) {
        throw new Error("cannot use google maps without an api key")
      }
    }
    require(["//maps.googleapis.com/maps/api/js?v=3&libraries=places&key="+key+"&callback=Reverb.GMaps.after_loaded"])
  }

  var public_methods = {
    after_loaded: function () {
      loaded = !0
      if (Reverb.log) Reverb.log("Google Map API loaded");
      var callback, maps = google.maps
      while( callback = callbacks.pop() ){
        callback.call(maps, maps)
      }
    },
    // Deprecated - no longer needed since loads key from Reverb.config.google_key
    ready: function(callback){
      if (loaded || (typeof google === 'object' && typeof google.maps === 'object')) {
        var maps = google.maps
        callback.call(maps, maps)
      }else{
        initialize() // normally, the block inside this function is called only once ( the selector condition in it will not pass at the second call )
        callbacks.push(callback)
      }
      return public_methods
    },
    setKey: function(api_key){
      key = api_key
      return public_methods
    }
  }

  return public_methods
})(jQuery)


Reverb.GoogleMapService = (function() {
  /**
   * Simply return json to style google maps
   * (optional)
   */
  function getStyles(styleType) {
    /**
     * Artist Profile overview/show tabs map
     */
    if(styleType === 'artist_profile') {
      return ([
        {
          "featureType": "administrative",
          "elementType": "labels.text.fill",
          "stylers": [{ "color": "#444444" }]
        },
        {
          "featureType": "landscape",
          "elementType": "all",
          "stylers": [{ "color": "#ffffff" }]
        },
        {
          "featureType": "poi",
          "elementType": "all",
          "stylers": [{ "visibility": "off" }]
        },
        {
          "featureType": "road",
          "elementType": "all",
          "stylers": [
            { "saturation": -100 },
            { "lightness": 45 }
          ]
        },
        /**
         * Trello: https://trello.com/c/OPfiHbA0
         */
        {
          "featureType": "road",
          "elementType": "geometry",
          "stylers": [
            { "color": "#ffffc0" },
            { "saturation": -100 },
            { "lightness": 40 },
            { "visibility": "on" }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "all",
          "stylers": [{ "visibility": "simplified" }]
        },
        {
          "featureType": "road.arterial",
          "elementType": "labels.icon",
          "stylers": [{ "visibility": "off" }]
        },
        {
          "featureType": "transit",
          "elementType": "all",
          "stylers": [{ "visibility": "off" }]
        },
        {
          "featureType": "water",
          "elementType": "all",
          "stylers": [
            { "color": "#46bcec" },
            { "visibility": "on" }
          ]
        }
      ]);
    }
  }

  return {
    getStyles: getStyles
  }
})();


var map, marker, g_bChangeLocationCallback;

function unloadMap(){
  if (map){
    var container = map.getDiv()
    try{
      if ( container.hasChildNodes() ){
        while ( container.childNodes.length > 0 ){
          container.removeChild( container.firstChild )
        }
        container.cssText = ""
      }

    }catch(e){}
    map = null

  }

}
if( typeof can_maintain == "undefined" ){
  can_maintain = !1
}

//For Venue locations
//TODO - probably should encapsulate these into an object
function initMapLoaderForVenueLocation(bChangeLocationCallback)
{
  g_bChangeLocationCallback = (bChangeLocationCallback == true || bChangeLocationCallback == undefined) ? true : false;
  Reverb.GMaps.ready(mapsLoadedForVenueLocation)
}

/**
 * Draw a tinted circle on the center of the map with the radius in miles.
 * @param elem the map canvas container element
 * @param map_lat
 * @param map_long
 * @param radius_miles
 * @param options overriding default circle options, such as fillColor, fillOpacity, strokeOpacity, etc.
 *        For a complete list of options, see https://developers.google.com/maps/documentation/javascript/reference#CircleOptions
 */
function initMapWithRadius(elem, map_lat, map_long, radius_miles, options) {
  Reverb.GMaps.ready(function (maps) {
    if (!elem) return;
    elem.show();
    
    var center = new maps.LatLng(map_lat,map_long);
    map = new maps.Map(elem,{
      center: center,
      mapTypeId: maps.MapTypeId.ROADMAP,
      zoom: 13,
      minZoom: 5, 
      disableDefaultUI: true,
      scrollwheel: false,
      draggable: false,
    });
    marker = new maps.Marker({position:center, map: map});
    var circle_options = {center:center, radius: 1609*radius_miles, map: map, fillOpacity: 0.2, strokeWeight: 1, strokeOpacity:0.5};
    if (typeof options == 'object') circle_options = jQuery.extend(circle_options, options);
    circle = new maps.Circle(circle_options);
    circle_bounds = new maps.Circle({center:center, radius: 805*radius_miles});
    map.fitBounds(circle_bounds.getBounds());
  });
}

function createMapAtCenter(maps,center)
{
  var infoWindow,
      marker,
      el = document.getElementById('map_canvas');

  map = new maps.Map(el, {
    center: center,
    mapTypeId: maps.MapTypeId.ROADMAP,
    zoom: 13,
    minZoom: 4
  });

  map.closeInfoWindow = function(){
    if(infoWindow){
      infoWindow.close()
      infoWindow = null
    }
  }

  map.getMarker = function(){
    return marker
  }

  if (can_maintain && g_bChangeLocationCallback)
  {
    marker = new maps.Marker({
      draggable: true,
      position:center
    });

    var cache_long, cache_lat;

    maps.event.addListener(marker, "dragstart", function() {
      map.closeInfoWindow();

      var location = map.getMarker().getPosition();
      cache_lat = location.lat();
      cache_lng = location.lng();
    })

    maps.event.addListener(marker, "dragend", function() {
      var formStr = "<form action=\"javascript:void(0)\" onsubmit=\"updateLocation(); return false;\" method=\"post\">\n" +
              "<div class=\"venue_map_select_location_dialog\">Modify venue map location?</div>\n" +
              "<div class=\"clearfloats\"></div>\n" +
              "<div style=\"float:right;\">\n" +
              "<input id=\"submit\" name=\"commit\" type=\"submit\" value=\"Update Location\" class=\"form-button\">\n" +
              "<input id=\"cancel\" name=\"cancel\" type=\"button\" value=\"Cancel\" onclick=\"map.closeInfoWindow(); map.getMarker().setPosition(new google.maps.LatLng(" + cache_lat + "," + cache_lng + "));\" class=\"form-button\">\n" +
              "</div>";
      "<div class=\"clearfloats\"></div>\n"

      infoWindow  = new maps.InfoWindow({
        content: formStr
      })
      infoWindow.open(map,marker)
    })
  }
  else
  {
    marker = new maps.Marker({
      position:center
    });
  }
  marker.setMap(map)

  // Listen for forced location updates for a marker
  Reverb.Event.bind('map_embed:update_marker_location', el, function(e, obj) {
    var lat = obj.latitude,
        lng = obj.longitude,
        latlng = new google.maps.LatLng(lat, lng);

    marker.setPosition(latlng);
    map.setCenter(latlng);
  });

  $$('.show_map_container .ds-root').invoke('show');
}

// Call this function when the page has been loaded
function mapsLoadedForVenueLocation(maps)
{
  if (map_lat != null) {
    center = new maps.LatLng(map_lat,map_long);
    createMapAtCenter(maps, center);
  } else {
    geocoder = new google.maps.Geocoder();
    geocoder.geocode( { 'address': map_address }, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        center = results[0].geometry.location;
        createMapAtCenter(maps, center);
      } else {
        alert("Unable to locate address: "+map_address);
      }
    });
  }
}

function updateLocation()
{
  map.closeInfoWindow();

  var location = map.getMarker().getPosition();
  var query    = "lat=" + location.lat() + "&long=" + location.lng();

  // Initialize the URL with the Tuxedo values.
  var url = "/controller/page_object/" + CURRENT_PAGE_OBJECT;

  if (typeof inSofia == 'function' && inSofia()) {
    // In Sofia the only page object that has map information is the venue.
    url = "/control_room/venue/" + CURRENT_PAGE_OBJECT + "/update_map/";
  }

  url += "?" + query;

  new Ajax.Request(url, { asynchronous: true, evalScripts: true, onSuccess: function() {
      Reverb.Event.trigger('map_embed:location_updated');
  }});
}










function initMapLoaderForGigFinder(locations)
{

  var infoWindow

  var handleMarkerClick = function(){
    var title = this.getTitle(), loc, l = locations.length
    for (var i=0; i<l; i++){
      if ( locations[i][1] != title){
        continue;
      }
      loc =  locations[i];
      break;
    }

    if(loc){
      if (Reverb.inSofiaControlRoom()){
        var formStr = "<div style='float:left;margin-right:15px'><img width='160' height='120' src='" + loc[6] +"'></img></div>" + "<div style='float:right;padding-top:2px'><div style='color:black;font-family:hnbc;font-size:20px;color:#4A4A4A'>" + loc[1] + "</div>" + "<div style='color:black;font-family:hnbc;margin-bottom:5px;font-size:16px;color:#4A4A4A'>" + loc[2] + "</div>" + "<div style='color:black;font-family:hnbc;margin-bottom:25px;font-size:16px;color:#4A4A4A'><span class='pushpin'></span>" + loc[5] + " miles away" + "</div>"+decodeJsSafeHTML(loc[7]);  
      } else if (Reverb.inFeaturesPage()) {
        var formStr = "<span style='color:black;'>" + loc[1] + "<br/>" + loc[2] + "</span><br/><br/><a href='#' class='standard_button style_primary size_mini' onclick='map.closeInfoWindow(); modal_open(\"/artist/send_rpk_to_venues_from_profile/venue_" + loc[0]+"\"); return false;'>Book this Venue</a></br>";
      } else {
        var formStr = "<span style='color:black;'>" + loc[1] + "<br/>" + loc[2] + "</span><br/><br/><a href='#' onclick='map.closeInfoWindow(); $(\"venue_cb_"+loc[0]+"\").checked = true; new Effect.Highlight($(\"venue_row_"+loc[0]+"\")); return false;'>Select this location.</a></br>";
      }

      infoWindow  = new google.maps.InfoWindow({
        content: formStr
      })
      infoWindow.open(map,this)
    }
  }

  var handleMapsLoaded = function(maps){
    var elem = document.getElementById("gig_finder_map_canvas");
    if (!elem) { return; }

    var center = new maps.LatLng(0,0)
    map = new maps.Map(elem,{
      center: center,
      mapTypeId: maps.MapTypeId.ROADMAP,
      zoom: 10,
      minZoom: 4
    });

    map.closeInfoWindow = function(){
      if(infoWindow){
        infoWindow.close()
        infoWindow = null
      }
    }

    var lat_min=null, lat_max=null, lat_sum = 0, long_min=null, long_max=null, long_sum = 0

    for (var i=0; i<locations.length; i++){
      var loc = locations[i], lat_val = loc[3], long_val = loc[4];

      lat_sum += lat_val;
      long_sum += long_val;

      if (lat_val != null){
        if (lat_min == null)
          lat_min = lat_val;
        else if (lat_min > lat_val)
          lat_min = lat_val;

        if (lat_max == null)
          lat_max = lat_val;
        else if (lat_max < lat_val)
          lat_max = lat_val;
      }

      if (long_val != null){
        if (long_min == null)
          long_min = long_val;
        else if (long_min > long_val)
          long_min = long_val;

        if (long_max == null)
          long_max = long_val;
        else if (long_max < long_val)
          long_max = long_val;
      }

      var loc_marker = new maps.Marker({
        title : loc[1],
        clickable : true,
        id : loc[0],
        addr : loc[2],
        position: new maps.LatLng(lat_val,long_val)
      });

      loc_marker.setMap(map)


      maps.event.addListener(loc_marker, "click", handleMarkerClick)

    }
    if (locations.length > 0)
    {
      lat_sum = lat_sum / locations.length;
      long_sum = long_sum / locations.length;
    }
    var center = new maps.LatLng(lat_sum, long_sum);
    map.fitBounds( new maps.LatLngBounds( new maps.LatLng(lat_min, long_min), new maps.LatLng(lat_max, long_max) ) )
    //var scale = map.getBoundsZoomLevel(new google.maps.LatLngBounds(new google.maps.LatLng(lat_min, long_min), new google.maps.LatLng(lat_max, long_max)));
    map.setCenter(center);

  }

  Reverb.GMaps.ready(handleMapsLoaded)
}


//For Visualization Charts
//TODO - probably should encapsulate these into an object
var visCallbackForCharts;
var visPackagesForCharts;
function initVisualizationAPI(visCallback,visPackages)
{
  visCallbackForCharts = visCallback;
  visPackagesForCharts = ["corechart","annotatedtimeline"];

  doc_head = document.getElementsByTagName("head")[0];


  var script = document.createElement("script");
  script.src = "//www.google.com/jsapi?key="+Reverb.config.google_key+"&callback=loadedVisualizationAPI";
  script.type = "text/javascript";
  doc_head.appendChild(script);
}

function loadedVisualizationAPI()
{
  google.load('visualization', '1', {packages:visPackagesForCharts, callback:visCallbackForCharts});
}
