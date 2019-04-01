(function (lib, img, cjs, ss, an) {

var p; // shortcut to reference prototypes
lib.webFontTxtInst = {}; 
var loadedTypekitCount = 0;
var loadedGoogleCount = 0;
var gFontsUpdateCacheList = [];
var tFontsUpdateCacheList = [];
lib.ssMetadata = [];



lib.updateListCache = function (cacheList) {		
	for(var i = 0; i < cacheList.length; i++) {		
		if(cacheList[i].cacheCanvas)		
			cacheList[i].updateCache();		
	}		
};		

lib.addElementsToCache = function (textInst, cacheList) {		
	var cur = textInst;		
	while(cur != null && cur != exportRoot) {		
		if(cacheList.indexOf(cur) != -1)		
			break;		
		cur = cur.parent;		
	}		
	if(cur != exportRoot) {		
		var cur2 = textInst;		
		var index = cacheList.indexOf(cur);		
		while(cur2 != null && cur2 != cur) {		
			cacheList.splice(index, 0, cur2);		
			cur2 = cur2.parent;		
			index++;		
		}		
	}		
	else {		
		cur = textInst;		
		while(cur != null && cur != exportRoot) {		
			cacheList.push(cur);		
			cur = cur.parent;		
		}		
	}		
};		

lib.gfontAvailable = function(family, totalGoogleCount) {		
	lib.properties.webfonts[family] = true;		
	var txtInst = lib.webFontTxtInst && lib.webFontTxtInst[family] || [];		
	for(var f = 0; f < txtInst.length; ++f)		
		lib.addElementsToCache(txtInst[f], gFontsUpdateCacheList);		

	loadedGoogleCount++;		
	if(loadedGoogleCount == totalGoogleCount) {		
		lib.updateListCache(gFontsUpdateCacheList);		
	}		
};		

lib.tfontAvailable = function(family, totalTypekitCount) {		
	lib.properties.webfonts[family] = true;		
	var txtInst = lib.webFontTxtInst && lib.webFontTxtInst[family] || [];		
	for(var f = 0; f < txtInst.length; ++f)		
		lib.addElementsToCache(txtInst[f], tFontsUpdateCacheList);		

	loadedTypekitCount++;		
	if(loadedTypekitCount == totalTypekitCount) {		
		lib.updateListCache(tFontsUpdateCacheList);		
	}		
};
// symbols:
// helper functions:

function mc_symbol_clone() {
	var clone = this._cloneProps(new this.constructor(this.mode, this.startPosition, this.loop));
	clone.gotoAndStop(this.currentFrame);
	clone.paused = this.paused;
	clone.framerate = this.framerate;
	return clone;
}

function getMCSymbolPrototype(symbol, nominalBounds, frameBounds) {
	var prototype = cjs.extend(symbol, cjs.MovieClip);
	prototype.clone = mc_symbol_clone;
	prototype.nominalBounds = nominalBounds;
	prototype.frameBounds = frameBounds;
	return prototype;
	}


(lib.wave3 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AgBABQAAgSgJgMQAUAHABAWQgBAWgSAIQAHgMAAgRg");
	this.shape.setTransform(1.1,0);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = getMCSymbolPrototype(lib.wave3, new cjs.Rectangle(0,-2.9,2.3,6), null);


(lib.wave2 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AgBACQgBgYgMgQQAbAJACAdQgCAdgYAKQAJgQABgVg");
	this.shape.setTransform(1.5,0);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = getMCSymbolPrototype(lib.wave2, new cjs.Rectangle(0,-3.8,3,7.8), null);


(lib.wave1 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AgCADQAAgdgOgRQAPAFAIALQAKAMAAAQQgCAfgcAMQALgSAAgXg");
	this.shape.setTransform(1.7,0);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = getMCSymbolPrototype(lib.wave1, new cjs.Rectangle(0,-4.4,3.4,8.8), null);


(lib.vs = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AgdAmQAAAAgBgBQAAAAAAgBQAAAAAAgBQAAAAABgBIAEgIQAAgBABAAQAAAAAAAAQABgBAAAAQAAAAABAAQAAAAAAAAQABAAAAAAQAAAAABAAQAAAAAAABQAFAEAEABQAGADAFAAQAFAAADgDQAEgDAAgEIgBgFIgEgEQgEgEgHgDIgKgFQgFgCgDgDQgEgEgCgEQgCgFAAgGIACgJQACgFADgDQAEgEAGgCQAGgDAHAAQANAAAOAJIABACQAAABAAAAQAAAAAAABQAAAAgBAAQAAAAAAABIgFAIQAAAAgBABQAAAAgBABQgBAAAAAAQgBAAAAgBQgMgHgGAAQgGAAgDADQgDACAAAEQAAAFAEAEIALAGIAKAFQAFADAEACQAEAEACAEQADAGAAAGQAAAFgCAFQgCAFgEADQgEAEgGACQgGADgHAAQgQAAgNgLg");
	this.shape.setTransform(14.8,10.2);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#FFFFFF").s().p("AAAAwQAAAAAAAAQgBAAAAAAQAAgBAAAAQgBAAAAgBIgqhaIAAgCIADgBIANAAQABAAAAAAQABAAAAAAQAAABAAAAQABAAAAABIAZA4IAAAAIAag4QAAgBABAAQAAAAAAgBQABAAAAAAQAAAAABAAIAOAAIACABIAAACIgqBaQAAABAAAAQgBAAAAABQAAAAgBAAQAAAAAAAAg");
	this.shape_1.setTransform(7.2,10.3);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_1},{t:this.shape}]}).wait(1));

}).prototype = getMCSymbolPrototype(lib.vs, new cjs.Rectangle(2.2,0,16.3,19.9), null);


(lib.txtFinal = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AAABUQgBAAAAgBQgBAAgBAAQAAAAAAgBQgBAAAAgBIhJidQAAgBAAAAQAAgBAAgBQAAAAAAgBQAAAAAAgBQABAAAAAAQAAgBABAAQAAAAABAAQAAgBABAAIAYAAQABAAAAABQABAAAAAAQABAAAAABQABAAAAABIAtBkIAAAAIAuhkQAAgBABAAQAAgBAAAAQABAAABAAQAAgBABAAIAYAAQABAAAAABQABAAAAAAQABAAAAABQABAAAAAAQAAABAAAAQAAABAAAAQAAABAAABQAAAAAAABIhJCdQAAABgBAAQAAABgBAAQAAAAgBAAQAAABgBAAg");
	this.shape.setTransform(236.9,17.9);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#FFFFFF").s().p("AgKBSQgEAAAAgEIAAiDIgkAAQgFAAAAgFIAAgTQAAgEAFAAIBlAAQAFAAAAAEIAAATQAAAFgFAAIgjAAIAACDQAAAEgFAAg");
	this.shape_1.setTransform(222,17.8);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#FFFFFF").s().p("AgvBSQgEAAAAgEIAAibQAAgEAEAAIBfAAQAEAAAAAEIAAATQAAAFgEAAIhFAAIAAAmIA5AAQAFAAAAAFIAAASQAAAFgFAAIg5AAIAAApIBFAAQAEAAAAAEIAAAUQAAAEgEAAg");
	this.shape_2.setTransform(202.6,17.8);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#FFFFFF").s().p("AAABUQgBAAAAgBQgBAAgBAAQAAAAAAgBQgBAAAAgBIhJidQAAgBAAAAQAAgBAAgBQAAAAAAgBQAAAAAAgBQABAAAAAAQAAgBABAAQAAAAABAAQAAgBABAAIAYAAQABAAAAABQABAAAAAAQABAAAAABQABAAAAABIAtBkIAAAAIAuhkQAAgBABAAQAAgBAAAAQABAAABAAQAAgBABAAIAYAAQABAAAAABQABAAAAAAQABAAAAABQABAAAAAAQAAABAAAAQAAABAAAAQAAABAAABQAAAAAAABIhJCdQAAABgBAAQAAABgBAAQAAAAgBAAQAAABgBAAg");
	this.shape_3.setTransform(186.7,17.9);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#FFFFFF").s().p("AgKBSQgEAAAAgEIAAibQAAgEAEAAIAVAAQAEAAAAAEIAACbQAAAEgEAAg");
	this.shape_4.setTransform(174.4,17.8);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#FFFFFF").s().p("AgqBSQgFAAABgEIAAibQgBgEAFAAIAWAAQAEAAAAAEIAACDIA7AAQAFAAgBAEIAAAUQABAEgFAAg");
	this.shape_5.setTransform(164.8,17.8);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#FFFFFF").s().p("AgvBSQgEAAAAgEIAAibQAAgEAEAAIBfAAQAEAAAAAEIAAATQAAAFgEAAIhFAAIAAAsIA5AAQAFAAAAAFIAAASQAAAEgFAAIg5AAIAAA8QAAAEgEAAg");
	this.shape_6.setTransform(144.6,17.8);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#FFFFFF").s().p("AgQBTIgQgFIgPgIQgGgEgGgGQgGgGgEgGQgFgHgDgIQgEgHgBgJIgCgRQABgIABgIQABgIAEgIQADgHAFgHQAEgHAGgGQAGgGAGgEQAHgFAIgDQAHgDAJgCQAIgCAIAAQAIAAAJACQAIACAHADQAJADAGAFQAHAEAFAGQAHAGAEAHQAEAHADAHQAEAIACAIQABAIAAAIQAAAJgBAIQgCAJgEAHQgDAIgEAHQgEAGgHAGQgFAGgHAEQgGAFgJADQgHADgIACQgJACgIAAQgIAAgIgCgAgUgxQgKAEgIAIQgHAIgEAJQgEAKAAAKQAAALAEAKQAEAKAHAHQAIAIAKAEQAKAEAKAAQAKAAALgEQAKgEAHgIQAIgHADgKQAEgKABgLQgBgKgEgKQgDgJgIgIQgHgIgKgEQgLgEgKAAQgKAAgKAEg");
	this.shape_7.setTransform(127,17.8);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#FFFFFF").s().p("AgKBSQgEAAAAgEIAAiDIgkAAQgFAAAAgFIAAgTQAAgEAFAAIBlAAQAFAAAAAEIAAATQAAAFgFAAIgjAAIAACDQAAAEgFAAg");
	this.shape_8.setTransform(103.8,17.8);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#FFFFFF").s().p("AgzBCQgDgDACgEIAJgOQABgDADAAIAEABQAJAHAGADQAKAFAKAAQAIAAAGgGQAHgFAAgIQAAgEgCgEQgCgEgEgDQgHgHgOgGIgRgHQgIgEgGgGQgGgGgEgIQgEgJAAgJQAAgJAEgHQADgJAGgGQAHgHAJgDQALgFANAAQAXAAAXAQQABAAAAABQAAAAABABQAAAAAAABQAAAAABABQAAAAAAABQAAAAAAABQgBAAAAABQAAAAAAABIgJANQgEAGgEgDQgUgNgMAAQgKAAgFAFQgGAFAAAHQAAAIAHAGQAHAGANAGIARAIQAKAFAGAFQAIAGAEAIQAEAJAAALQAAAJgEAJQgDAIgHAGQgIAHgJAEQgLAEgMAAQgdAAgWgTg");
	this.shape_9.setTransform(90.3,17.8);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#FFFFFF").s().p("AgvBSQgEAAAAgEIAAibQAAgEAEAAIBfAAQAEAAAAAEIAAATQAAAFgEAAIhFAAIAAAmIA5AAQAFAAAAAFIAAASQAAAFgFAAIg5AAIAAApIBFAAQAEAAAAAEIAAAUQAAAEgEAAg");
	this.shape_10.setTransform(76.7,17.8);

	this.shape_11 = new cjs.Shape();
	this.shape_11.graphics.f("#FFFFFF").s().p("AgzBSQgEAAAAgEIAAibQAAgEAEAAIA1AAQAKAAAKADQAIADAHAGQAHAGAEAIQAEAIAAAJQAAAHgCAGIgGAKQgGAJgKAFIAAABIAKAEQAGADADAEQAFAFACAGQACAHAAAIQAAAKgEAIQgEAIgHAGQgHAHgJADQgJADgLAAgAgZA2IAcAAQAJAAAGgGQAGgGAAgJQAAgJgGgGQgGgFgJAAIgcAAgAgZgMIAZAAQAIAAAGgGQAFgGAAgJQAAgJgFgGQgFgFgJAAIgZAAg");
	this.shape_11.setTransform(61.7,17.8);

	this.shape_12 = new cjs.Shape();
	this.shape_12.graphics.f("#FFFFFF").s().p("AgvBSQgEAAAAgEIAAibQAAgEAEAAIBfAAQAEAAAAAEIAAATQAAAFgEAAIhFAAIAAAmIA5AAQAFAAAAAFIAAASQAAAFgFAAIg5AAIAAApIBFAAQAEAAAAAEIAAAUQAAAEgEAAg");
	this.shape_12.setTransform(40.3,17.8);

	this.shape_13 = new cjs.Shape();
	this.shape_13.graphics.f("#FFFFFF").s().p("AArBSQgFAAABgEIAAhBIhMAAIAABBQgBAEgEAAIgWAAQgEAAAAgEIAAibQAAgEAEAAIAWAAQAEAAABAEIAAA+IBMAAIAAg+QgBgEAFAAIAVAAQAFAAAAAEIAACbQAAAEgFAAg");
	this.shape_13.setTransform(23.2,17.8);

	this.shape_14 = new cjs.Shape();
	this.shape_14.graphics.f("#FFFFFF").s().p("AgKBSQgEAAAAgEIAAiDIgkAAQgFAAAAgFIAAgTQAAgEAFAAIBlAAQAFAAAAAEIAAATQAAAFgFAAIgjAAIAACDQAAAEgFAAg");
	this.shape_14.setTransform(7.2,17.8);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_14},{t:this.shape_13},{t:this.shape_12},{t:this.shape_11},{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

}).prototype = getMCSymbolPrototype(lib.txtFinal, new cjs.Rectangle(0,0,246.7,34.6), null);


(lib.txt1_1 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AhYBwQgFgFADgHIASggQAFgIAJAFQAfAXAZAAQALgBAIgGQAHgHAAgKQAAgMgKgKQgJgIgUgLIgdgOQgOgJgKgIQgMgLgGgNQgGgOAAgRQAAgPAGgNQAFgPAMgLQAMgLAQgHQASgGAWgBQAoABAsAdQAHAEgFAJIgUAeQgGAJgLgGQghgWgUABQgLgBgHAIQgGAFAAAJQAAAKALAIQAKAJAVALIAcANQAPAIAKAJQANALAHANQAHAPAAAUQAAAPgGAPQgHAOgMAMQgMAMgRAHQgSAGgVABQgzAAglgfg");
	this.shape.setTransform(207.7,79.5);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#FFFFFF").s().p("AhYBwQgFgFADgHIASggQAFgIAJAFQAfAXAZAAQALgBAIgGQAHgHAAgKQAAgMgKgKQgJgIgUgLIgdgOQgOgJgKgIQgMgLgGgNQgGgOAAgRQAAgPAGgNQAFgPAMgLQAMgLAQgHQASgGAWgBQAoABAsAdQAHAEgFAJIgUAeQgGAJgLgGQghgWgUABQgLgBgHAIQgGAFAAAJQAAAKALAIQAKAJAVALIAcANQAPAIAKAJQANALAHANQAHAPAAAUQAAAPgGAPQgHAOgMAMQgMAMgRAHQgSAGgVABQgzAAglgfg");
	this.shape_1.setTransform(183.9,79.5);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#FFFFFF").s().p("AhRCLQgHAAAAgIIAAkFQAAgIAHAAICjAAQAHAAAAAIIAAArQAAAIgHAAIhtAAIAAAxIBaAAQAHAAAAAHIAAArQAAAHgHAAIhaAAIAAA2IBtAAQAHAAAAAHIAAArQAAAIgHAAg");
	this.shape_2.setTransform(160.1,79.5);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#FFFFFF").s().p("AhJCLQgIAAAAgIIAAkFQAAgIAIAAIAvAAQAHAAAAAIIAADTIBdAAQAIAAAAAHIAAArQAAAIgIAAg");
	this.shape_3.setTransform(137.2,79.5);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#FFFFFF").s().p("AAqCLQgFAAgBgEIgzhpIgcAAIAABlQAAAIgHAAIgvAAQgIAAAAgIIAAkFQAAgIAIAAIB1AAQASAAARAHQAPAHAMAMQALALAHAQQAGAQAAARQAAAOgEAMQgEAMgHAKQgIAKgLAHQgLAJgNAFIA2BkQACAEgCAEQgDAEgEAAgAgrgTIA5AAQANAAAJgJQAIgJABgOQgBgNgIgJQgJgIgNAAIg5AAg");
	this.shape_4.setTransform(100,79.5);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#FFFFFF").s().p("AgcCLQgOgCgNgGQgMgFgMgIQgLgIgKgJQgKgKgHgLQgIgMgFgMQgGgNgCgOQgDgOAAgOQAAgOADgOQACgOAGgNQAFgNAIgMQAHgLAKgKQAKgKALgHQAMgIAMgGQANgFAOgDQAOgDAOAAQAPAAAOADQAOADANAFQAMAGAMAIQALAHAKAKQAJAKAIALQAIAMAFANQAGANACAOQADAOAAAOQAAAOgDAOQgCAOgGANQgFAMgIAMQgIALgJAKQgKAJgLAIQgMAIgMAFQgNAGgOACQgOAEgPAAQgOAAgOgEgAgehIQgOAGgLALQgLALgGAOQgGAPAAAQQAAAPAGAPQAGAOALALQALALAOAGQAPAGAPAAQAQAAAPgGQAOgGALgLQALgLAGgOQAGgPAAgPQAAgQgGgPQgGgOgLgLQgLgLgOgGQgPgGgQAAQgPAAgPAGg");
	this.shape_5.setTransform(68.6,79.5);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#FFFFFF").s().p("AhRCLQgHAAAAgIIAAkFQAAgIAHAAICjAAQAHAAAAAIIAAArQAAAIgHAAIhtAAIAAA5IBaAAQAHAAAAAHIAAArQAAAHgHAAIhaAAIAABgQAAAIgHAAg");
	this.shape_6.setTransform(40.9,79.5);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#FFFFFF").s().p("AgBCNQgFAAgCgFIh8kJQgBgEABgDQADgEAEAAIA1AAQAFAAABAFIBCCPIABAAIBBiPQACgFAFAAIA1AAQAEAAACAEQACADgBAEIh9EJQgCAFgFAAg");
	this.shape_7.setTransform(230.2,32.5);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#FFFFFF").s().p("AgWCLQgIAAAAgIIAAjSIg4AAQgJAAAAgIIAAgrQAAgIAJAAICuAAQAHAAAAAIIAAArQAAAIgHAAIg5AAIAADSQAAAIgHAAg");
	this.shape_8.setTransform(204.4,32.3);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#FFFFFF").s().p("AhRCLQgHAAAAgIIAAkFQAAgIAHAAICjAAQAHAAAAAIIAAArQAAAIgHAAIhtAAIAAAxIBaAAQAHAAAAAHIAAArQAAAHgHAAIhaAAIAAA2IBtAAQAHAAAAAHIAAArQAAAIgHAAg");
	this.shape_9.setTransform(170.7,32.3);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#FFFFFF").s().p("AgBCNQgFAAgCgFIh8kJQgBgEABgDQADgEAEAAIA1AAQAFAAABAFIBCCPIABAAIBBiPQACgFAFAAIA1AAQAEAAACAEQACADgBAEIh9EJQgCAFgFAAg");
	this.shape_10.setTransform(143.5,32.5);

	this.shape_11 = new cjs.Shape();
	this.shape_11.graphics.f("#FFFFFF").s().p("AgXCLQgHAAAAgIIAAkFQAAgIAHAAIAuAAQAIAAAAAIIAAEFQAAAIgIAAg");
	this.shape_11.setTransform(122,32.3);

	this.shape_12 = new cjs.Shape();
	this.shape_12.graphics.f("#FFFFFF").s().p("AhJCLQgIAAAAgIIAAkFQAAgIAIAAIAvAAQAHAAAAAIIAADTIBdAAQAIAAAAAHIAAArQAAAIgIAAg");
	this.shape_12.setTransform(104.9,32.3);

	this.shape_13 = new cjs.Shape();
	this.shape_13.graphics.f("#FFFFFF").s().p("AgWCLQgIAAAAgIIAAjSIg4AAQgIAAAAgIIAAgrQAAgIAIAAICuAAQAHAAABAIIAAArQgBAIgHAAIg4AAIAADSQAAAIgIAAg");
	this.shape_13.setTransform(69.6,32.3);

	this.shape_14 = new cjs.Shape();
	this.shape_14.graphics.f("#FFFFFF").s().p("AhRCLQgHAAAAgIIAAkFQAAgIAHAAICjAAQAHAAAAAIIAAArQAAAIgHAAIhtAAIAAAxIBaAAQAHAAAAAHIAAArQAAAHgHAAIhaAAIAAA2IBtAAQAHAAAAAHIAAArQAAAIgHAAg");
	this.shape_14.setTransform(46.2,32.3);

	this.shape_15 = new cjs.Shape();
	this.shape_15.graphics.f("#FFFFFF").s().p("AgHCLQgOgDgNgFQgNgFgLgIQgMgIgJgJQgKgKgIgLQgHgMgGgMQgFgNgDgOQgDgOAAgPQAAgNADgOQADgOAFgNQAGgNAHgMQAIgLAKgJQAJgKAMgIQALgIANgFQANgGAOgDQANgCAOAAQANAAANACIAZAHIAYAMQAMAIAKAIQAGAFgFAFIggAiQgFAFgFgFQgLgKgOgEQgMgFgPAAQgQABgOAGQgNAGgLALQgLALgGAPQgGAOAAAPQAAAQAGAPQAGAOALALQALALAOAGQANAGAQAAQAUAAAQgGIAAgXIgZAAQgIAAAAgHIAAgoQAAgGAIAAIBPAAQAHAAAAAGIABBrQAAAEgDADQgpAZg6AAQgOAAgNgDg");
	this.shape_15.setTransform(17.9,32.4);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_15},{t:this.shape_14},{t:this.shape_13},{t:this.shape_12},{t:this.shape_11},{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

}).prototype = getMCSymbolPrototype(lib.txt1_1, new cjs.Rectangle(0,0,249.5,110.1), null);


(lib.Tween2 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.lf(["#14ABE0","rgba(26,108,182,0.957)"],[0,1],-157,-157,121.8,121.8).s().p("A3bPSIAA+jMAu3AAAIAAejg");

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-150,-97.7,300,195.6);


(lib.slash = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// timeline functions:
	this.frame_0 = function() {
		this.stop();
	}
	this.frame_19 = function() {
		this.stop();
	}

	// actions tween:
	this.timeline.addTween(cjs.Tween.get(this).call(this.frame_0).wait(19).call(this.frame_19).wait(1));

	// Layer 9
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#14ABE0").s().p("ACIC0IgcgWQgggZgjghIgkgkIghgmIghgoIgegoIgbgnIgVgkQgQgagOgeIgJgWIAiAmIAXAbIBaBoIAgAmICyDQg");
	this.shape.setTransform(43.4,20.3,0.649,0.649);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#14ABE0").s().p("Ai2DlQAZgbAlgqIB9ieIAfgsQANgWAPgWIAdgnIAagjQAMgQALgMIASgYQALgNAHgIIAFADIgDAaQgEAWgCAIIgNAmQgIAVgLAVQgMAXgPAVQgMARgXAZIhMBRIgmAmIhHBAIg1ArIgUAQg");
	this.shape_1.setTransform(43.1,18.9,0.649,0.649);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_1},{t:this.shape}]}).wait(20));

	// Layer 2 (mask)
	var mask = new cjs.Shape();
	mask._off = true;
	var mask_graphics_11 = new cjs.Graphics().p("AkwhBID/jyIFiF1Ij/Dyg");
	var mask_graphics_12 = new cjs.Graphics().p("AkwhBID/jyIFiF1Ij/Dyg");
	var mask_graphics_13 = new cjs.Graphics().p("AkwhBID/jyIFiF1Ij/Dyg");
	var mask_graphics_14 = new cjs.Graphics().p("AkwhBID/jyIFiF1Ij/Dyg");
	var mask_graphics_15 = new cjs.Graphics().p("AkwhBID/jyIFiF1Ij/Dyg");
	var mask_graphics_16 = new cjs.Graphics().p("AkwhBID/jyIFiF1Ij/Dyg");
	var mask_graphics_17 = new cjs.Graphics().p("AkwhBID/jyIFiF1Ij/Dyg");
	var mask_graphics_18 = new cjs.Graphics().p("AkdhBID/jyIFiF1Ij/Dyg");
	var mask_graphics_19 = new cjs.Graphics().p("AkBhBIEAjyIFiF1IkADyg");

	this.timeline.addTween(cjs.Tween.get(mask).to({graphics:null,x:0,y:0}).wait(11).to({graphics:mask_graphics_11,x:15.6,y:-15.7}).wait(1).to({graphics:mask_graphics_12,x:16,y:-15.2}).wait(1).to({graphics:mask_graphics_13,x:17.1,y:-13.8}).wait(1).to({graphics:mask_graphics_14,x:19,y:-11.3}).wait(1).to({graphics:mask_graphics_15,x:21.7,y:-7.9}).wait(1).to({graphics:mask_graphics_16,x:25.1,y:-3.5}).wait(1).to({graphics:mask_graphics_17,x:29.3,y:1.8}).wait(1).to({graphics:mask_graphics_18,x:32.4,y:8.2}).wait(1).to({graphics:mask_graphics_19,x:35.3,y:15.5}).wait(1));

	// FlashAICB
	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#14ABE0").s().p("ACIC0IgcgWQgggZgjghIgkgkIghgmIghgoIgegoIgbgnIgVgkQgQgagOgeIgJgWIAiAmIAXAbIBaBoIAgAmICyDQg");
	this.shape_2.setTransform(43.4,20.3,0.649,0.649);
	this.shape_2._off = true;

	var maskedShapeInstanceList = [this.shape_2];

	for(var shapedInstanceItr = 0; shapedInstanceItr < maskedShapeInstanceList.length; shapedInstanceItr++) {
		maskedShapeInstanceList[shapedInstanceItr].mask = mask;
	}

	this.timeline.addTween(cjs.Tween.get(this.shape_2).wait(11).to({_off:false},0).wait(9));

	// Layer 7 (mask)
	var mask_1 = new cjs.Shape();
	mask_1._off = true;
	var mask_1_graphics_1 = new cjs.Graphics().p("AhCByIEimpIEiDGIkiGpg");
	var mask_1_graphics_2 = new cjs.Graphics().p("AhEByIEhmpIEjDGIkiGpg");
	var mask_1_graphics_3 = new cjs.Graphics().p("AhLByIEhmpIEjDGIkiGpg");
	var mask_1_graphics_4 = new cjs.Graphics().p("AhWByIEhmpIEjDGIkiGpg");
	var mask_1_graphics_5 = new cjs.Graphics().p("AhmByIEhmpIEjDGIkiGpg");
	var mask_1_graphics_6 = new cjs.Graphics().p("Ah6ByIEhmpIEjDGIkjGpg");
	var mask_1_graphics_7 = new cjs.Graphics().p("AiTByIEhmpIEjDGIkjGpg");
	var mask_1_graphics_8 = new cjs.Graphics().p("AixByIEhmpIEjDGIkiGpg");
	var mask_1_graphics_9 = new cjs.Graphics().p("AjTByIEhmpIEjDGIkiGpg");

	this.timeline.addTween(cjs.Tween.get(mask_1).to({graphics:null,x:0,y:0}).wait(1).to({graphics:mask_1_graphics_1,x:51.4,y:-17.3}).wait(1).to({graphics:mask_1_graphics_2,x:51.2,y:-16.8}).wait(1).to({graphics:mask_1_graphics_3,x:50.5,y:-15.3}).wait(1).to({graphics:mask_1_graphics_4,x:49.4,y:-12.7}).wait(1).to({graphics:mask_1_graphics_5,x:47.8,y:-9.2}).wait(1).to({graphics:mask_1_graphics_6,x:45.8,y:-4.5}).wait(1).to({graphics:mask_1_graphics_7,x:43.3,y:1.1}).wait(1).to({graphics:mask_1_graphics_8,x:40.3,y:7.7}).wait(1).to({graphics:mask_1_graphics_9,x:36.9,y:15.4}).wait(11));

	// Layer 6
	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#14ABE0").s().p("Ai2DlQAZgbAlgqIB9ieIAfgsQANgWAPgWIAdgnIAagjQAMgQALgMIASgYQALgNAHgIIAFADIgDAaQgEAWgCAIIgNAmQgIAVgLAVQgMAXgPAVQgMARgXAZIhMBRIgmAmIhHBAIg1ArIgUAQg");
	this.shape_3.setTransform(43.1,18.9,0.649,0.649);
	this.shape_3._off = true;

	var maskedShapeInstanceList = [this.shape_3];

	for(var shapedInstanceItr = 0; shapedInstanceItr < maskedShapeInstanceList.length; shapedInstanceItr++) {
		maskedShapeInstanceList[shapedInstanceItr].mask = mask_1;
	}

	this.timeline.addTween(cjs.Tween.get(this.shape_3).wait(1).to({_off:false},0).wait(19));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(31.3,3.8,23.8,30.3);


(lib.priceLegal = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#6C6C6C").s().p("AgFAGQgCgCAAgEQAAgCACgCQADgDACAAQAEAAACADQACACAAACQAAAEgCACQgCACgEAAQgCAAgDgCg");
	this.shape.setTransform(198.1,12);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#6C6C6C").s().p("AgNAjIgCgBIAAgDIAJgVIgPgpIAAgDIABAAIAHAAIACABIAKAgIABAAIAMggIACgBIAHAAIACAAIAAADIgcBBIgCABg");
	this.shape_1.setTransform(194.7,11.6);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#6C6C6C").s().p("AgMAYQgBAAAAgBQgBAAAAAAQAAAAAAgBQAAAAAAgBIAAgoQAAgBAAAAQAAgBAAAAQAAAAABAAQAAgBABAAIACAAQAAAAABABQAAAAAAAAQABAAAAAAQAAABAAAAIACAEQAFgHAIAAIAGABQABABAAAAQABAAAAABQAAAAAAABQAAAAAAABIgCAEQgBABAAAAQAAABgBAAQAAAAAAAAQgBAAAAgBIgEAAQgGAAgEAGIAAAcQAAABgBAAQAAABAAAAQAAAAgBAAQgBABAAAAg");
	this.shape_2.setTransform(190.5,10.3);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#6C6C6C").s().p("AgJAXIgFgDIgDgFIgBgHIABgFIAEgEQACgCAEgBIAHgBIAJABQAAgFgBgDQgCgDgEABIgHABIgFABQgBAAAAAAQgBAAAAAAQAAAAAAgBQgBAAAAgBIgBgEQAAAAAAgBQAAAAAAgBQABAAAAAAQAAAAABgBQAHgCAIAAQAFAAADABQAEACABACIACAHIABAIIAAAYQAAAAAAABQAAAAgBABQAAAAAAAAQgBAAAAAAIgEAAIgCgBIgBgDIgFADQgEACgEAAIgGgBgAgFADQgDACAAADQAAAEACACQACACADAAQACAAAEgCQADgCABgBIAAgIQgCgCgGAAQgEAAgCACg");
	this.shape_3.setTransform(185.8,10.4);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#6C6C6C").s().p("AAAAYIgBgBIgUgrIAAgCIABgBIAHAAIACACIALAbIAAAAIANgbIADgCIAFAAIABABIAAACIgUArIgCABg");
	this.shape_4.setTransform(181.2,10.4);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#6C6C6C").s().p("AgPAUQAAgBAAAAQAAAAAAgBQAAAAAAAAQAAgBAAAAIACgEQAAgBABAAQAAAAAAAAQABAAAAAAQAAAAABAAIAEACIAGABQABAAABAAQABAAAAAAQABAAAAAAQABgBAAAAQAAAAABgBQAAAAAAAAQAAgBAAAAQAAgBAAAAQAAgBAAAAQAAgBAAAAQAAAAgBgBQAAAAgBgBIgHgEIgFgCIgEgDIgCgDIgBgGIABgEIACgEIAFgDIAHgBQAGAAAHADQAAAAABABQAAAAAAABQAAAAAAABQAAAAAAABIgCADQAAAAAAABQAAAAgBAAQAAAAgBAAQAAAAgBAAIgJgCIgEABIgCACQAAABABAAQAAABAAABQAAAAABABQAAAAAAABIAFACIAGADIAFACIADAEQABACAAAEQAAACgBACIgDAFIgGADIgGABQgHAAgIgEg");
	this.shape_5.setTransform(174.5,10.4);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#6C6C6C").s().p("AgCAeIgEgCIgCgFIAAgFIAAgYIgFAAQgBAAAAAAQgBgBAAAAQAAAAgBgBQAAAAAAgBIAAgEQAAAAAAgBQABAAAAAAQAAgBABAAQAAAAABAAIAFAAIAAgNQAAAAAAgBQAAAAAAgBQABAAAAAAQABAAAAAAIAGAAQAAAAAAAAQAAAAAAAAQABABAAAAQAAABAAAAIAAANIAMAAQABAAAAAAQABAAAAABQAAAAAAAAQAAABAAAAIAAAEQAAABAAAAQAAABAAAAQAAAAgBABQAAAAgBAAIgMAAIAAAXIABAEIADABQADAAAEgCQAAAAABgBQAAAAABABQAAAAAAAAQABAAAAABIABAEQABABAAAAQAAAAAAABQgBAAAAAAQAAABgBAAQgHADgFAAIgFgBg");
	this.shape_6.setTransform(170.5,9.6);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#6C6C6C").s().p("AANAYQgBAAAAgBQgBAAAAAAQAAAAAAgBQAAAAAAgBIAAgWIgBgGIgCgDIgDgDIgEAAQgGAAgFAGIAAAcQAAABAAAAQAAABAAAAQgBAAAAAAQgBABAAAAIgGAAQAAAAgBgBQAAAAAAAAQgBAAAAgBQAAAAAAgBIAAgoQAAgBAAAAQAAgBABAAQAAAAAAAAQABgBAAAAIADAAIACACIABAEQAGgGAJgBQAFAAADACQAEACACADIADAHIABAIIAAAWQAAABAAAAQgBABAAAAQAAAAgBAAQAAABgBAAg");
	this.shape_7.setTransform(166,10.3);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#6C6C6C").s().p("AgLAWQgCgCgCgDQgDgCgBgEIAAgJIAAgWQAAgBAAAAQAAgBABAAQAAAAAAAAQABgBAAAAIAGAAQABAAAAABQAAAAABAAQAAAAAAABQAAAAAAABIAAAXIAAAFIADADIACADIAEAAIAEgBIADgCIADgEIAAgbQAAgBAAAAQAAgBABAAQAAAAAAAAQABgBABAAIAEAAQABAAABABQAAAAAAAAQABAAAAABQAAAAAAABIAAAoQAAABAAAAQAAABgBAAQAAAAAAAAQgBABgBAAIgCAAQAAAAgBgBQAAAAAAAAQgBAAAAgBQAAAAAAgBIgBgDQgGAGgIABQgFAAgEgCg");
	this.shape_8.setTransform(160.6,10.4);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#6C6C6C").s().p("AgIAWQgEgCgDgDIgGgIQgBgEAAgFQAAgEABgFIAGgHQADgDAEgDIAIgBQAFAAAEABQAFADADADIAFAHQABAFAAAEIgBAJIgFAIQgDADgFACQgEACgFAAQgDAAgFgCgAgEgMIgFACIgDAFIAAAFIAAAFIADAGIAFACIAEABIAFgBIAFgCIADgGIABgFIgBgFIgDgFIgFgCIgFgBIgEABg");
	this.shape_9.setTransform(155.2,10.4);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#6C6C6C").s().p("AgGAWQgEgCgDgDQgDgDgCgEQgCgFAAgFQAAgEACgFQACgEADgDQADgDAEgDQAFgBAEAAQAFAAAEACQAEACADAEQABAAAAABQAAAAAAAAQAAABAAAAQgBABAAAAIgEADQAAABAAAAQAAAAgBAAQAAAAgBAAQAAgBgBAAIgEgDIgFgBIgFABIgEACIgDAFIgBAFIABAFIADAGIAEACIAFABQAGAAAEgFQABAAAAgBQABAAAAAAQAAAAABAAQAAAAABAAIADADQAAAAABABQAAAAAAABQAAAAAAABQAAAAgBAAIgDAFIgEADIgFABIgGABIgIgCg");
	this.shape_10.setTransform(150.1,10.4);

	this.shape_11 = new cjs.Shape();
	this.shape_11.graphics.f("#6C6C6C").s().p("AgCAjQgBAAAAAAQAAAAAAAAQgBgBAAAAQAAgBAAAAIAAhBQAAAAAAgBQAAAAABAAQAAgBAAAAQAAAAABAAIAEAAQABAAABAAQAAAAAAABQABAAAAAAQAAABAAAAIAABBQAAAAAAABQAAAAgBABQAAAAAAAAQgBAAgBAAg");
	this.shape_11.setTransform(144,9.2);

	this.shape_12 = new cjs.Shape();
	this.shape_12.graphics.f("#6C6C6C").s().p("AgHAWQgFgCgDgDQgDgEgBgEQgCgEAAgFQAAgEACgFQABgEADgDQADgDAEgDQAFgBAEAAQAEAAAEABQAEACADADQADACABAEQACAFAAAEIAAACQAAAAAAABQAAAAgBAAQAAABAAAAQgBAAAAAAIgfAAIABAFIADAEIAEACQADACACAAQAFAAAGgEQAAAAABgBQAAAAABAAQAAAAAAAAQABABAAAAIACAEQABABAAAAQAAABAAAAQAAAAAAABQAAAAgBABIgHADIgKACQgEAAgEgCgAAMgEIgBgEIgCgEIgEgCIgEAAIgEAAIgEACIgCADIgCAFIAXAAIAAAAg");
	this.shape_12.setTransform(140.2,10.4);

	this.shape_13 = new cjs.Shape();
	this.shape_13.graphics.f("#6C6C6C").s().p("AANAYQgBAAAAgBQAAAAgBAAQAAAAAAgBQAAAAAAgBIAAgWIgBgGIgCgDIgDgDIgEAAQgGAAgFAGIAAAcQAAABAAAAQAAABAAAAQgBAAAAAAQgBABAAAAIgGAAQAAAAgBgBQAAAAAAAAQAAAAgBgBQAAAAAAgBIAAgoQAAgBAAAAQABgBAAAAQAAAAAAAAQABgBAAAAIADAAIACACIABAEQAGgGAJgBQAFAAADACQAEACACADIADAHIABAIIAAAWQAAABAAAAQgBABAAAAQAAAAgBAAQAAABgBAAg");
	this.shape_13.setTransform(134.9,10.3);

	this.shape_14 = new cjs.Shape();
	this.shape_14.graphics.f("#6C6C6C").s().p("AANAYQgBAAAAgBQgBAAAAAAQAAAAAAgBQAAAAAAgBIAAgWIgBgGIgCgDIgDgDIgEAAQgGAAgFAGIAAAcQAAABAAAAQAAABAAAAQgBAAAAAAQgBABAAAAIgGAAQAAAAgBgBQAAAAAAAAQgBAAAAgBQAAAAAAgBIAAgoQAAgBAAAAQAAgBABAAQAAAAAAAAQABgBAAAAIADAAIACACIABAEQAGgGAJgBQAFAAADACQAEACACADIADAHIABAIIAAAWQAAABAAAAQgBABAAAAQAAAAgBAAQAAABgBAAg");
	this.shape_14.setTransform(129.4,10.3);

	this.shape_15 = new cjs.Shape();
	this.shape_15.graphics.f("#6C6C6C").s().p("AgJAXIgFgDIgDgFIgBgHIABgFIAEgEQACgCAEgBIAHgBIAJABQAAgFgBgDQgCgDgEABIgHABIgFABQgBAAAAAAQgBAAAAAAQAAAAAAgBQgBAAAAgBIgBgEQAAAAAAgBQAAAAAAgBQABAAAAAAQAAAAABgBQAHgCAIAAQAFAAADABQAEACABACIACAHIABAIIAAAYQAAAAAAABQAAAAgBABQAAAAAAAAQgBAAAAAAIgEAAIgCgBIgBgDIgFADQgEACgEAAIgGgBgAgFADQgDACAAADQAAAEACACQACACADAAQACAAAEgCQADgCABgBIAAgIQgCgCgGAAQgEAAgCACg");
	this.shape_15.setTransform(124.1,10.4);

	this.shape_16 = new cjs.Shape();
	this.shape_16.graphics.f("#6C6C6C").s().p("AANAjQgBAAAAAAQAAAAgBAAQAAgBAAAAQAAgBAAAAIAAgYIgBgEIgCgFIgDgBIgEAAIgDAAIgEABIgEAEIAAAdQAAAAAAABQAAAAAAABQgBAAAAAAQgBAAAAAAIgGAAQAAAAgBAAQAAAAAAAAQAAgBgBAAQAAgBAAAAIAAhBQAAAAAAgBQABAAAAAAQAAgBAAAAQABAAAAAAIAGAAQABAAAAAAQABAAAAABQAAAAAAAAQAAABAAAAIAAAZQAGgEAHAAQAEAAAEABQADACACADQADADABADIABAIIAAAYQAAAAAAABQgBAAAAABQAAAAgBAAQAAAAgBAAg");
	this.shape_16.setTransform(119.2,9.2);

	this.shape_17 = new cjs.Shape();
	this.shape_17.graphics.f("#6C6C6C").s().p("AgBAjIgGgCIgHgDIgFgFIgEgFIgEgGIgCgHIAAgHIAAgGIACgHIAEgGIAEgGIAFgEIAHgDIAGgDIAHAAIAHAAIAGACQAEACAHAFQAAABAAAAQAAAAAAABQAAAAAAAAQAAABAAAAIgEAEQgBABAAAAQgBAAAAAAQAAAAAAAAQgBAAAAgBIgIgFIgJgBQgGAAgDACQgFACgDADQgEAEgBAFQgCAEAAAFQAAAFACAFQABAEAEAEQADAEAFACQAEACAFAAQAFAAAEgCIAIgFQAAAAABAAQAAAAAAAAQAAAAABAAQAAAAAAAAIAFAFQAAAAAAAAQAAABAAAAQAAAAAAABQAAAAAAAAIgFAFIgGADIgHABIgGABIgHgBg");
	this.shape_17.setTransform(113,9.2);

	this.shape_18 = new cjs.Shape();
	this.shape_18.graphics.f("#6C6C6C").s().p("AgFAGQgCgCAAgEQAAgCACgCQADgDACAAQADAAACADQADACAAACQAAAEgDACQgCACgDAAQgCAAgDgCg");
	this.shape_18.setTransform(105.9,12);

	this.shape_19 = new cjs.Shape();
	this.shape_19.graphics.f("#6C6C6C").s().p("AgHAWQgFgCgDgDQgDgEgBgEQgCgEAAgFQAAgEACgFQABgEADgDQADgDAEgDQAFgBAEAAQAEAAAEABQAEACADADQADACABAEQACAFAAAEIAAACQAAAAAAABQgBAAAAAAQAAABAAAAQgBAAAAAAIgfAAIABAFIADAEIAEACQADACACAAQAFAAAGgEQAAAAABgBQAAAAAAAAQABAAAAAAQABABAAAAIACAEQABABAAAAQAAABAAAAQAAAAAAABQAAAAgBABIgHADIgKACQgEAAgEgCgAAMgEIgBgEIgCgEIgEgCIgEAAIgEAAIgEACIgCADIgCAFIAXAAIAAAAg");
	this.shape_19.setTransform(102.1,10.4);

	this.shape_20 = new cjs.Shape();
	this.shape_20.graphics.f("#6C6C6C").s().p("AgGAWQgEgCgDgDQgDgDgCgEQgCgFAAgFQAAgEACgFQACgEADgDQADgDAEgDQAFgBAEAAQAFAAAEACQAEACADAEQABAAAAABQAAAAAAAAQAAABAAAAQgBABAAAAIgEADQAAABAAAAQAAAAgBAAQAAAAgBAAQAAgBgBAAIgEgDIgFgBIgFABIgEACIgDAFIgBAFIABAFIADAGIAEACIAFABQAGAAAEgFQABAAAAgBQABAAAAAAQAAAAABAAQAAAAABAAIADADQAAAAABABQAAAAAAABQAAAAAAABQAAAAgBAAIgDAFIgEADIgFABIgGABIgIgCg");
	this.shape_20.setTransform(97.1,10.4);

	this.shape_21 = new cjs.Shape();
	this.shape_21.graphics.f("#6C6C6C").s().p("AgCAjQgBAAAAAAQAAAAgBgBQAAAAAAAAQAAgBAAAAIAAgpQAAgBAAAAQAAAAAAgBQABAAAAAAQAAAAABAAIAFAAQAAAAABAAQAAAAAAAAQABABAAAAQAAAAAAABIAAApQAAAAAAABQAAAAgBAAQAAABAAAAQgBAAAAAAgAgEgWQgCgCAAgDQAAgBAAAAQAAgBABgBQAAAAAAgBQABAAAAgBQABAAAAgBQABAAAAAAQABgBAAAAQABAAAAAAQADAAACACQAAABABAAQAAABAAAAQABABAAABQAAAAAAABQAAADgCACQgCACgDAAQAAAAgBAAQAAgBgBAAQAAAAgBAAQAAgBgBAAg");
	this.shape_21.setTransform(93.4,9.2);

	this.shape_22 = new cjs.Shape();
	this.shape_22.graphics.f("#6C6C6C").s().p("AAAAYIgBgBIgUgrIAAgCIABgBIAHAAIACACIALAbIAAAAIANgbIADgCIAFAAIABABIAAACIgUArIgCABg");
	this.shape_22.setTransform(89.7,10.4);

	this.shape_23 = new cjs.Shape();
	this.shape_23.graphics.f("#6C6C6C").s().p("AgMAYQgBAAAAgBQgBAAAAAAQAAAAAAgBQAAAAAAgBIAAgoQAAgBAAAAQAAgBAAAAQAAAAABAAQAAgBABAAIACAAQAAAAABABQAAAAAAAAQABAAAAAAQAAABAAAAIACAEQAFgHAIAAIAGABQABABAAAAQABAAAAABQAAAAAAABQAAAAAAABIgCAEQgBABAAAAQAAABgBAAQAAAAAAAAQgBAAAAgBIgEAAQgGAAgEAGIAAAcQAAABgBAAQAAABAAAAQAAAAgBAAQgBABAAAAg");
	this.shape_23.setTransform(85.7,10.3);

	this.shape_24 = new cjs.Shape();
	this.shape_24.graphics.f("#6C6C6C").s().p("AgHAWQgFgCgDgDQgDgEgBgEQgCgEAAgFQAAgEACgFQABgEADgDQADgDAEgDQAFgBAEAAQAEAAAEABQAEACADADQADACABAEQACAFAAAEIAAACQAAAAAAABQgBAAAAAAQAAABAAAAQgBAAAAAAIgfAAIABAFIADAEIAEACQADACACAAQAFAAAGgEQAAAAABgBQAAAAAAAAQABAAAAAAQABABAAAAIACAEQABABAAAAQAAABAAAAQAAAAAAABQAAAAgBABIgHADIgKACQgEAAgEgCgAAMgEIgBgEIgCgEIgEgCIgEAAIgEAAIgEACIgCADIgCAFIAXAAIAAAAg");
	this.shape_24.setTransform(80.9,10.4);

	this.shape_25 = new cjs.Shape();
	this.shape_25.graphics.f("#6C6C6C").s().p("AgPAUQAAgBAAAAQAAAAAAgBQAAAAAAAAQAAgBAAAAIACgEQAAgBABAAQAAAAAAAAQABAAAAAAQAAAAABAAIAEACIAGABQABAAABAAQABAAAAAAQABAAAAAAQABgBAAAAQAAAAABgBQAAAAAAAAQAAgBAAAAQAAgBAAAAQAAgBAAAAQAAgBAAAAQAAAAgBgBQAAAAgBgBIgHgEIgFgCIgEgDIgCgDIgBgGIABgEIACgEIAFgDIAHgBQAGAAAHADQAAAAABABQAAAAAAABQAAAAAAABQAAAAAAABIgCADQAAAAAAABQAAAAgBAAQAAAAgBAAQAAAAgBAAIgJgCIgEABIgCACQAAABABAAQAAABAAABQAAAAABABQAAAAAAABIAFACIAGADIAFACIADAEQABACAAAEQAAACgBACIgDAFIgGADIgGABQgHAAgIgEg");
	this.shape_25.setTransform(76.4,10.4);

	this.shape_26 = new cjs.Shape();
	this.shape_26.graphics.f("#6C6C6C").s().p("AgHAWQgFgCgDgDQgDgEgBgEQgCgEAAgFQAAgEACgFQABgEADgDQADgDAEgDQAFgBAEAAQAEAAAEABQAEACADADQADACABAEQACAFAAAEIAAACQAAAAAAABQAAAAgBAAQAAABAAAAQgBAAAAAAIgfAAIABAFIADAEIAEACQADACACAAQAFAAAGgEQAAAAABgBQAAAAAAAAQABAAAAAAQAAABABAAIACAEQABABAAAAQAAABAAAAQAAAAAAABQAAAAgBABIgHADIgKACQgEAAgEgCgAAMgEIgBgEIgCgEIgEgCIgEAAIgEAAIgEACIgCADIgCAFIAXAAIAAAAg");
	this.shape_26.setTransform(69.4,10.4);

	this.shape_27 = new cjs.Shape();
	this.shape_27.graphics.f("#6C6C6C").s().p("AgPAUQAAgBAAAAQAAAAAAgBQAAAAAAAAQAAgBAAAAIACgEQAAgBABAAQAAAAAAAAQABAAAAAAQAAAAABAAIAEACIAGABQABAAABAAQABAAAAAAQABAAAAAAQABgBAAAAQAAAAABgBQAAAAAAAAQAAgBAAAAQAAgBAAAAQAAgBAAAAQAAgBAAAAQAAAAgBgBQAAAAgBgBIgHgEIgFgCIgEgDIgCgDIgBgGIABgEIACgEIAFgDIAHgBQAGAAAHADQAAAAABABQAAAAAAABQAAAAAAABQAAAAAAABIgCADQAAAAAAABQAAAAgBAAQAAAAgBAAQAAAAgBAAIgJgCIgEABIgCACQAAABABAAQAAABAAABQAAAAABABQAAAAAAABIAFACIAGADIAFACIADAEQABACAAAEQAAACgBACIgDAFIgGADIgGABQgHAAgIgEg");
	this.shape_27.setTransform(64.8,10.4);

	this.shape_28 = new cjs.Shape();
	this.shape_28.graphics.f("#6C6C6C").s().p("AgJAXIgFgDIgDgFIgBgHIABgFIAEgEQACgCAEgBIAHgBIAJABQAAgFgBgDQgCgDgEABIgHABIgFABQgBAAAAAAQgBAAAAAAQAAAAAAgBQgBAAAAgBIgBgEQAAAAAAgBQAAAAAAgBQABAAAAAAQAAAAABgBQAHgCAIAAQAFAAADABQAEACABACIACAHIABAIIAAAYQAAAAAAABQAAAAgBABQAAAAAAAAQgBAAAAAAIgEAAIgCgBIgBgDIgFADQgEACgEAAIgGgBgAgFADQgDACAAADQAAAEACACQACACADAAQACAAAEgCQADgCABgBIAAgIQgCgCgGAAQgEAAgCACg");
	this.shape_28.setTransform(60.2,10.4);

	this.shape_29 = new cjs.Shape();
	this.shape_29.graphics.f("#6C6C6C").s().p("AgOAdIgBADQAAABAAAAQAAABAAAAQgBAAAAAAQAAABgBAAIgCAAQgBAAAAgBQAAAAgBAAQAAAAAAgBQAAAAAAgBIAAhBQAAAAAAAAQAAgBAAAAQABAAAAAAQAAAAABAAIAGAAQAAAAABAAQAAAAAAAAQABAAAAABQAAAAAAAAIAAAYQAGgDAFAAQAEAAAEACQAEACAEADQADADABAEQACAFAAAEQAAAFgBAFIgFAIQgDADgEABQgEADgEAAQgJAAgGgHgAgLAAIAAAUQAEAGAHAAIAEgBQADgBABgDIADgEIABgGIgBgFIgDgFIgEgCIgFgBQgGAAgEACg");
	this.shape_29.setTransform(55.4,9.2);

	this.shape_30 = new cjs.Shape();
	this.shape_30.graphics.f("#6C6C6C").s().p("AANAYQgBAAAAgBQgBAAAAAAQAAAAAAgBQAAAAAAgBIAAgWIgBgGIgCgDIgDgDIgEAAQgGAAgFAGIAAAcQAAABAAAAQAAABAAAAQgBAAAAAAQgBABAAAAIgGAAQAAAAgBgBQAAAAAAAAQgBAAAAgBQAAAAAAgBIAAgoQAAgBAAAAQAAgBABAAQAAAAAAAAQABgBAAAAIADAAIACACIABAEQAGgGAJgBQAFAAADACQAEACACADIADAHIABAIIAAAWQAAABAAAAQgBABAAAAQAAAAgBAAQAAABgBAAg");
	this.shape_30.setTransform(47.4,10.3);

	this.shape_31 = new cjs.Shape();
	this.shape_31.graphics.f("#6C6C6C").s().p("AgIAWQgEgCgDgDIgGgIQgBgEAAgFQAAgEABgFIAGgHQADgDAEgDIAIgBQAFAAAFABQAEADADADIAFAHQACAFgBAEQABAFgCAEIgFAIQgDADgEACQgFACgFAAQgEAAgEgCgAgEgMIgFACIgDAFIgBAFIABAFIADAGIAFACIAEABIAFgBIAFgCIADgGIABgFIgBgFIgDgFIgFgCIgFgBIgEABg");
	this.shape_31.setTransform(41.9,10.4);

	this.shape_32 = new cjs.Shape();
	this.shape_32.graphics.f("#6C6C6C").s().p("AgIAhQgEgBgDgDIgEgIQgCgFAAgFQAAgEACgFQABgEADgDQAEgDADgCIAIgCQAGAAAGADIAAgYQAAAAAAAAQAAgBABAAQAAAAAAAAQABAAABAAIAFAAQABAAAAAAQAAAAABAAQAAAAAAABQAAAAAAAAIAABBQAAABAAAAQAAABAAAAQgBAAAAAAQAAABgBAAIgDAAQAAAAAAgBQAAAAgBAAQAAAAAAgBQAAAAAAgBIgBgDQgGAHgJAAQgEAAgEgDgAgCgBIgFACIgDAFIgBAFIABAGIACAEIAFAEIADABQAIAAAEgGIAAgUQgEgCgHAAIgDABg");
	this.shape_32.setTransform(33.8,9.2);

	this.shape_33 = new cjs.Shape();
	this.shape_33.graphics.f("#6C6C6C").s().p("AgHAWQgFgCgDgDQgDgEgBgEQgCgEAAgFQAAgEACgFQABgEADgDQADgDAEgDQAFgBAEAAQAEAAAEABQAEACADADQADACABAEQACAFAAAEIAAACQAAAAAAABQAAAAgBAAQAAABAAAAQgBAAAAAAIgfAAIABAFIADAEIAEACQADACACAAQAFAAAGgEQAAAAABgBQAAAAABAAQAAAAAAAAQAAABABAAIACAEQABABAAAAQAAABAAAAQAAAAAAABQAAAAgBABIgHADIgKACQgEAAgEgCgAAMgEIgBgEIgCgEIgEgCIgEAAIgEAAIgEACIgCADIgCAFIAXAAIAAAAg");
	this.shape_33.setTransform(28.7,10.4);

	this.shape_34 = new cjs.Shape();
	this.shape_34.graphics.f("#6C6C6C").s().p("AgPAUQAAgBAAAAQAAAAAAgBQAAAAAAAAQAAgBAAAAIACgEQAAgBABAAQAAAAAAAAQABAAAAAAQAAAAABAAIAEACIAGABQABAAABAAQABAAAAAAQABAAAAAAQABgBAAAAQAAAAABgBQAAAAAAAAQAAgBAAAAQAAgBAAAAQAAgBAAAAQAAgBAAAAQAAAAgBgBQAAAAgBgBIgHgEIgFgCIgEgDIgCgDIgBgGIABgEIACgEIAFgDIAHgBQAGAAAHADQAAAAABABQAAAAAAABQAAAAAAABQAAAAAAABIgCADQAAAAAAABQAAAAgBAAQAAAAgBAAQAAAAgBAAIgJgCIgEABIgCACQAAABABAAQAAABAAABQAAAAABABQAAAAAAABIAFACIAGADIAFACIADAEQABACAAAEQAAACgBACIgDAFIgGADIgGABQgHAAgIgEg");
	this.shape_34.setTransform(24.1,10.4);

	this.shape_35 = new cjs.Shape();
	this.shape_35.graphics.f("#6C6C6C").s().p("AgJAXIgFgDIgDgFIgBgHIABgFIAEgEQACgCAEgBIAHgBIAJABQAAgFgBgDQgCgDgEABIgHABIgFABQgBAAAAAAQgBAAAAAAQAAAAAAgBQgBAAAAgBIgBgEQAAAAAAgBQAAAAAAgBQABAAAAAAQAAAAABgBQAHgCAIAAQAFAAADABQAEACABACIACAHIABAIIAAAYQAAAAAAABQAAAAgBABQAAAAAAAAQgBAAAAAAIgEAAIgCgBIgBgDIgFADQgEACgEAAIgGgBgAgFADQgDACAAADQAAAEACACQACACADAAQACAAAEgCQADgCABgBIAAgIQgCgCgGAAQgEAAgCACg");
	this.shape_35.setTransform(19.5,10.4);

	this.shape_36 = new cjs.Shape();
	this.shape_36.graphics.f("#6C6C6C").s().p("AgVAjQAAAAgBAAQAAAAAAAAQgBgBAAAAQAAgBAAAAIAAhBQAAAAAAgBQAAAAABAAQAAgBAAAAQABAAAAAAIAWAAQAEAAAEABIAHAFIAEAFQABADAAAEIAAAGIgCAEIgDAEIgEACIAEABIAEAEIADAFIABAGQAAAEgCAEQgCADgDACIgHAFQgEABgEAAgAgNAaIAPAAIAFgBIADgCIACgEIAAgEIAAgFIgDgDIgDgCIgEAAIgPAAgAgMgDIAMAAIAEgBIADgDIADgDIAAgFIAAgEIgDgDIgDgCIgEgBIgMAAg");
	this.shape_36.setTransform(14.5,9.2);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_36},{t:this.shape_35},{t:this.shape_34},{t:this.shape_33},{t:this.shape_32},{t:this.shape_31},{t:this.shape_30},{t:this.shape_29},{t:this.shape_28},{t:this.shape_27},{t:this.shape_26},{t:this.shape_25},{t:this.shape_24},{t:this.shape_23},{t:this.shape_22},{t:this.shape_21},{t:this.shape_20},{t:this.shape_19},{t:this.shape_18},{t:this.shape_17},{t:this.shape_16},{t:this.shape_15},{t:this.shape_14},{t:this.shape_13},{t:this.shape_12},{t:this.shape_11},{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

}).prototype = getMCSymbolPrototype(lib.priceLegal, new cjs.Rectangle(9.1,0,192.3,17.9), null);


(lib.price = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 2
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AgzC9QgQgDgRgIQgYgOgOgQQgLgLAIgIIAkgkQAIgIAFAIQAUAOANAGQARAFATAAQAVAAAQgOQAJgIACgIQAGgLAAgLQAAgOgGgLQgCgIgJgIQgIgGgLgFQgLgDgNAAIhVAAQgTAAAAgSIAAivQAAgMALAAIC0AAQALAAAAAMIAAAwQAAALgLAAIhyAAIAAA9IAoAAQAcAAAYAIQAZAJAQAQQARAQAIAYQALAWAAAeQAAAcgLAYQgLAWgTATQgTATgZAIQgbAMgbAAQgWAAgTgGg");
	this.shape.setTransform(157.4,135.1);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

	// Layer 1
	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#FFFFFF").s().p("AhxDCQgLABAAgLIAAgFQAAgHAHgJQAkgwBqiUQAOgXAAgUQAAgRgNgLQgOgNgVAAQgQAAgPAJQgKAGgOAOQgIAHgIgHIgjgjQgHgHAHgIQAWgXAVgOQAPgJARgEQASgFAUAAQAcgBAZAKQAXAIARAQQAQAPAJAWQAJAUAAAYQAAAUgGARQgEAMgMAXQgLASgfAsIgwBCIAAABIBiAAQALAAAAALIAAAzQAAALgLgBg");
	this.shape_1.setTransform(127.2,134.6);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#FFFFFF").s().p("AgCBNQAAAAgBgBQgBAAAAAAQgBgBAAAAQAAgBAAgBIAAgSQgRgBgQgLQgCgDACgEIAGgLQACgEAEACIAJAGQAGAEAGABIAAgdIgMgGIgMgIQgEgFgDgFQgEgHAAgHQAAgHACgFQADgGAEgEQAEgFAHgDQAGgDAJgBIAAgFQAAgBAAgBQAAAAABgBQAAAAABAAQABAAAAAAIADAAQAAAAABAAQABAAAAAAQABABAAAAQAAABAAABIAAAGQAQABAQALQADACgCAEIgKANQgBABAAAAQgBABAAAAQgBAAAAAAQgBAAgBgBQgJgHgJgDIAAAZIALAHQAIAEAFADQAGAFADAFQADAHAAAIQAAAGgCAHQgDAGgFAFQgEAFgHADQgHACgIABIAAASQAAABAAABQAAAAgBABQAAAAgBAAQgBABAAAAgAAEAiQAEgBADgDQACgDAAgDQAAgEgCgEQgCgEgFgDgAgMgrQgDADAAAEQAAAEACADIAIAGIAAgWQgEAAgDACg");
	this.shape_2.setTransform(109.6,127);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#FFFFFF").s().p("AAWAjQAAAAAAAAQgBAAAAgBQAAAAAAAAQgBgBAAAAIAAgeIgnAAIAAAeQAAAAAAABQAAAAgBAAQAAABAAAAQgBAAAAAAIgEAAQAAAAgBAAQAAAAgBgBQAAAAAAAAQAAgBAAAAIAAhBQAAAAAAgBQAAAAAAAAQABgBAAAAQABAAAAAAIAEAAQAAAAABAAQAAAAAAABQABAAAAAAQAAABAAAAIAAAdIAnAAIAAgdQAAAAABgBQAAAAAAAAQAAgBABAAQAAAAAAAAIAEAAQAAAAABAAQAAAAAAABQABAAAAAAQAAABAAAAIAABBQAAAAAAABQAAAAgBAAQAAABAAAAQgBAAAAAAg");
	this.shape_3.setTransform(165.1,162.5);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#FFFFFF").s().p("AgBAjQAAAAgBAAQAAAAAAgBQAAAAgBAAQAAgBAAAAIAAg8IgRAAQgBAAAAgBQgBAAAAAAQAAAAAAAAQAAgBAAAAIAAgDQAAAAAAgBQAAAAAAAAQAAgBABAAQAAAAABAAIApAAQABAAAAAAQABAAAAABQAAAAAAAAQAAABAAAAIAAADQAAAAAAABQAAAAAAAAQAAAAgBAAQAAABgBAAIgRAAIAAA8QAAAAAAABQgBAAAAAAQAAABAAAAQgBAAAAAAg");
	this.shape_4.setTransform(157.3,162.5);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#FFFFFF").s().p("AAaAkIgBgBIgtg3IAAA1QAAAAAAABQAAAAgBAAQAAABAAAAQgBAAAAAAIgEAAQAAAAAAAAQgBAAAAgBQAAAAAAAAQAAgBAAAAIAAhCQAAAAAAgBQAAAAAAAAQAAgBABAAQAAAAAAAAIACAAIABABIAsA2IAAAAIAAg0QAAAAABgBQAAAAAAAAQAAgBAAAAQABAAAAAAIADAAQABAAAAAAQABAAAAABQAAAAAAAAQAAABAAAAIAABCQAAAAAAABQAAAAAAABQAAAAgBAAQAAAAgBAAg");
	this.shape_5.setTransform(149.5,162.5);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#FFFFFF").s().p("AgGAkIgHgDIgGgDIgGgEIgDgGIgEgGIgCgGIgBgIIABgGIACgHIAEgGIADgGIAGgEIAGgDIAHgDIAGAAIAIAAIAGADIAGADIAGAEIAEAGIAEAGIACAHIAAAGIAAAIIgCAGIgEAGIgEAGIgGAEIgGADIgGADIgIAAIgGAAgAgFgbIgFABIgJAHIgHAJQgCAHAAADIABAGIABAFIAHAJIAJAGIAFACIAFABQAEAAAHgDIAJgGIAHgJIABgFIABgGIgCgKIgHgJIgJgHIgFgBIgGgBIgFABg");
	this.shape_6.setTransform(140,162.5);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#FFFFFF").s().p("AAAAkIgCgBIgSg0IgBAAIgIAzQAAAAAAAAQAAAAgBABQAAAAAAAAQgBAAAAAAIgEAAQgBAAAAAAQAAAAgBgBQAAAAAAAAQAAgBAAAAIANhDQAAAAAAAAQAAAAABgBQAAAAAAAAQABAAAAAAIABAAQABAAAAAAQAAAAABAAQAAAAAAABQAAAAAAAAIATA2IABAAIATg2IACgBIABAAQABAAAAAAQAAAAABAAQAAABAAAAQAAAAAAAAIANBDQAAAAAAABQAAAAAAAAQgBABAAAAQAAAAgBAAIgEAAIgCgBIgIgzIgBAAIgSA0QAAAAgBAAQAAABAAAAQAAAAAAAAQgBAAAAAAg");
	this.shape_7.setTransform(130.2,162.5);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#FFFFFF").s().p("AAbAjQAAAAgBAAQAAAAAAAAQAAAAAAAAQgBAAAAgBIgHgQIgjAAIgHAQIgCABIgEAAIgBgBQAAAAAAAAQgBAAAAAAQAAAAAAgBQAAAAAAAAIAfhCIABgBIABAAIABABIAeBCIAAABIgBABgAAPAMIgPggIAAAAIgOAgIAdAAg");
	this.shape_8.setTransform(117.1,162.5);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#178CCC").s().p("AlJFKQiIiJAAjBQAAjACIiJQCJiIDAAAQDBAACJCIQCICJAADAQAADBiICJQiJCIjBAAQjAAAiJiIg");
	this.shape_9.setTransform(140.4,140.4);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.rf(["rgba(255,255,255,0.639)","rgba(255,255,255,0)"],[0,1],0,0,0,0,0,141.1).s().p("AvgPgQmbmaAApGQAApFGbmaQGcmcJEAAQJFAAGbGcQGcGaAAJFQAAJGmcGaQmbGcpFAAQpEAAmcmcg");
	this.shape_10.setTransform(140.4,140.4);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1}]}).wait(1));

}).prototype = getMCSymbolPrototype(lib.price, new cjs.Rectangle(0,0,280.8,280.7), null);


(lib.legal = function(mode,startPosition,loop) {
if (loop == null) { loop = false; }	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AgBAcQAAAAAAAAQAAAAgBAAQAAgBAAAAQAAAAAAAAIAAgaIgTgZIAAgCIABgBIADAAIACABIAPAWIAQgWIABgBIAFAAIABABIAAACIgUAZIAAAaQAAAAAAAAQAAAAAAABQgBAAAAAAQAAAAAAAAg");
	this.shape.setTransform(92.2,7.8);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#FFFFFF").s().p("AgNAcQAAAAgBAAQAAAAAAAAQAAgBAAAAQAAAAAAAAIAAg0QAAgBAAAAQAAAAAAgBQAAAAAAAAQABAAAAAAIAEAAQAAAAAAAAQAAAAABAAQAAABAAAAQAAAAAAABIAAAvIAWAAQAAAAABABQAAAAAAAAQAAAAAAAAQAAABAAAAIAAADQAAAAAAAAQAAAAAAABQAAAAAAAAQgBAAAAAAg");
	this.shape_1.setTransform(88,7.8);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#FFFFFF").s().p("AgQAcQgBAAAAAAQAAAAAAAAQgBgBAAAAQAAAAAAAAIAAg0QAAgBAAAAQAAAAABgBQAAAAAAAAQAAAAABAAIARAAIAHACIAFADIAEAGQACADAAADQAAAFgCACIgEAGIgFADIgHABIgMAAIAAAUQAAAAAAAAQgBAAAAABQAAAAAAAAQgBAAAAAAgAgLACIALAAIAFgBIAEgCIACgEIABgFIgBgEIgCgEIgEgCIgFgBIgLAAg");
	this.shape_2.setTransform(82.8,7.8);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#FFFFFF").s().p("AgQAcQgBAAAAAAQAAAAAAAAQgBgBAAAAQAAAAAAAAIAAg0QAAgBAAAAQAAAAABgBQAAAAAAAAQAAAAABAAIARAAIAHACIAFADIAEAGQACADAAADQAAAFgCACIgEAGIgFADIgHABIgMAAIAAAUQAAAAAAAAQAAAAgBABQAAAAAAAAQgBAAAAAAgAgLACIALAAIAFgBIAEgCIACgEIABgFIgBgEIgCgEIgEgCIgFgBIgLAAg");
	this.shape_3.setTransform(77.3,7.8);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#FFFFFF").s().p("AAVAcIgBgBIgGgMIgbAAIgGAMIgCABIgCAAIgCAAIAAgCIAYg1IABAAIABAAIABAAIAYA1IAAACIgCAAgAAMAJIgLgZIgBAAIgLAZIAXAAg");
	this.shape_4.setTransform(71.2,7.7);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#FFFFFF").s().p("AgQAWQAAAAAAAAQAAgBAAAAQAAAAAAgBQAAAAAAAAIABgCQAAAAABgBQAAAAAAAAQABAAAAAAQABAAAAABQAGAFAGAAIAFgBIADgBIACgDIABgEIgBgDIgCgEIgFgDIgFgCIgGgCIgEgEIgDgDIgBgHIABgEIADgEQACgDADgBQAEgCADAAQAIAAAGAFQAAAAABAAQAAAAAAAAQAAABAAAAQAAABgBAAIgBABQAAABAAAAQAAAAAAAAQgBAAAAAAQgBAAAAAAIgFgDIgGAAIgEAAIgEACIgCAEIAAACIABAEIACADIADACIAEACIAHADIAGADIADAFIABAGIgBAGIgEAEIgFAEQgDABgEAAQgIAAgIgHg");
	this.shape_5.setTransform(63,7.8);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#FFFFFF").s().p("AAUAdIAAgBIgkgsIAAArQAAAAAAAAQAAAAAAABQgBAAAAAAQAAAAAAAAIgEAAQAAAAAAAAQAAAAgBAAQAAgBAAAAQAAAAAAAAIAAg1QAAgBAAAAQAAAAAAgBQABAAAAAAQAAAAAAAAIACAAIABABIAjArIAAgpQAAgBAAAAQAAAAAAgBQABAAAAAAQAAAAABAAIACAAQABAAAAAAQAAAAABAAQAAABAAAAQAAAAAAABIAAA1QAAAAAAAAQAAAAAAABQgBAAAAAAQAAAAgBAAg");
	this.shape_6.setTransform(57,7.8);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#FFFFFF").s().p("AgFAcIgFgBIgFgDIgEgDIgEgFIgCgEIgCgGIgBgGIABgFIACgFIACgFIAEgFIAEgDIAFgCIAFgCIAFgBIAGABIAFACIAFACIAFADIADAFIADAFIABAFIABAFIgBAGIgBAGIgDAEIgDAFIgFADIgFADIgFABIgGABIgFgBgAgEgWIgEABIgHAGIgFAHIgCAIIAAAEIACAFIAFAHIAHAFIAEABIAEABIAJgCIAIgFIAFgHIABgFIAAgEIgBgIIgFgHIgIgGIgEgBIgFAAIgEAAg");
	this.shape_7.setTransform(49.9,7.8);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#FFFFFF").s().p("AgBAcQAAAAAAAAQgBAAAAAAQAAgBAAAAQAAAAAAAAIAAg0QAAgBAAAAQAAAAAAgBQAAAAABAAQAAAAAAAAIADAAQAAAAAAAAQABAAAAAAQAAABAAAAQAAAAAAABIAAA0QAAAAAAAAQAAAAAAABQAAAAgBAAQAAAAAAAAg");
	this.shape_8.setTransform(44.7,7.8);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#FFFFFF").s().p("AAAAcQgBAAAAAAQAAAAgBAAQAAgBAAAAQAAAAAAAAIAAgxIgOAAQAAAAgBAAQAAAAAAAAQAAAAAAAAQAAgBAAAAIAAgCQAAgBAAAAQAAAAAAgBQAAAAAAAAQABAAAAAAIAhAAQAAAAABAAQAAAAAAAAQAAABAAAAQABAAAAABIAAACQAAAAgBABQAAAAAAAAQAAAAAAAAQgBAAAAAAIgOAAIAAAxQAAAAAAAAQAAAAAAABQgBAAAAAAQAAAAAAAAg");
	this.shape_9.setTransform(40.8,7.8);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#FFFFFF").s().p("AgBAcIgEgBIgGgDIgEgDIgEgFIgCgEIgCgGIAAgGIAAgFIACgFIACgFIAEgFIAEgDIAGgCIAEgCIAFgBIAGAAIAFACIAJAFQAAABAAAAQABABAAAAQAAAAgBAAQAAABAAAAIgCACQAAAAgBAAQAAAAAAAAQAAAAgBAAQAAAAAAAAQgDgDgEgCIgJgBIgEAAIgEACQgFACgCADQgDADgBAEIgCAIIABAEIABAFQABAEADADIAHAFIAEABIAEABIAJgCIAHgEQAAAAAAAAQABAAAAAAQAAAAAAAAQABAAAAAAIABACIABABIgBABQgFAEgEACIgEACIgGAAIgFgBg");
	this.shape_10.setTransform(35.2,7.8);

	this.shape_11 = new cjs.Shape();
	this.shape_11.graphics.f("#FFFFFF").s().p("AgBAcQAAAAAAAAQgBAAAAAAQAAgBAAAAQAAAAAAAAIAAg0QAAgBAAAAQAAAAAAgBQAAAAABAAQAAAAAAAAIADAAQAAAAAAAAQABAAAAAAQAAABAAAAQAAAAAAABIAAA0QAAAAAAAAQAAAAAAABQAAAAgBAAQAAAAAAAAg");
	this.shape_11.setTransform(30.5,7.8);

	this.shape_12 = new cjs.Shape();
	this.shape_12.graphics.f("#FFFFFF").s().p("AAOAcIgCgBIgLgVIgNAAIAAAVQAAAAgBAAQAAAAAAABQAAAAAAAAQgBAAAAAAIgEAAQAAAAAAAAQAAAAgBAAQAAgBAAAAQAAAAAAAAIAAg0QAAgBAAAAQAAAAAAgBQABAAAAAAQAAAAAAAAIAUAAQAEAAADACQAEAAACADIADAGQACADAAADIgBAFIgCAFIgEADIgFACIALAUIAAACIgCABgAgMABIAOAAIAFgBIADgCIACgDIACgFIgCgEIgCgEIgDgDIgFAAIgOAAg");
	this.shape_12.setTransform(26.2,7.8);

	this.shape_13 = new cjs.Shape();
	this.shape_13.graphics.f("#FFFFFF").s().p("AAAAcQgBAAAAAAQAAAAgBAAQAAgBAAAAQAAAAAAAAIAAgxIgOAAQAAAAgBAAQAAAAAAAAQAAAAAAAAQAAgBAAAAIAAgCQAAgBAAAAQAAAAAAgBQAAAAAAAAQABAAAAAAIAhAAQAAAAABAAQAAAAAAAAQAAABAAAAQABAAAAABIAAACQAAAAgBABQAAAAAAAAQAAAAAAAAQgBAAAAAAIgOAAIAAAxQAAAAAAAAQAAAAAAABQgBAAAAAAQAAAAgBAAg");
	this.shape_13.setTransform(20.6,7.8);

	this.shape_14 = new cjs.Shape();
	this.shape_14.graphics.f("#FFFFFF").s().p("AgQAWQAAAAAAAAQAAgBAAAAQAAAAAAgBQAAAAAAAAIABgCQAAAAABgBQAAAAAAAAQABAAAAAAQABAAAAABQAGAFAGAAIAFgBIADgBIACgDIABgEIgBgDIgCgEIgFgDIgFgCIgGgCIgEgEIgDgDIgBgHIABgEIADgEQACgDADgBQAEgCADAAQAIAAAGAFQAAAAABAAQAAAAAAAAQAAABAAAAQAAABgBAAIgBABQAAABAAAAQAAAAAAAAQgBAAAAAAQgBAAAAAAIgFgDIgGAAIgEAAIgEACIgCAEIAAACIABAEIACADIADACIAEACIAHADIAGADIADAFIABAGIgBAGIgEAEIgFAEQgDABgEAAQgIAAgIgHg");
	this.shape_14.setTransform(15.6,7.8);

	this.shape_15 = new cjs.Shape();
	this.shape_15.graphics.f("#FFFFFF").s().p("AgPAcQAAAAAAAAQgBAAAAAAQAAgBAAAAQAAAAAAAAIAAg0QAAgBAAAAQAAAAAAgBQAAAAABAAQAAAAAAAAIAfAAQAAAAAAAAQABAAAAAAQAAABAAAAQAAAAAAABIAAACQAAAAAAABQAAAAAAAAQAAAAgBAAQAAAAAAAAIgaAAIAAAUIAWAAQABAAAAAAQAAAAAAAAQABABAAAAQAAAAAAAAIAAACQAAAAAAAAQAAABgBAAQAAAAAAAAQAAABgBAAIgWAAIAAATIAaAAQAAAAAAABQABAAAAAAQAAAAAAAAQAAABAAAAIAAADQAAAAAAAAQAAAAAAABQAAAAgBAAQAAAAAAAAg");
	this.shape_15.setTransform(10.6,7.8);

	this.shape_16 = new cjs.Shape();
	this.shape_16.graphics.f("#FFFFFF").s().p("AAOAcIgCgBIgKgVIgOAAIAAAVQAAAAgBAAQAAAAAAABQAAAAAAAAQgBAAAAAAIgEAAQAAAAAAAAQAAAAgBAAQAAgBAAAAQAAAAAAAAIAAg0QAAgBAAAAQAAAAAAgBQABAAAAAAQAAAAAAAAIAVAAQADAAADACQADAAACADIAEAGQACADAAADIgBAFIgDAFIgDADIgFACIALAUIAAACIgCABgAgMABIAOAAIAEgBIAEgCIADgDIABgFIgBgEIgDgEIgEgDIgEAAIgOAAg");
	this.shape_16.setTransform(4.9,7.8);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_16},{t:this.shape_15},{t:this.shape_14},{t:this.shape_13},{t:this.shape_12},{t:this.shape_11},{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

}).prototype = getMCSymbolPrototype(lib.legal, new cjs.Rectangle(0,0,97.3,15.2), null);


(lib.shine = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.lf(["rgba(255,255,255,0.039)","#FFFFFF","rgba(255,255,255,0)"],[0,0.498,1],-51.7,0,51.7,0).s().p("AoEPPIAA+dIQJAAIAAedg");
	this.shape.setTransform(51.7,97.5);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = getMCSymbolPrototype(lib.shine, new cjs.Rectangle(0,0,103.5,195), null);


(lib.ctaCopy = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AgrBNQgFAAAAgEIAAiRQAAgEAFAAIBYAAQAEAAAAAEIAAASQAAAEgEAAIhAAAIAAAkIA1AAQAEAAAAAFIAAARQAAAEgEAAIg1AAIAAAmIBAAAQAEAAAAAFIAAASQAAAEgEAAg");
	this.shape.setTransform(257.8,18.8);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#FFFFFF").s().p("AgrBNQgFAAAAgEIAAiRQAAgEAFAAIBYAAQAEAAAAAEIAAASQAAAEgEAAIhAAAIAAAkIA1AAQAEAAAAAFIAAARQAAAEgEAAIg1AAIAAAmIBAAAQAEAAAAAFIAAASQAAAEgEAAg");
	this.shape_1.setTransform(244.1,18.8);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#FFFFFF").s().p("AAcBNQAAAAgBAAQAAgBgBAAQAAAAgBAAQAAgBAAAAIgcg6IgZAAIAAA4QAAAEgEAAIgUAAQgEAAAAgEIAAiRQAAgEAEAAIA+AAQAJAAAJAEQAJADAGAHQAHAGAEAJQADAJAAAJQAAAIgCAHQgCAGgFAGQgEAFgGAEQgGAFgHADIAeA3QABABAAAAQAAABAAABQAAAAAAABQAAAAgBABQAAAAgBABQAAAAgBAAQAAAAgBABQAAAAgBAAgAgbgGIAiAAQAFAAAEgCQADgBADgDQAEgEABgEQACgEAAgEIgCgIQgBgEgEgDQgGgHgJAAIgiAAg");
	this.shape_2.setTransform(229.4,18.8);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#FFFFFF").s().p("AgrBNQgFAAAAgEIAAiRQAAgEAFAAIBYAAQAEAAAAAEIAAASQAAAEgEAAIhAAAIAAAqIA1AAQAEAAAAAEIAAARQAAAEgEAAIg1AAIAAA4QAAAEgEAAg");
	this.shape_3.setTransform(215.3,18.8);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#FFFFFF").s().p("AgvA+QgEgCACgEIAIgOQABgBAAAAQABgBAAAAQAAAAABAAQAAAAABAAQAAgBABAAQABAAAAABQABAAAAAAQAAAAABABQAIAGAGADQAJAEAKAAQAHAAAGgFQAGgFAAgHQAAgEgCgDQgCgFgDgCQgHgGgNgGIgPgHQgIgEgFgFQgHgGgDgIQgDgHAAgKQAAgHADgHQADgIAFgGQAHgHAJgDQAKgEAMAAQAVAAAWAPIACADQAAABAAAAQAAABAAAAQAAABAAAAQAAABgBAAIgIAMQgEAGgEgCQgSgNgLAAQgJAAgGAFQgEAEAAAGQAAAIAGAGQAGAGAMAFIAQAIQAJAEAGAFQAHAGAEAHQAEAIAAALQAAAIgDAIQgEAIgHAGQgGAGgJAEQgKADgLAAQgbAAgUgRg");
	this.shape_4.setTransform(195.4,18.8);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#FFFFFF").s().p("AgJBNQgFAAAAgEIAAhGIgyhIQAAgBAAAAQAAgBAAgBQAAAAAAgBQAAAAAAgBQABAAAAgBQAAAAABAAQAAAAABgBQAAAAABAAIAWAAQABAAAAAAQABABAAAAQABAAAAAAQAAABABAAIAiAzIAjgzQAAAAABgBQAAAAAAAAQABAAAAgBQABAAAAAAIAXAAQABAAAAAAQABABAAAAQABAAAAAAQABABAAAAQAAABAAAAQAAABAAAAQAAABAAABQAAAAgBABIgyBIIAABGQAAAEgEAAg");
	this.shape_5.setTransform(182,18.8);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#FFFFFF").s().p("AAyBOQgFAAgCgFIgKgXIhAAAIgMAXQgBAFgFAAIgTAAQgBAAAAAAQgBAAAAgBQgBAAAAAAQAAgBgBAAQAAAAAAgBQAAAAAAgBQAAAAAAgBQAAAAAAgBIBFiSQAAgBAAgBQABAAAAAAQAAgBABAAQABAAAAAAIABAAQABAAABAAQAAAAABABQAAAAAAAAQABABAAABIBDCSQABABAAAAQAAABAAAAQAAABAAAAQAAABgBAAQAAAAAAABQAAAAgBAAQAAABgBAAQAAAAgBAAgAAWAZIgWguIAAAAIgVAuIArAAg");
	this.shape_6.setTransform(168.6,18.7);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#FFFFFF").s().p("Ag9BNQgFAAAAgEIAAiRQAAgEAFAAIAzAAIAPACQAHABAIADIAMAHIAMAKIAJALQAFAGACAHIAFAOQACAIAAAHQAAAIgCAHQgCAIgDAHQgCAHgFAGQgEAGgFAFIgMAKIgMAHQgIADgHABIgPACgAglAyIAZAAQAKAAAIgEQAJgDAHgHQAHgHADgJQAEgJAAgLQAAgKgEgKQgDgJgHgGQgHgHgJgEQgIgDgKAAIgZAAg");
	this.shape_7.setTransform(152.7,18.8);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#FFFFFF").s().p("AgnBNQgGAAAAgFIABgEIA4h3Ig6AAQgEAAAAgFIAAgQQAAgEAEAAIBdAAQAEAAAAAEIAAAEIhCCLQgDAGgEAAg");
	this.shape_8.setTransform(131.5,18.8);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#FFFFFF").s().p("AAoBNQgEAAAAgEIAAg9IhGAAIAAA9QAAAEgFAAIgUAAQgEAAAAgEIAAiRQAAgEAEAAIAUAAQAFAAAAAEIAAA6IBGAAIAAg6QAAgEAEAAIAUAAQAEAAAAAEIAACRQAAAEgEAAg");
	this.shape_9.setTransform(109.8,18.8);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#FFFFFF").s().p("AgDBNQgHgBgIgDIgNgHIgMgKIgKgMIgGgMIgGgQIgBgQIABgOIAGgQIAGgNIAKgMIAMgKIANgHQAIgDAHgBQAHgCAIAAQAIAAAIACIANADQAJAEAPAMQADADgCADIgOANQgDADgCgDQgIgFgIgEQgJgEgJABQgKAAgIADQgJAEgHAIQgGAHgEAJQgEAJAAAKQAAAKAEAKQAEAIAGAHQAHAHAJAFQAIADAKABQAJgBAKgDQAHgDAIgGQACgCADACIAOAOQADADgDADQgGAGgHAEQgGADgGADIgPAEIgOABIgPgCg");
	this.shape_10.setTransform(93.1,18.8);

	this.shape_11 = new cjs.Shape();
	this.shape_11.graphics.f("#FFFFFF").s().p("AgJBNQgEAAAAgEIAAh7IgiAAQgEAAAAgEIAAgSQAAgEAEAAIBfAAQAEAAAAAEIAAASQAAAEgEAAIghAAIAAB7QAAAEgFAAg");
	this.shape_11.setTransform(78.6,18.8);

	this.shape_12 = new cjs.Shape();
	this.shape_12.graphics.f("#FFFFFF").s().p("AAyBOQgEAAgDgFIgKgXIhAAAIgMAXQgBAFgFAAIgTAAQgBAAAAAAQgBAAAAgBQgBAAAAAAQAAgBgBAAQAAAAAAgBQAAAAAAgBQAAAAAAgBQAAAAAAgBIBFiSQAAgBAAgBQABAAAAAAQABgBAAAAQABAAAAAAIABAAQABAAABAAQAAAAABABQAAAAAAAAQABABAAABIBDCSQABABAAAAQAAABAAAAQAAABAAAAQAAABgBAAQAAAAAAABQAAAAgBAAQAAABgBAAQAAAAgBAAgAAWAZIgWguIAAAAIgVAuIArAAg");
	this.shape_12.setTransform(65.4,18.7);

	this.shape_13 = new cjs.Shape();
	this.shape_13.graphics.f("#FFFFFF").s().p("AArBPQgBAAAAAAQgBAAAAAAQgBgBAAAAQAAgBAAAAIgohiIAAAAIgnBiQAAAAAAABQgBAAAAABQgBAAAAAAQgBAAAAAAIgEAAQgDAAgBgDIgpiTQgBgEAFAAIAUAAQADAAABACIAXBXIAAAAIAkhZQAAgBAAgBQAAAAABAAQAAgBABAAQAAAAABAAIADAAQABAAAAAAQABAAAAABQABAAAAAAQAAABAAABIAkBZIAAAAIAXhXQABgCADAAIAUAAQAFAAgBAEIgqCTQAAADgDAAg");
	this.shape_13.setTransform(48.2,18.8);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_13},{t:this.shape_12},{t:this.shape_11},{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

}).prototype = getMCSymbolPrototype(lib.ctaCopy, new cjs.Rectangle(0,0,303.3,36.7), null);


(lib.carat = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 3
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("Ag0BFIBHhEIhJhDIATgTIBaBVIhZBWg");
	this.shape.setTransform(5.6,8.9);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = getMCSymbolPrototype(lib.carat, new cjs.Rectangle(0.1,0.3,11.1,17.2), null);


(lib.compareD = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#6C6C6C").s().p("AgRBnQgIgCgHgEIgNgJQgGgFgFgGIgIgQIgHgRQgDgNgBgfQAAgPAEgcIAHgSIAIgPQAFgGAGgGQAGgFAHgEQAHgDAIgBQAJgCAIAAQAJAAAIACQAIABAHADQAHAEAGAFQAGAGAFAGQAFAHAEAIIAGASQAFAcAAAPQgBAfgEANIgGARQgEAJgFAHQgFAGgGAFIgNAJQgHAEgIACQgIACgJAAQgIAAgJgCgAgMg5QgFAFgEAHQgEAIgDAMQgCAMAAANQAAAOACAMQADAMAEAIQAEAIAFAEQAGAFAGgBQAHABAFgFQAGgEAEgIQAEgIACgMQADgMAAgOQAAgNgDgMQgCgMgEgIQgEgHgGgFQgFgEgHAAQgGAAgGAEg");
	this.shape.setTransform(39.9,25.9);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#6C6C6C").s().p("AAQBnQgFAAAAgGIAAgkIhXAAQgGAAAAgGIAAgZQAAgHAEgEIBkh3QAAAAABgBQAAAAABAAQAAgBABAAQABAAAAAAIAWAAQAFAAAAAGIAAB4IAYAAQAGAAAAAGIAAAZQAAAGgGAAIgYAAIAAAkQAAAGgFAAgAgjAYIAAABIAuAAIAAg4IgBAAg");
	this.shape_1.setTransform(22.1,25.8);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_1},{t:this.shape}]}).wait(1));

	// Layer 5
	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#6C6C6C").s().p("AgBA7QgBAAAAgBQgBAAAAAAQAAAAAAgBQAAAAgBAAIAAgPQgMAAgMgJQgCgCABgEIAFgIQAAgBABAAQAAgBABAAQAAAAABAAQAAAAABAAIAHAGQAFACAEAAIAAgVIgJgFIgIgGQgFgDgCgEQgCgGAAgFQAAgFACgFQACgEADgEQADgDAFgCQAGgDAFAAIAAgEQABgBAAAAQAAgBAAAAQAAAAABAAQAAAAABAAIACAAQAAAAABAAQAAAAABAAQAAAAAAABQABAAAAABIAAAEQALABANAJQABAAAAABQAAAAAAAAQAAABAAABQAAAAAAABIgIAKQAAABgBAAQAAAAgBABQAAAAgBAAQAAgBgBAAQgHgGgGgCIAAAUIAJAEIAJAHQAEADADAEQACAFAAAGQAAAFgCAFQgCAFgEAEQgDADgFADQgGACgFAAIAAAPQAAAAgBAAQAAABAAAAQgBAAAAAAQgBABAAAAgAAEAaQADAAABgDQADgCAAgDQAAgDgDgDIgEgFgAgJggQAAAAAAABQgBAAAAABQAAAAAAABQgBAAAAABQABAEABACIAFAEIAAgRIgFADg");
	this.shape_2.setTransform(10.8,21.4);

	this.timeline.addTween(cjs.Tween.get(this.shape_2).wait(1));

	// YouTube TV
	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#363636").s().p("AAAAgIgBgBIgcg8IAAgCIABAAIAKAAIABABIARAmIAAAAIASgmIABgBIAKAAIABAAIAAACIgcA8IgCABg");
	this.shape_3.setTransform(47.4,8.6);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#363636").s().p("AgEAgQAAAAAAAAQAAAAgBgBQAAAAAAAAQAAAAAAgBIAAgyIgOAAQAAAAgBAAQAAAAAAgBQAAAAAAAAQgBAAAAgBIAAgHQAAgBABAAQAAAAAAAAQAAgBAAAAQABAAAAAAIAnAAQAAAAABAAQAAAAAAABQAAAAAAAAQAAAAAAABIAAAHQAAABAAAAQAAAAAAAAQAAABAAAAQgBAAAAAAIgOAAIAAAyQAAABAAAAQAAAAAAAAQgBABAAAAQAAAAgBAAg");
	this.shape_4.setTransform(42.1,8.5);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#363636").s().p("AgHAUQgEgBgDgDIgEgIQgBgDAAgFQAAgDABgFIAEgHQADgCAEgCQAEgCAEAAQAEAAADACIAGADQADADACAEIABAIIAAABQAAABAAAAQgBAAAAABQAAAAAAAAQgBAAAAAAIgaAAIABAEIACADIADACIADABQAFAAAEgDQABAAAAgBQABAAAAAAQAAAAABAAQAAABAAAAIAEAFQAAAAAAAAQAAABAAAAQAAAAAAABQAAAAgBAAIgGAEQgEACgFAAQgEAAgEgCgAAJgEQgBgEgCgBQgCgCgEAAQgCAAgDACQgCABAAAEIAQAAIAAAAg");
	this.shape_5.setTransform(35.5,9.6);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#363636").s().p("AgMAaIgBADQAAABAAAAQAAABgBAAQAAAAAAAAQgBAAAAAAIgDAAQAAAAgBAAQAAAAAAAAQgBAAAAgBQAAAAAAgBIAAg6QAAgBAAAAQAAAAABgBQAAAAAAAAQABAAAAAAIAHAAQABAAAAAAQAAAAABAAQAAABAAAAQAAAAAAABIAAAUIAEgBIAGgBQAEAAAEACQADACADADIAFAGQABAEAAAEQAAAFgBAEIgFAHQgDADgDABQgDACgFAAQgIAAgFgGgAgJABIAAAPIADAEQADACADAAIAEgBIADgDIACgDIABgFIgBgEIgCgEIgEgCIgDAAQgFAAgEABg");
	this.shape_6.setTransform(30.7,8.6);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#363636").s().p("AgKAUQgDgCgBgCIgDgGIgBgHIAAgVQAAgBABAAQAAgBAAAAQAAAAABAAQAAgBABAAIAHAAQABAAAAABQAAAAAAAAQABAAAAABQAAAAAAABIAAAVQAAAEACACQABACADAAQADAAACgCIACgGIAAgVQAAgBABAAQAAgBAAAAQAAAAABAAQAAgBAAAAIAHAAQABAAAAABQABAAAAAAQAAAAAAABQAAAAAAABIAAAlQAAAAAAAAQAAABAAAAQAAAAgBAAQAAAAgBAAIgCAAQgBAAAAAAQAAAAgBAAQAAAAAAAAQAAgBAAAAIgCgEQgGAHgGgBQgFABgDgCg");
	this.shape_7.setTransform(25.6,9.7);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#363636").s().p("AgEAgQAAAAAAAAQAAAAgBgBQAAAAAAAAQAAAAAAgBIAAgyIgOAAQAAAAgBAAQAAAAAAgBQAAAAAAAAQAAAAAAgBIAAgHQAAgBAAAAQAAAAAAAAQAAgBAAAAQABAAAAAAIAnAAQAAAAABAAQAAAAAAABQAAAAAAAAQAAAAAAABIAAAHQAAABAAAAQAAAAAAAAQAAABAAAAQgBAAAAAAIgOAAIAAAyQAAABAAAAQAAAAgBAAQAAABAAAAQAAAAgBAAg");
	this.shape_8.setTransform(21.6,8.5);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#363636").s().p("AgKAUQgDgCgCgCIgCgGIAAgHIAAgVQAAgBAAAAQAAgBAAAAQAAAAABAAQAAgBAAAAIAIAAQAAAAABABQAAAAABAAQAAAAAAABQAAAAAAABIAAAVQAAAEABACQACACADAAQADAAACgCIADgGIAAgVQAAgBAAAAQAAgBAAAAQAAAAABAAQAAgBAAAAIAIAAQAAAAAAABQABAAAAAAQAAAAAAABQABAAAAABIAAAlQAAAAgBAAQAAABAAAAQAAAAgBAAQAAAAAAAAIgEAAQAAAAAAAAQgBAAAAAAQAAAAAAAAQAAgBgBAAIgBgEQgGAHgGgBQgFABgDgCg");
	this.shape_9.setTransform(17.5,9.7);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#363636").s().p("AgIAUQgDgBgEgDQgDgEgBgEQgBgDAAgFQAAgDABgFQABgDADgEQAEgCADgCQAEgCAEAAQAEAAAEACQAEACADACQADAEABADQACAFAAADQAAAFgCADQgBAEgDAEQgDADgEABQgEACgEAAQgEAAgEgCgAgDgJQgBAAAAAAQgBAAAAAAQgBABAAAAQgBABAAAAIgCAEIgBADIABAFIACADQAAABABAAQAAAAABABQAAAAABAAQAAAAABAAIADABIAEgBQAAAAABAAQAAAAABAAQAAgBABAAQAAAAABgBIACgDIABgFIgBgDIgCgEQgBAAAAgBQgBAAAAgBQgBAAAAAAQgBAAAAAAIgEgBIgDABg");
	this.shape_10.setTransform(12.7,9.6);

	this.shape_11 = new cjs.Shape();
	this.shape_11.graphics.f("#363636").s().p("AgDAgQgBAAAAAAQAAAAgBgBQAAAAAAAAQAAAAAAgBIAAgdIgVgdIAAgCIABgBIAKAAIABABIAOAVIAOgVIACgBIAJAAIACABIAAACIgVAdIAAAdQAAABAAAAQAAAAgBAAQAAABAAAAQgBAAAAAAg");
	this.shape_11.setTransform(8.5,8.5);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_11},{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3}]}).wait(1));

}).prototype = getMCSymbolPrototype(lib.compareD, new cjs.Rectangle(3.7,0,48.9,47.4), null);


(lib.compareC = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#6C6C6C").s().p("AgRBlIgJgXQgDgGAIgDQA0gRAIgeQgPAGgOAAQgKAAgKgEQgLgEgIgIQgJgJgFgKQgFgNgBgQQABgOAFgNQAGgMAJgKQAKgJAMgFQAMgGANAAQAMAAASAGQAOAGAKAMQAIAKAFAPQAFAPAAARQAAARgDANQgDAOgGAMQgEALgIAKQgGAJgJAIIgQAOIgQAKQgPAIgNADIgEABQgEAAgBgFgAAJg9QgGACgDAEQgIAJAAALQAAAGACAFQADAGADAEQADAEAGACQAEACAHAAQAGAAAEgCQAGgCAEgEQAEgEACgGQACgFAAgGQAAgLgIgJQgEgEgGgCQgEgCgGAAQgHAAgEACgAi/BNQgCgEADgDIARgUQAEgDADADQAIAGAGADQAJAEALAAQALAAAHgGQAIgGAAgLQAAgGgDgEQgDgFgEgDQgFgDgGgCQgHgCgIAAIgRAAQgFAAgBgFIAAgYQABgGAFAAIARAAQAHAAAHgBQAFgCAEgDQAJgGAAgKQAAgKgGgGQgHgHgLAAQgJAAgHAEQgFADgFAFQgDAEgFgDIgSgSQgFgEAFgEQAKgLALgGQAIgFAIgCQAJgDAKAAQANAAANAEQALAEAJAHQAJAHAFAKQAGALgBAMQAAAIgDAIQgCAHgFAGQgIAMgMAFIAAABQAGACAGADQAHAEAFAGQAGAGADAIQADAIAAAKQAAAMgGALQgFALgIAIQgKAIgNAFQgNAEgPAAQgmAAgYgagAjuALQgBAAAAAAQgBAAAAAAQAAgBAAAAQAAAAAAgBIAAgNQgOgBgLgIQgDgCACgEIAFgIQAAgBABgBQAAAAABAAQAAAAABAAQAAAAABAAIAIAFQADADAGAAIAAgWIgJgFIgJgGQgFgEgCgEQgCgFAAgFQAAgFACgFQABgEAEgEQADgDAFgCQAFgDAHAAIAAgEQAAgBAAAAQAAgBAAAAQAAgBABAAQAAAAABAAIACAAQABAAABAAQAAAAABABQAAAAAAABQABAAAAABIAAAEQALABANAJQABAAAAAAQAAABAAAAQAAABAAAAQAAABgBABIgHAKQAAAAgBABQAAAAgBAAQAAAAgBAAQAAAAgBAAQgGgGgHgCIAAATIAJAFIAJAGQAEAEACAFQADAFAAAGQAAAFgCAFQgCAFgDADQgEAEgFACQgGADgFAAIAAANQAAABgBAAQAAAAAAABQgBAAAAAAQgBAAgBAAgAjogUQADgBABgCQACgCAAgDQAAgDgCgDIgEgFgAj2hQQAAABAAAAQgBABAAAAQAAABAAAAQAAABAAABQAAADABADIAGAEIAAgRIgGACgADTACIgEgLQgCgDAFgBQAcgKADgPQgIADgHAAQgFAAgFgCQgGgCgFgEQgFgFgCgGQgDgHAAgIQAAgHADgHQADgGAEgFQAGgFAGgDQAHgDAHAAQAGAAAKAEQAGADAFAGQAGAFABAIQADAIAAAJQAAAIgCAHQgBAIgCAGIgHALIgIAJIgJAHIgIAFQgHADgIACIgCABQAAAAgBgBQAAAAAAAAQgBgBAAAAQAAgBgBAAgADihSIgGADQgEAFAAAGIACAGIACAFIAGADIAFABIAGgBIAEgDIAEgFIABgGQAAgGgFgFIgEgDIgGgBQgDAAgCABgAB+ACIgFgLQgBgDAEgBQAcgKAEgPQgJADgHAAQgFAAgFgCQgGgCgEgEQgFgFgDgGQgCgHAAgIQAAgHACgHQADgGAFgFQAFgFAGgDQAHgDAIAAQAFAAALAEQAGADAFAGQAFAFACAIQACAIABAJQgBAIgBAHIgEAOIgGALIgIAJIgJAHIgIAFQgIADgIACIgBABQgBAAAAgBQgBAAAAAAQgBgBAAAAQAAgBAAAAgACLhSIgEADQgEAFgBAGIABAGIAEAFIAEADIAHABIAFgBIAFgDIADgFIABgGQABgGgFgFIgFgDIgFgBIgHABg");
	this.shape.setTransform(32.5,26.1);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#363636").s().p("AgHAUQgEgBgDgDIgEgIQgBgDAAgFQAAgDABgFIAEgHQADgCAEgCQAEgCAEAAQAEAAADACIAGADQADADACAEIABAIIAAABQAAABAAAAQgBAAAAABQAAAAAAAAQgBAAAAAAIgaAAIABAEIACADIADACIADABQAFAAAEgDQABAAAAgBQABAAAAAAQAAAAABAAQAAABAAAAIAEAFQAAAAAAAAQAAABAAAAQAAAAAAABQAAAAgBAAIgGAEQgEACgFAAQgEAAgEgCgAAJgEQgBgEgCgBQgCgCgEAAQgCAAgDACQgCABAAAEIAQAAIAAAAg");
	this.shape_1.setTransform(60.5,9.6);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#363636").s().p("AgKAUQgDgCgBgCIgDgGIgBgHIAAgVQAAgBABAAQAAgBAAAAQAAAAABAAQAAgBABAAIAHAAQABAAAAABQAAAAAAAAQABAAAAABQAAAAAAABIAAAVQAAAEACACQABACADAAQADAAACgCIACgGIAAgVQAAgBABAAQAAgBAAAAQAAAAABAAQAAgBAAAAIAHAAQABAAAAABQABAAAAAAQAAAAAAABQAAAAAAABIAAAlQAAAAAAAAQAAABAAAAQAAAAgBAAQAAAAgBAAIgCAAQgBAAAAAAQAAAAgBAAQAAAAAAAAQAAgBAAAAIgCgEQgGAHgGgBQgFABgDgCg");
	this.shape_2.setTransform(55.7,9.7);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#363636").s().p("AAAAgIgBgBIgcg8IAAgCIABAAIAKAAIABABIARAmIAAAAIASgmIABgBIAKAAIABAAIAAACIgcA8IgCABg");
	this.shape_3.setTransform(50.9,8.6);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#363636").s().p("AAKAVQgBAAAAAAQAAAAgBAAQAAAAAAgBQAAAAAAAAIAAgWQAAgDgCgCQgCgDgDAAQgDAAgCACIgDAEIAAAYQAAAAgBAAQAAABAAAAQAAAAgBAAQAAAAgBAAIgGAAQgBAAAAAAQgBAAAAAAQAAAAAAgBQgBAAAAAAIAAglQAAgBABAAQAAgBAAAAQAAAAABAAQAAgBABAAIADAAIABACIACAEQAFgHAIAAQAEABAEABQADACACADQACACABAEIABAGIAAAWQAAAAgBAAQAAABAAAAQAAAAgBAAQAAAAAAAAg");
	this.shape_4.setTransform(43.3,9.6);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#363636").s().p("AgIAUQgDgBgEgDQgDgEgBgEQgBgDAAgFQAAgDABgFQABgDADgEQAEgCADgCQAEgCAEAAQAEAAAEACQAEACADACQADAEABADQACAFAAADQAAAFgCADQgBAEgDAEQgDADgEABQgEACgEAAQgEAAgEgCgAgDgJQgBAAAAAAQgBAAAAAAQgBABAAAAQgBABAAAAIgCAEIgBADIABAFIACADQAAABABAAQAAAAABABQAAAAABAAQAAAAABAAIADABIAEgBQAAAAABAAQAAAAABAAQAAgBABAAQAAAAABgBIACgDIABgFIgBgDIgCgEQgBAAAAgBQgBAAAAgBQgBAAAAAAQgBAAAAAAIgEgBIgDABg");
	this.shape_5.setTransform(38.3,9.6);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#363636").s().p("AgCAgQgBAAAAAAQAAAAgBgBQAAAAAAAAQAAgBAAAAIAAglQAAgBAAAAQAAgBAAAAQABAAAAAAQAAAAABAAIAGAAQAAAAABAAQAAAAAAAAQAAAAABABQAAAAAAABIAAAlQAAAAAAABQgBAAAAAAQAAABAAAAQgBAAAAAAgAgEgTQgCgCAAgDQAAgDACgCQACgCACAAQADAAACACQACACAAADQAAADgCACQgCADgDAAQgCAAgCgDg");
	this.shape_6.setTransform(34.6,8.5);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#363636").s().p("AgDAbIgDgDIgCgEIgBgFIAAgTIgEAAQAAAAAAAAQgBAAAAAAQAAgBAAAAQgBAAAAgBIAAgGQAAAAABgBQAAAAAAAAQAAgBABAAQAAAAAAAAIAEAAIAAgLQAAgBABAAQAAgBAAAAQAAAAABAAQAAAAAAAAIAHAAQAAAAABAAQAAAAAAAAQABAAAAABQAAAAAAABIAAALIAKAAQAAAAABAAQAAAAAAABQABAAAAAAQAAABAAAAIAAAGQAAABAAAAQAAAAgBABQAAAAAAAAQgBAAAAAAIgKAAIAAASIABADIACABIAHgCQAAAAABAAQAAAAAAAAQABABAAAAQAAAAAAABIABAFQABABAAAAQAAAAgBABQAAAAAAAAQgBAAAAABQgIACgEAAIgFgBg");
	this.shape_7.setTransform(31.8,9);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#363636").s().p("AgIAVIgFgDQgCgBgBgDIgBgHIABgFIAEgDIAFgCIAHgBIAHABQAAgFgBgBQgBgBAAAAQgBgBAAAAQgBAAAAAAQgBAAgBAAQgFgBgGACQAAAAgBAAQAAAAAAAAQgBAAAAAAQAAgBAAAAIgBgGQAAAAAAAAQAAgBAAAAQAAAAABgBQAAAAAAAAQAIgCAGAAQAFAAADACQADABACACIACAGIABAIIAAAVQAAABAAAAQAAAAgBABQAAAAAAAAQgBAAAAAAIgDAAQgBAAAAAAQAAAAgBAAQAAgBAAAAQAAAAAAgBIgBgDQgDADgDABQgDACgEAAIgFgBgAgEADQAAAAgBABQAAABAAAAQAAABgBAAQAAABAAAAQAAABAAABQAAABABAAQAAABAAAAQAAABABAAQAAAAABABQAAAAABAAQAAAAABAAQAAABABAAIAEgCIADgDIAAgGIgGgCQgDAAgCACg");
	this.shape_8.setTransform(27.7,9.6);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#363636").s().p("AgDAbIgDgDIgCgEIgBgFIAAgTIgEAAQAAAAAAAAQgBAAAAAAQAAgBAAAAQgBAAAAgBIAAgGQAAAAABgBQAAAAAAAAQAAgBABAAQAAAAAAAAIAEAAIAAgLQAAgBABAAQAAgBAAAAQAAAAABAAQAAAAAAAAIAHAAQAAAAABAAQAAAAAAAAQABAAAAABQAAAAAAABIAAALIAKAAQAAAAABAAQAAAAAAABQABAAAAAAQAAABAAAAIAAAGQAAABAAAAQAAAAgBABQAAAAAAAAQgBAAAAAAIgKAAIAAASIABADIACABIAHgCQAAAAABAAQAAAAAAAAQABABAAAAQAAAAAAABIABAFQABABAAAAQAAAAgBABQAAAAAAAAQgBAAAAABQgIACgEAAIgFgBg");
	this.shape_9.setTransform(24,9);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#363636").s().p("AgOASQAAAAAAAAQAAAAAAgBQAAAAAAAAQAAgBAAAAIADgGQAAAAAAAAQAAgBABAAQAAAAAAAAQABAAAAAAQAFADAEABIADgCIABgCQAAAAAAAAQAAgBAAAAQgBAAAAgBQAAAAgBAAIgFgDIgFgDQgBAAAAgBQgBAAAAAAQgBAAAAAAQAAgBAAAAIgDgDIgBgFIABgEIADgEIAFgDIAGgBIAIABIAEACQAAAAABABQAAAAAAABQAAAAAAAAQAAABAAAAIgDAFQAAAAAAABQAAAAgBAAQAAAAAAAAQgBAAAAAAQgFgCgDAAIgCABIgBABIABACIADADIAGADIAEABIAEAEIABAFIgBAFIgEAEIgEADIgHABQgHAAgHgEg");
	this.shape_10.setTransform(20.3,9.6);

	this.shape_11 = new cjs.Shape();
	this.shape_11.graphics.f("#363636").s().p("AgNAgIgCgBIAAgCIAIgVIgNgkIAAgCIACgBIAJAAQAAAAAAAAQABAAAAAAQAAABAAAAQAAAAAAAAIAIAaIAAAAIAJgaIACgBIAIAAIACABIAAACIgYA7IgCABg");
	this.shape_11.setTransform(16.2,10.7);

	this.shape_12 = new cjs.Shape();
	this.shape_12.graphics.f("#363636").s().p("AgIAVIgFgDQgCgBgBgDIgBgHIABgFIAEgDIAFgCIAHgBIAHABQAAgFgBgBQgBgBAAAAQgBgBAAAAQgBAAAAAAQgBAAgBAAQgFgBgGACQAAAAgBAAQAAAAAAAAQgBAAAAAAQAAgBAAAAIgBgGQAAAAAAAAQAAgBAAAAQAAAAABgBQAAAAAAAAQAIgCAGAAQAFAAADACQADABACACIACAGIABAIIAAAVQAAABAAAAQAAAAgBABQAAAAAAAAQgBAAAAAAIgDAAQgBAAAAAAQAAAAAAAAQgBgBAAAAQAAAAAAgBIgBgDQgDADgDABQgDACgEAAIgFgBgAgEADQAAAAgBABQAAABAAAAQgBABAAAAQAAABAAAAQAAABAAABQAAABABAAQAAABAAAAQAAABABAAQAAAAABABQAAAAABAAQAAAAABAAQABABAAAAIAEgCIADgDIAAgGIgGgCQgDAAgCACg");
	this.shape_12.setTransform(11.8,9.6);

	this.shape_13 = new cjs.Shape();
	this.shape_13.graphics.f("#363636").s().p("AgDAgQAAAAgBAAQAAAAAAgBQAAAAgBAAQAAgBAAAAIAAg7QAAAAAAgBQABAAAAAAQAAgBAAAAQABAAAAAAIAHAAQAAAAABAAQAAAAAAABQABAAAAAAQAAABAAAAIAAA7QAAAAAAABQAAAAgBAAQAAABAAAAQgBAAAAAAg");
	this.shape_13.setTransform(8.6,8.5);

	this.shape_14 = new cjs.Shape();
	this.shape_14.graphics.f("#363636").s().p("AgTAgQAAAAgBAAQAAAAAAgBQAAAAgBAAQAAAAAAgBIAAg7QAAgBAAAAQABAAAAAAQAAgBAAAAQABAAAAAAIAVAAQAEAAADACQAEABADADQADADABADIACAIIgCAIQgBADgDADIgGAEIgIACIgLAAIAAAVQAAABAAAAQAAAAAAAAQAAABgBAAQAAAAAAAAgAgJgBIAKAAIAEgBIADgCIACgDIAAgEIAAgDIgCgDQgDgDgEAAIgKAAg");
	this.shape_14.setTransform(5,8.5);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_14},{t:this.shape_13},{t:this.shape_12},{t:this.shape_11},{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

}).prototype = getMCSymbolPrototype(lib.compareC, new cjs.Rectangle(0,0,64.9,36.7), null);


(lib.compareB = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#6C6C6C").s().p("AgRBlIgJgXQgCgGAHgDQA0gRAIgeQgQAGgNAAQgKAAgKgEQgLgEgIgIQgJgJgFgKQgFgNgBgQQABgOAFgNQAGgMAJgKQAKgJAMgFQALgGAOAAQAMAAASAGQAOAGAKAMQAIAKAFAPQAFAPAAARQAAARgDANQgDAOgFAMQgGALgHAKQgGAJgIAIIgRAOIgQAKQgPAIgNADIgEABQgEAAgBgFgAAJg9QgGACgDAEQgIAJAAALQAAAGACAFQADAGADAEQADAEAGACQAEACAHAAQAFAAAFgCQAGgCAEgEQAEgEACgGQADgFgBgGQAAgLgIgJQgEgEgGgCQgFgCgFAAQgHAAgEACgAi/BNQgCgEADgDIARgUQAEgDADADQAIAGAGADQAJAEALAAQALAAAHgGQAIgGAAgLQgBgGgCgEQgCgFgFgDQgFgDgGgCQgHgCgIAAIgRAAQgGAAAAgFIAAgYQAAgGAGAAIARAAQAHAAAHgBQAFgCAEgDQAJgGAAgKQAAgKgGgGQgHgHgLAAQgJAAgHAEQgFADgFAFQgDAEgFgDIgSgSQgEgEAEgEQALgLAKgGQAIgFAIgCQAJgDAKAAQANAAANAEQALAEAJAHQAJAHAFAKQAGALgBAMQAAAIgDAIQgCAHgFAGQgJAMgLAFIAAABQAGACAGADQAHAEAFAGQAFAGAEAIQACAIABAKQAAAMgGALQgEALgJAIQgKAIgNAFQgNAEgPAAQgmAAgYgagAjuALQgBAAAAAAQgBAAAAAAQAAgBAAAAQAAAAAAgBIAAgNQgNgBgMgIQgDgCACgEIAFgIQAAgBABgBQAAAAABAAQAAAAABAAQAAAAABAAIAIAFQAEADAFAAIAAgWIgJgFIgJgGQgFgEgCgEQgCgFAAgFQAAgFACgFQABgEAEgEQADgDAFgCQAGgDAGAAIAAgEQAAgBAAAAQAAgBAAAAQAAgBABAAQAAAAABAAIACAAQABAAABAAQAAAAABABQAAAAAAABQABAAAAABIAAAEQALABANAJQABAAAAAAQAAABAAAAQAAABAAAAQAAABAAABIgIAKQAAAAgBABQAAAAgBAAQAAAAgBAAQAAAAgBAAQgHgGgGgCIAAATIAJAFIAJAGQAEAEADAFQACAFAAAGQAAAFgCAFQgCAFgDADQgEAEgFACQgGADgFAAIAAANQAAABgBAAQAAAAAAABQgBAAAAAAQgBAAgBAAgAjogUQADgBABgCQADgCAAgDQgBgDgCgDIgEgFgAj2hQQAAABAAAAQgBABAAAAQAAABAAAAQgBABAAABQABADABADIAGAEIAAgRIgGACgADTACIgEgLQgBgDADgBQAdgKADgPQgIADgHAAQgFAAgFgCQgHgCgDgEQgGgFgCgGQgDgHAAgIQAAgHADgHQADgGAFgFQAFgFAGgDQAGgDAIAAQAGAAAKAEQAGADAFAGQAGAFABAIQADAIAAAJQAAAIgCAHQgBAIgCAGIgHALIgIAJIgJAHIgIAFQgIADgHACIgCABQAAAAgBgBQAAAAAAAAQgBgBAAAAQAAgBgBAAgADihSIgGADQgEAFAAAGIACAGIACAFIAGADIAFABIAGgBIAFgDIADgFIABgGQAAgGgEgFIgFgDIgGgBQgDAAgCABgAB+ACIgFgLQgBgDAEgBQAcgKAEgPQgJADgHAAQgFAAgGgCQgFgCgFgEQgEgFgDgGQgCgHAAgIQAAgHACgHQADgGAFgFQAFgFAGgDQAHgDAIAAQAFAAALAEQAGADAFAGQAFAFACAIQACAIAAAJQAAAIgBAHIgEAOIgGALIgIAJIgJAHIgIAFQgIADgIACIgBABQgBAAAAgBQgBAAAAAAQgBgBAAAAQAAgBAAAAgACLhSIgEADQgEAFgBAGIABAGIAEAFIAEADIAHABIAGgBIAEgDIADgFIACgGQAAgGgFgFIgEgDIgGgBIgHABg");
	this.shape.setTransform(36.7,26.1);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#363636").s().p("AAAAgIgBgBIgcg8IAAgCIABAAIAKAAIABABIARAmIAAAAIASgmIABgBIAKAAIABAAIAAACIgcA8IgCABg");
	this.shape_1.setTransform(68.1,8.6);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#363636").s().p("AgDAgQgBAAAAAAQAAAAgBgBQAAAAAAAAQAAAAAAgBIAAgyIgOAAQAAAAgBAAQAAAAAAgBQAAAAAAAAQAAAAAAgBIAAgHQAAgBAAAAQAAAAAAAAQAAgBAAAAQABAAAAAAIAnAAQAAAAABAAQAAAAAAABQAAAAAAAAQABAAAAABIAAAHQAAABgBAAQAAAAAAAAQAAABAAAAQgBAAAAAAIgOAAIAAAyQAAABAAAAQAAAAgBAAQAAABAAAAQgBAAAAAAg");
	this.shape_2.setTransform(62.7,8.5);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#363636").s().p("AgHAUQgEgBgDgDIgEgIQgBgDAAgFQAAgDABgFIAEgHQADgCAEgCQAEgCAEAAQAEAAADACIAGADQADADACAEIABAIIAAABQAAABAAAAQAAAAgBABQAAAAAAAAQgBAAAAAAIgaAAIABAEIACADIADACIADABQAFAAAEgDQABAAAAgBQABAAAAAAQAAAAABAAQAAABAAAAIAEAFQAAAAAAAAQAAABAAAAQAAAAAAABQAAAAgBAAIgGAEQgEACgFAAQgEAAgEgCgAAJgEQgBgEgCgBQgCgCgEAAQgCAAgDACQgCABAAAEIAQAAIAAAAg");
	this.shape_3.setTransform(56.1,9.6);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#363636").s().p("AAAAVIgCgBIgSgmIAAgCIABgBIAJAAIACABIAIAVIAAAAIAJgVIADgBIAHAAIACABIAAACIgTAmIgCABg");
	this.shape_4.setTransform(51.6,9.7);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#363636").s().p("AgCAgQgBAAAAAAQAAAAgBgBQAAAAAAAAQAAgBAAAAIAAglQAAgBAAAAQAAgBAAAAQABAAAAAAQAAAAABAAIAGAAQAAAAABAAQAAAAAAAAQAAAAABABQAAAAAAABIAAAlQAAAAAAABQgBAAAAAAQAAABAAAAQgBAAAAAAgAgEgTQgCgCAAgDQAAgDACgCQACgCACAAQADAAACACQACACAAADQAAADgCACQgCADgDAAQgCAAgCgDg");
	this.shape_5.setTransform(48.1,8.5);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#363636").s().p("AgQAgQAAAAAAAAQgBAAAAgBQAAAAAAAAQAAAAAAgBIAAg7QAAgBAAAAQAAAAAAAAQAAgBABAAQAAAAAAAAIAJAAQAAAAABAAQAAAAAAABQAAAAAAAAQAAAAAAABIAAAyIAXAAQAAAAABAAQAAAAAAAAQAAABAAAAQAAAAAAABIAAAHQAAABAAAAQAAAAAAAAQAAABAAAAQgBAAAAAAg");
	this.shape_6.setTransform(45.1,8.5);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#363636").s().p("AAKAgQAAAAgBAAQAAAAgBgBQAAAAAAAAQAAgBAAAAIAAgVQAAgFgCgCQgCgCgEAAQgCAAgDABQgCACgBAEIAAAXQAAAAAAABQAAAAAAAAQAAABgBAAQAAAAAAAAIgIAAQAAAAAAAAQgBAAAAgBQAAAAAAAAQAAgBAAAAIAAg7QAAAAAAgBQAAAAAAAAQAAgBABAAQAAAAAAAAIAIAAQAAAAAAAAQABAAAAABQAAAAAAAAQAAABAAAAIAAAWIAFgCIAFgBQAGAAADABQADACACADQACACAAADIABAIIAAAVQAAAAAAABQAAAAAAAAQAAABgBAAQAAAAgBAAg");
	this.shape_7.setTransform(37.9,8.5);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#363636").s().p("AgDAbIgDgDIgCgEIgBgFIAAgTIgEAAQAAAAAAAAQgBAAAAAAQAAgBAAAAQgBAAAAgBIAAgGQAAAAABgBQAAAAAAAAQAAgBABAAQAAAAAAAAIAEAAIAAgLQAAgBABAAQAAgBAAAAQAAAAABAAQAAAAAAAAIAHAAQAAAAABAAQAAAAAAAAQABAAAAABQAAAAAAABIAAALIAKAAQAAAAABAAQAAAAAAABQABAAAAAAQAAABAAAAIAAAGQAAABAAAAQAAAAgBABQAAAAAAAAQgBAAAAAAIgKAAIAAASIABADIACABIAHgCQAAAAABAAQAAAAAAAAQABABAAAAQAAAAAAABIABAFQABABAAAAQAAAAgBABQAAAAAAAAQgBAAAAABQgIACgEAAIgFgBg");
	this.shape_8.setTransform(33.6,9);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#363636").s().p("AgCAgQgBAAAAAAQAAAAgBgBQAAAAAAAAQAAgBAAAAIAAglQAAgBAAAAQAAgBAAAAQABAAAAAAQAAAAABAAIAGAAQAAAAABAAQAAAAAAAAQABAAAAABQAAAAAAABIAAAlQAAAAAAABQAAAAgBAAQAAABAAAAQgBAAAAAAgAgEgTQgCgCAAgDQAAgDACgCQACgCACAAQADAAACACQACACAAADQAAADgCACQgCADgDAAQgCAAgCgDg");
	this.shape_9.setTransform(30.6,8.5);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#363636").s().p("AAPAWIgCgBIgNgYIgNAYIgBABIgBAAIgBgBIgNgnIAAgBIACgBIAGAAQABAAAAAAQAAAAABAAQAAABAAAAQAAAAABABIAGASIALgUIABgBIABAAIABABIALAUIAHgSQAAgBAAAAQAAAAAAgBQABAAAAAAQABAAAAAAIAGAAIACABIAAABIgNAnQAAAAAAAAQAAABAAAAQgBAAAAAAQAAAAgBAAg");
	this.shape_10.setTransform(26.3,9.6);

	this.shape_11 = new cjs.Shape();
	this.shape_11.graphics.f("#363636").s().p("AgKAUQgDgCgBgCIgDgGIgBgHIAAgVQAAgBABAAQAAgBAAAAQAAAAABAAQAAgBABAAIAHAAQAAAAABABQAAAAAAAAQABAAAAABQAAAAAAABIAAAVQAAAEACACQABACADAAQADAAACgCIACgGIAAgVQAAgBABAAQAAgBAAAAQAAAAABAAQAAgBABAAIAGAAQABAAAAABQABAAAAAAQAAAAAAABQABAAAAABIAAAlQAAAAgBAAQAAABAAAAQAAAAgBAAQAAAAgBAAIgDAAQAAAAAAAAQAAAAgBAAQAAAAAAAAQAAgBAAAAIgCgEQgGAHgGgBQgFABgDgCg");
	this.shape_11.setTransform(18.5,9.7);

	this.shape_12 = new cjs.Shape();
	this.shape_12.graphics.f("#363636").s().p("AgDAgQAAAAgBAAQAAAAAAgBQgBAAAAAAQAAgBAAAAIAAg7QAAAAAAgBQAAAAABAAQAAgBAAAAQABAAAAAAIAHAAQAAAAABAAQAAAAAAABQAAAAABAAQAAABAAAAIAAA7QAAAAAAABQgBAAAAAAQAAABAAAAQgBAAAAAAg");
	this.shape_12.setTransform(14.9,8.5);

	this.shape_13 = new cjs.Shape();
	this.shape_13.graphics.f("#363636").s().p("AgKAUQgDgCgCgCIgCgGIgBgHIAAgVQAAgBABAAQAAgBAAAAQAAAAABAAQAAgBAAAAIAIAAQABAAAAABQAAAAABAAQAAAAAAABQAAAAAAABIAAAVQAAAEABACQACACADAAQADAAACgCIADgGIAAgVQAAgBAAAAQAAgBAAAAQAAAAABAAQAAgBAAAAIAIAAQAAAAAAABQABAAAAAAQAAAAAAABQAAAAAAABIAAAlQAAAAAAAAQAAABAAAAQAAAAgBAAQAAAAAAAAIgDAAQgBAAAAAAQgBAAAAAAQAAAAAAAAQAAgBgBAAIgBgEQgGAHgGgBQgEABgEgCg");
	this.shape_13.setTransform(11.3,9.7);

	this.shape_14 = new cjs.Shape();
	this.shape_14.graphics.f("#363636").s().p("AARAgQgBAAAAAAQAAAAAAgBQgBAAAAAAQAAAAAAgBIAAgZIgdAAIAAAZQAAABAAAAQAAAAAAAAQAAABgBAAQAAAAAAAAIgJAAQAAAAgBAAQAAAAAAgBQgBAAAAAAQAAAAAAgBIAAg7QAAgBAAAAQAAAAABAAQAAgBAAAAQABAAAAAAIAJAAQAAAAAAAAQABAAAAABQAAAAAAAAQAAAAAAABIAAAYIAdAAIAAgYQAAgBAAAAQAAAAABAAQAAgBAAAAQAAAAABAAIAIAAQABAAAAAAQAAAAAAABQABAAAAAAQAAAAAAABIAAA7QAAABAAAAQAAAAgBAAQAAABAAAAQAAAAgBAAg");
	this.shape_14.setTransform(5.5,8.5);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_14},{t:this.shape_13},{t:this.shape_12},{t:this.shape_11},{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

}).prototype = getMCSymbolPrototype(lib.compareB, new cjs.Rectangle(0,0,73.2,36.7), null);


(lib.compareA = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#6C6C6C").s().p("ABVBmQgKgCgHgEQgOgHgHgJQgFgFAEgFIATgTQADgEAEAEQAJAHAIADQAIAEALAAQAMAAAIgIQAEgEACgFQADgGAAgGQAAgGgDgGQgCgFgEgEQgEgDgFgCQgGgCgIAAIguAAQgJAAAAgKIAAhdQAAgGAGABIBgAAQAFgBABAGIAAAaQgBAGgFAAIg+AAIAAAgIAWAAQAPAAANAFQAMAFAJAIQAJAJAFAMQAFAMAAAPQAAAOgGANQgFANgLAJQgKAKgNAGQgNAFgQAAQgLAAgKgDgAhmBOQgDgEADgDIARgUQAEgEAEAEQAHAFAGAEQAJAEAKAAQAMAAAHgGQAHgHAAgLQABgFgDgFQgDgEgEgEQgFgDgGgBQgHgCgIAAIgRAAQgGAAABgGIAAgYQgBgFAGAAIARAAQAHAAAHgBQAGgDAEgDQAIgFAAgLQAAgKgHgGQgGgGgLAAQgJAAgIAEQgFADgEAEQgDAFgFgEIgTgSQgDgDADgFQALgLAMgGQAHgEAIgCQAKgDAKAAQANAAALAEQAMAEAIAHQAJAHAFAKQAFAKABANQAAAIgDAIQgDAHgFAGQgIAMgMAFIAAABQAHACAFADQAHAEAFAFQAFAHADAIQADAIAAAKQAAAMgEALQgFALgKAIQgIAIgMAFQgOAEgPAAQgmAAgXgagAiWAMQgBAAAAAAQgBAAAAAAQAAgBAAAAQgBAAAAgBIAAgNQgNgBgLgJQgDgBADgEIAEgIQAAgBABgBQAAAAABAAQAAgBABABQAAAAABAAIAHAFQAFACAEABIAAgWIgJgFIgIgGQgEgEgCgEQgDgFAAgFQAAgFACgFQABgEADgEQAEgEAFgCQAGgCAFgBIAAgDQAAgBABgBQAAAAAAAAQAAgBABAAQAAAAABAAIADAAQAAAAABAAQAAAAABABQAAAAAAAAQAAABAAABIAAADQAMABANAJQABABAAAAQAAAAAAABQAAAAAAABQAAABgBABIgHAKQAAAAgBABQAAAAgBAAQAAAAgBAAQAAAAAAAAQgIgGgHgCIAAATIAJAFIAJAGQAFAEACAEQADAGAAAGQAAAFgCAFQgCAEgEAEQgDADgFADQgFADgHAAIAAANQAAABAAAAQAAAAAAABQgBAAAAAAQgBAAAAAAgAiRgTQADgBACgDQACgCAAgCQAAgDgBgEIgGgEgAidhPQgBABAAAAQgBABAAAAQAAABAAAAQAAABAAABQAAADABACIAFAFIAAgRIgEACg");
	this.shape.setTransform(26.5,26.1);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#363636").s().p("AAPAWIgCgBIgNgYIgMAYIgCABIgBAAIgCgBIgMgnIAAgBIACgBIAHAAQAAAAAAAAQABAAAAAAQAAABAAAAQAAAAABABIAGASIALgUIABgBIAAAAIACABIALAUIAGgSQABgBAAAAQAAAAAAgBQABAAAAAAQABAAAAAAIAGAAIACABIAAABIgNAnQAAAAAAAAQAAABAAAAQgBAAAAAAQAAAAAAAAg");
	this.shape_1.setTransform(50.9,9.6);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#363636").s().p("AgHAUQgEgBgEgDQgDgEgBgEQgCgDAAgFQAAgDACgFQABgDADgEQAEgCAEgCQADgCAEAAQAEAAAEACQAEACADACQADAEACADQABAFAAADQAAAFgBADQgCAEgDAEQgDADgEABQgEACgEAAQgEAAgDgCgAgEgJQAAAAAAAAQgBAAAAAAQgBABAAAAQgBABAAAAIgCAEIgBADIABAFIACADQAAABABAAQAAAAABABQAAAAABAAQAAAAAAAAIAEABIAEgBQABAAAAAAQAAAAABAAQAAgBABAAQAAAAABgBIACgDIABgFIgBgDIgCgEQgBAAAAgBQgBAAAAgBQgBAAAAAAQAAAAgBAAIgEgBIgEABg");
	this.shape_2.setTransform(45.3,9.6);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#363636").s().p("AAYAhIgCgBIgkgoIAAAmQAAABAAAAQAAAAgBAAQAAABAAAAQgBAAAAAAIgIAAQgBAAAAAAQAAAAgBgBQAAAAAAAAQAAAAAAgBIAAg8QAAgBAAAAQAAAAAAAAQABgBAAAAQAAAAABAAIABAAIACABIAkAmIAAgkQAAgBAAAAQAAAAABAAQAAgBAAAAQAAAAABAAIAJAAQAAAAAAAAQAAAAABABQAAAAAAAAQAAAAAAABIAAA8QAAABAAAAQAAAAAAAAQgBABAAAAQAAAAAAAAg");
	this.shape_3.setTransform(39.4,8.5);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#363636").s().p("AAAAgIgBgBIgcg8IAAgCIABAAIAKAAIABABIARAmIAAAAIASgmIABgBIAKAAIABAAIAAACIgcA8IgCABg");
	this.shape_4.setTransform(30.7,8.6);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#363636").s().p("AgDAgQgBAAAAAAQAAAAgBgBQAAAAAAAAQAAAAAAgBIAAgyIgOAAQAAAAgBAAQAAAAAAgBQAAAAAAAAQAAAAAAgBIAAgHQAAgBAAAAQAAAAAAAAQAAgBAAAAQABAAAAAAIAnAAQAAAAABAAQAAAAAAABQAAAAAAAAQABAAAAABIAAAHQAAABgBAAQAAAAAAAAQAAABAAAAQgBAAAAAAIgOAAIAAAyQAAABAAAAQAAAAgBAAQAAABAAAAQgBAAAAAAg");
	this.shape_5.setTransform(25.4,8.5);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#363636").s().p("AgFAUIgHgEQgDgEgCgEQgBgDAAgFQAAgDABgFQACgDADgEIAHgEQAEgCAEAAQAFAAAEACIAGAFQAAAAABABQAAAAAAAAQAAABgBAAQAAABAAAAIgEAEQAAABgBAAQAAAAAAAAQgBAAAAAAQAAgBgBAAIgDgCIgFgBIgDABQgBAAAAAAQgBAAAAAAQgBABAAAAQgBABAAAAIgCAEIgBADIABAFIACADQAAABABAAQAAAAABABQAAAAABAAQAAAAABAAIADABQAFABAEgFQAAAAAAgBQABAAAAAAQAAAAABAAQAAAAABABIAEADQAAAAAAABQAAAAAAABQAAAAAAAAQAAABAAAAIgDAEIgDACIgFADIgFAAQgEAAgEgCg");
	this.shape_6.setTransform(21.5,9.6);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#363636").s().p("AgHAUQgEgBgDgDIgEgIQgBgDAAgFQAAgDABgFIAEgHQADgCAEgCQAEgCAEAAQAEAAADACIAGADQADADACAEIABAIIAAABQAAABAAAAQAAAAgBABQAAAAAAAAQgBAAAAAAIgaAAIABAEIACADIADACIADABQAFAAAEgDQABAAAAgBQABAAAAAAQAAAAABAAQAAABAAAAIAEAFQAAAAAAAAQAAABAAAAQAAAAAAABQAAAAgBAAIgGAEQgEACgFAAQgEAAgEgCgAAJgEQgBgEgCgBQgCgCgEAAQgCAAgDACQgCABAAAEIAQAAIAAAAg");
	this.shape_7.setTransform(16.9,9.6);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#363636").s().p("AgLAVQgBAAAAAAQgBAAAAAAQAAAAAAgBQAAAAAAAAIAAglQAAgBAAAAQAAgBAAAAQAAAAABAAQAAgBABAAIADAAQAAAAAAABQABAAAAAAQAAAAAAAAQABABAAAAIABAEIAEgEIADgCIAEgBIAGABQABABAAAAQABAAAAABQAAAAAAABQAAAAAAABIgDAGQAAAAAAABQAAAAgBAAQAAAAAAAAQgBAAAAgBIgEAAQgDAAgCACIgCADIAAAZQAAAAAAAAQgBABAAAAQAAAAAAAAQgBAAAAAAg");
	this.shape_8.setTransform(13.1,9.6);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#363636").s().p("AgCAgQgBAAAAAAQAAAAgBgBQAAAAAAAAQAAgBAAAAIAAglQAAgBAAAAQAAgBAAAAQABAAAAAAQAAAAABAAIAGAAQAAAAABAAQAAAAAAAAQAAAAABABQAAAAAAABIAAAlQAAAAAAABQgBAAAAAAQAAABAAAAQgBAAAAAAgAgEgTQgCgCAAgDQAAgDACgCQACgCACAAQADAAACACQACACAAADQAAADgCACQgCADgDAAQgCAAgCgDg");
	this.shape_9.setTransform(9.9,8.5);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#363636").s().p("AgZAgQAAAAgBAAQAAAAAAgBQAAAAgBAAQAAAAAAgBIAAg7QAAgBAAAAQABAAAAAAQAAgBAAAAQABAAAAAAIAWAAIAFABIAGACIAFACIAFAEIAEAFIADAFIACAGIABAGIgBAGIgCAGIgDAGIgEAEIgFAEIgFADIgGACIgFABgAgPAVIALAAQAEAAADgCQAEgBACgDQADgDACgEQABgEAAgEQAAgEgBgEQgCgDgDgDQgCgDgEgBQgDgCgEAAIgLAAg");
	this.shape_10.setTransform(5.6,8.5);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

}).prototype = getMCSymbolPrototype(lib.compareA, new cjs.Rectangle(0,0,56.2,36.6), null);


(lib.beacon = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AgUAWQgIgJgBgNQABgMAIgIQAJgJALAAQAMAAAJAJQAIAIABAMQgBANgIAJQgJAHgMABQgLgBgJgHg");

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = getMCSymbolPrototype(lib.beacon, new cjs.Rectangle(-2.9,-2.9,6,5.9), null);


(lib.slingLogo = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{wave:1});

	// timeline functions:
	this.frame_0 = function() {
		this.stop();
	}
	this.frame_30 = function() {
		this.stop();
	}

	// actions tween:
	this.timeline.addTween(cjs.Tween.get(this).call(this.frame_0).wait(30).call(this.frame_30).wait(1));

	// waves
	this.wave_3 = new lib.wave1();
	this.wave_3.parent = this;
	this.wave_3.setTransform(0.1,-15.7,1,1,0,0,0,1.8,0);

	this.timeline.addTween(cjs.Tween.get(this.wave_3).wait(10).to({regX:1.7,scaleX:1.16,scaleY:1.16},0).wait(1).to({scaleX:1.29,scaleY:1.29,x:0},0).wait(1).to({scaleX:1.38,scaleY:1.38},0).wait(1).to({scaleX:1.43,scaleY:1.43},0).wait(1).to({regX:1.8,scaleX:1.45,scaleY:1.45,x:0.1},0).wait(1).to({regX:1.7,scaleX:1.26,scaleY:1.26,x:0},0).wait(1).to({scaleX:1.11,scaleY:1.11,x:0.1},0).wait(1).to({scaleX:0.99,scaleY:0.99},0).wait(1).to({scaleX:0.91,scaleY:0.91},0).wait(1).to({scaleX:0.86,scaleY:0.86},0).wait(1).to({regX:1.8,scaleX:0.84,scaleY:0.84},0).wait(1).to({regX:1.7,scaleX:0.88,scaleY:0.88},0).wait(1).to({scaleX:0.91,scaleY:0.91},0).wait(1).to({scaleX:0.94,scaleY:0.94},0).wait(1).to({scaleX:0.96,scaleY:0.96},0).wait(1).to({scaleX:0.98,scaleY:0.98,x:0},0).wait(1).to({scaleX:0.99,scaleY:0.99,x:0.1},0).wait(1).to({scaleX:1,scaleY:1},0).wait(1).to({regX:1.8,scaleX:1,scaleY:1},0).wait(3));

	// waves
	this.wave_2 = new lib.wave2();
	this.wave_2.parent = this;
	this.wave_2.setTransform(-3.6,-15.7,1,1,0,0,0,1.6,0);

	this.timeline.addTween(cjs.Tween.get(this.wave_2).wait(7).to({regX:1.5,scaleX:1.16,scaleY:1.16,x:-3.7},0).wait(1).to({scaleX:1.29,scaleY:1.29},0).wait(1).to({scaleX:1.38,scaleY:1.38,x:-3.8},0).wait(1).to({scaleX:1.43,scaleY:1.43},0).wait(1).to({scaleX:1.45,scaleY:1.45,x:-3.7},0).wait(1).to({scaleX:1.27,scaleY:1.27},0).wait(1).to({scaleX:1.12,scaleY:1.12},0).wait(1).to({scaleX:1,scaleY:1},0).wait(1).to({scaleX:0.92,scaleY:0.92},0).wait(1).to({scaleX:0.87,scaleY:0.87},0).wait(1).to({regX:1.6,scaleX:0.86,scaleY:0.86},0).wait(1).to({regX:1.5,scaleX:0.89,scaleY:0.89},0).wait(1).to({scaleX:0.92,scaleY:0.92},0).wait(1).to({scaleX:0.94,scaleY:0.94},0).wait(1).to({scaleX:0.96,scaleY:0.96},0).wait(1).to({scaleX:0.98,scaleY:0.98},0).wait(1).to({scaleX:0.99,scaleY:0.99},0).wait(1).to({scaleX:1,scaleY:1},0).wait(1).to({regX:1.6,scaleX:1,scaleY:1,x:-3.6},0).wait(6));

	// waves
	this.wave_1 = new lib.wave3();
	this.wave_1.parent = this;
	this.wave_1.setTransform(-6.8,-16,1,1,0,0,0,1.2,-0.1);

	this.timeline.addTween(cjs.Tween.get(this.wave_1).wait(4).to({regX:1.1,regY:0,scaleX:1.16,scaleY:1.16,x:-6.9,y:-15.9},0).wait(1).to({scaleX:1.29,scaleY:1.29},0).wait(1).to({scaleX:1.38,scaleY:1.38},0).wait(1).to({scaleX:1.43,scaleY:1.43},0).wait(1).to({regX:1.2,regY:-0.1,scaleX:1.45,scaleY:1.45,x:-6.7,y:-16},0).wait(1).to({regX:1.1,regY:0,scaleX:1.24,scaleY:1.24,x:-6.8,y:-15.9},0).wait(1).to({scaleX:1.07,scaleY:1.07},0).wait(1).to({scaleX:0.93,scaleY:0.93},0).wait(1).to({scaleX:0.84,scaleY:0.84},0).wait(1).to({scaleX:0.78,scaleY:0.78},0).wait(1).to({regX:1.2,regY:-0.1,scaleX:0.76,scaleY:0.76,y:-16},0).wait(1).to({regX:1.1,regY:0,scaleX:0.82,scaleY:0.82,y:-15.9},0).wait(1).to({scaleX:0.87,scaleY:0.87},0).wait(1).to({scaleX:0.91,scaleY:0.91},0).wait(1).to({scaleX:0.94,scaleY:0.94},0).wait(1).to({scaleX:0.97,scaleY:0.97,x:-6.9},0).wait(1).to({scaleX:0.99,scaleY:0.99,x:-6.8},0).wait(1).to({scaleX:1,scaleY:1},0).wait(1).to({regX:1.2,regY:-0.1,scaleX:1,scaleY:1,y:-16},0).wait(9));

	// dot
	this.beacon = new lib.beacon();
	this.beacon.parent = this;
	this.beacon.setTransform(-12.6,-15.9);

	this.timeline.addTween(cjs.Tween.get(this.beacon).wait(2).to({scaleX:0.93,scaleY:0.93},0).wait(1).to({scaleX:0.79,scaleY:0.79},0).wait(1).to({scaleX:0.59,scaleY:0.59},0).wait(1).to({scaleX:0.32,scaleY:0.32},0).to({_off:true},1).wait(1).to({_off:false},0).wait(1).to({scaleX:0.7,scaleY:0.7},0).wait(1).to({scaleX:1,scaleY:1},0).wait(1).to({scaleX:1.21,scaleY:1.21},0).wait(1).to({scaleX:1.34,scaleY:1.34},0).wait(1).to({scaleX:1.38,scaleY:1.38},0).wait(1).to({scaleX:1.28,scaleY:1.28},0).wait(1).to({scaleX:1.2,scaleY:1.2},0).wait(1).to({scaleX:1.13,scaleY:1.13},0).wait(1).to({scaleX:1.07,scaleY:1.07},0).wait(1).to({scaleX:1.03,scaleY:1.03},0).wait(1).to({scaleX:1.01,scaleY:1.01},0).wait(1).to({scaleX:1,scaleY:1},0).wait(12));

	// FlashAICB
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("ACcDPQgIgBgGgGIjejfIgBAAIAADVQAAAEgDAEQgDACgFAAIhEAAQgEAAgEgCQgDgEAAgEIAAmBQgBgFAEgDQADgCAFAAIAIAAQAGAAAJAIIDaDSIABAAIAAjKQAAgEADgDQADgDAFAAIBFAAQAEAAAEADQACADAAAEIAAGBQABALgLAAg");
	this.shape.setTransform(11.5,18.7,0.096,0.096);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#FFFFFF").s().p("AiRCSQg8g7AAhWQAAhVA8g9QA8g8BVAAQBWAAA8A8QA8A9AABVQAABWg8A7Qg8A9hWAAQhVAAg8g9gAhQhPQghAhAAAvQAAAuAhAiQAiAiAuAAQAvAAAigiQAhgiAAguQAAgvghghQgigjgvAAQguAAgiAjg");
	this.shape_1.setTransform(4.7,18.7,0.096,0.096);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#FFFFFF").s().p("AgiDIQgEAAgDgCQgDgEAAgEIAAl7QAAgEADgDQADgDAEAAIBEAAQAEAAAEADQADADAAAEIAAF7QAAAEgDAEQgEACgEAAg");
	this.shape_2.setTransform(-0.9,18.7,0.096,0.096);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#FFFFFF").s().p("AhXC+QgZgMgQgQQgIgHAFgKIAbguQADgGAGgBQAFAAAGADQATAOANAGQAZAMAYAAQAQAAALgKQALgJAAgQQAAgRgPgOQgOgMgdgOQg1gbgXgUQgjghAAguQAAgvAhgfQAlglA/ABQA+gBA7AsQAFACABAHQAAAGgCADIgeAsQgDAFgHACQgHACgIgFQgtgfggAAQgRAAgJAKQgJAIAAANQAAAOARANQANALAgAQQA5AbAUARQAnAiAAA0QAAAvgkAiQgnAmg8AAQgwgBgngQg");
	this.shape_3.setTransform(-5.8,18.7,0.096,0.096);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#FFFFFF").s().p("AgiDIQgEAAgDgCQgDgEAAgEIAAl7QAAgEADgDQADgDAEAAIBEAAQAEAAAEADQADADAAAEIAAF7QAAAEgDAEQgEACgEAAg");
	this.shape_4.setTransform(-10.8,18.7,0.096,0.096);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#FFFFFF").s().p("AgDDMQgGgBgEgGIiymBQgDgGAEgEQACgFAHABIBMAAQAHAAACAFIBfDRIACAAIBfjRQAEgFAGAAIBMAAQAGgBADAFQADAEgCAGIi0GBQgEAGgGABg");
	this.shape_5.setTransform(-16,18.7,0.096,0.096);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#FFFFFF").s().p("Ah2DIQgEAAgDgCQgDgEAAgEIAAl7QAAgEADgDQADgDAEAAIDtAAQAEAAADADQAEADAAAEIAAA/QAAAEgEAEQgDADgEAAIieAAIAABHICCAAQAEgBADAEQADAEABADIAAA+QgBAFgDADQgDADgEAAIiCAAIAABOICeAAQAEAAADACQAEAEAAAEIAAA/QAAAEgEAEQgDACgEAAg");
	this.shape_6.setTransform(-21.9,18.7,0.096,0.096);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#FFFFFF").s().p("AhrDIQgEAAgDgCQgEgEAAgEIAAl7QAAgEAEgDQADgDAEAAIBFAAQAEAAADADQADADAAAEIAAEyICIAAQAFAAADACQADAEAAAEIAAA/QAAAEgDAEQgDACgFAAg");
	this.shape_7.setTransform(-27.4,18.7,0.096,0.096);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#FFFFFF").s().p("Ah2DIQgEAAgDgCQgDgEgBgEIAAl7QABgEADgDQADgDAEAAIDtAAQAEAAADADQAEADAAAEIAAA/QAAAEgEAEQgDADgEAAIieAAIAABHICCAAQAEgBADAEQAEAEAAADIAAA+QAAAFgEADQgDADgEAAIiCAAIAABOICeAAQAEAAADACQAEAEAAAEIAAA/QAAAEgEAEQgDACgEAAg");
	this.shape_8.setTransform(-33,18.7,0.096,0.096);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#FFFFFF").s().p("AghDIQgFAAgDgCQgDgEAAgEIAAkxIhSAAQgFAAgDgDQgDgEAAgEIAAg/QAAgEADgDQADgDAFAAID9AAQAFAAADADQADADAAAEIAAA/QAAAEgDAEQgDADgFAAIhSAAIAAExQAAAEgDAEQgDACgFAAg");
	this.shape_9.setTransform(-38.7,18.7,0.096,0.096);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#FFFFFF").s().p("ADHCAIACjFIgCAAIhLDFIglAAIhIjGIgDAAIACDGIgpAAIAAj/IBCAAIBFDGIBIjGIBBAAIAAD/gAipCAIAAjaIhLAAIAAglIDBAAIAAAlIhLAAIAADag");
	this.shape_10.setTransform(38.5,-7,0.096,0.096);

	this.shape_11 = new cjs.Shape();
	this.shape_11.graphics.f("#FFFFFF").s().p("AjrPLIAA+VIHXAAIAAeVg");
	this.shape_11.setTransform(-12.7,1.1,0.096,0.096,0,0,0,-0.3,-0.2);

	this.shape_12 = new cjs.Shape();
	this.shape_12.graphics.f("#FFFFFF").s().p("ArwXeIAAmSIOCAAQDKAABpifQBpidAAkqIAAlRQhcCqimBiQi0BqjpAAQi6AAiohMQilhLh9iJQh+iLhFi2QhIi/AAjYQAAjYBIi+QBEi1B+iKQB8iHCihJQCnhLC3AAQD2AAC2BwQCnBnBiC7IgNlpIHTAAIAAexQAAHjjvEAQjlD2mmAIgAmKuZQiUCiAAEKQAAETCUClQCWClD7AAQEAAACailQCaimAAkSQAAkJiaijQibikj/AAQj6AAiXCkg");
	this.shape_12.setTransform(24,5.8,0.096,0.096);

	this.shape_13 = new cjs.Shape();
	this.shape_13.graphics.f("#FFFFFF").s().p("AHFPgIAAxaQAAjThjhxQhmhzjJAAQjnAAiHCEQiJCFAADrIAAQdInTAAIAA+WIHTAAIgKFpQBai+CvhqQCthqDaAAQFIAADEDbQDKDgAAGFIAAR/g");
	this.shape_13.setTransform(2.5,0.9,0.096,0.096,0,0,0,-0.4,-0.2);

	this.shape_14 = new cjs.Shape();
	this.shape_14.graphics.f("#FFFFFF").s().p("AjoXbMAAAgu1IHSAAMAAAAu1g");
	this.shape_14.setTransform(-21.3,-4,0.096,0.096,0,0,0,-0.9,-0.3);

	this.shape_15 = new cjs.Shape();
	this.shape_15.graphics.f("#FFFFFF").s().p("AnuN6QjRhshsisIE/jeQCwD6FaAAQCtAABXg3QBTg1AAhkQAAg6gcgmQgbgkg7gdQgxgYhhgcIjUg8QkGhIiEhvQiziYAAkEQAAkXDLiaQC6iNEwAAQDaAAC0BVQCbBJB6CFIkRENQhLhXhfgwQhsg3h8AAQiDAAhHAvQhGAvAABWQAABnBiA1QBGAlEABCQEoBNCKBoQDMCZAAEUQABEPirCdQjCCymFAAQk3AAjxh7g");
	this.shape_15.setTransform(-34.7,1.1,0.096,0.096,0,0,0,-0.7,-0.2);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_15},{t:this.shape_14},{t:this.shape_13},{t:this.shape_12},{t:this.shape_11},{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(31));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-42.5,-20.1,83.4,40.8);


(lib.panelVS = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.vs = new lib.vs();
	this.vs.parent = this;
	this.vs.setTransform(150,10.5,1,1,0,0,0,10.3,10.5);

	this.shape = new cjs.Shape();
	this.shape.graphics.f("#F4F5F4").s().p("A3bGAIAAr/IT1AAIDmDnIDnjnIT1AAIAAL/g");
	this.shape.setTransform(150,44);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape},{t:this.vs}]}).wait(1));

}).prototype = getMCSymbolPrototype(lib.panelVS, new cjs.Rectangle(0,0,300,82.4), null);


(lib.panelBlue = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.Tween2("synched",0);
	this.instance.parent = this;
	this.instance.setTransform(150,97.8);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = getMCSymbolPrototype(lib.panelBlue, new cjs.Rectangle(0,0,300,195.6), null);


(lib.img_caret_single = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 3
	this.instance = new lib.carat();
	this.instance.parent = this;
	this.instance.setTransform(-1511.8,-0.1,0.73,0.73,0,0,0,-492.4,33);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = getMCSymbolPrototype(lib.img_caret_single, new cjs.Rectangle(-1152.4,-24,8.1,12.6), null);


(lib.img_caret = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{still:0,cycle:1});

	// timeline functions:
	this.frame_0 = function() {
		this.stop();
	}
	this.frame_1 = function() {
		if(!this.alreadyExecuted){
		this.alreadyExecuted=true;
		this.loopNum=1;
		} else {
		this.loopNum++;
		}
	}
	this.frame_14 = function() {
		//this.stop();
		
		if(this.loopNum==2){
		this.gotoAndStop(1);
		}
	}
	this.frame_15 = function() {
		this.gotoAndPlay('cycle');
	}

	// actions tween:
	this.timeline.addTween(cjs.Tween.get(this).call(this.frame_0).wait(1).call(this.frame_1).wait(13).call(this.frame_14).wait(1).call(this.frame_15).wait(1));

	// Layer 1
	this.instance = new lib.img_caret_single();
	this.instance.parent = this;
	this.instance.setTransform(9.1,-252.4,1,1,0,0,0,13.1,24.6);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1).to({x:13.5},6).to({x:16.5,alpha:0},7).to({_off:true},1).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-1156.4,-301,8.1,12.6);


(lib.ctaRef = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 2
	this.theCTA = new lib.img_caret();
	this.theCTA.parent = this;
	this.theCTA.setTransform(2309.6,652.7,1.405,1.405,0,0,0,8.6,19.9);

	this.instance = new lib.ctaCopy();
	this.instance.parent = this;
	this.instance.setTransform(547.5,210.3,1,1,0,0,0,151.6,18.3);

	this.shape = new cjs.Shape();
	this.shape.graphics.f().s("#FFFFFF").ss(1.5,2,0,3).p("A2oC7IAAl1MAtSAAAIAAF1g");
	this.shape.setTransform(558.1,210);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape},{t:this.instance},{t:this.theCTA}]}).wait(1));

}).prototype = getMCSymbolPrototype(lib.ctaRef, new cjs.Rectangle(395.9,190.3,308.2,39.4), null);


(lib.cta = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{ctaBuild:1});

	// timeline functions:
	this.frame_0 = function() {
		this.stop();
	}
	this.frame_48 = function() {
		this.stop();
	}

	// actions tween:
	this.timeline.addTween(cjs.Tween.get(this).call(this.frame_0).wait(48).call(this.frame_48).wait(1));

	// ref
	this.ctaRef = new lib.ctaRef();
	this.ctaRef.parent = this;
	this.ctaRef.setTransform(-52.1,-67.9,1,1,0,0,0,356.2,117);

	this.timeline.addTween(cjs.Tween.get(this.ctaRef).wait(49));

	// caret
	this.theCTA = new lib.img_caret();
	this.theCTA.parent = this;
	this.theCTA.setTransform(1893.5,467.1,1.405,1.405,0,0,0,8.6,19.9);
	this.theCTA.alpha = 0;
	this.theCTA._off = true;

	this.timeline.addTween(cjs.Tween.get(this.theCTA).wait(31).to({_off:false},0).to({x:1901.2,alpha:1},9).wait(9));

	// WATCH 7 DAYS FREE
	this.instance = new lib.ctaCopy();
	this.instance.parent = this;
	this.instance.setTransform(139.1,24.7,0.05,0.05,0,0,0,151.1,19);
	this.instance._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(22).to({_off:false},0).to({regX:151.6,regY:18.3,scaleX:1,scaleY:1},8,cjs.Ease.get(1)).wait(19));

	// button mask (mask)
	var mask = new cjs.Shape();
	mask._off = true;
	var mask_graphics_37 = new cjs.Graphics().p("A2oC7IAAl1MAtRAAAIAAF1g");

	this.timeline.addTween(cjs.Tween.get(mask).to({graphics:null,x:0,y:0}).wait(37).to({graphics:mask_graphics_37,x:149.7,y:24.4}).wait(11).to({graphics:null,x:0,y:0}).wait(1));

	// Layer 15
	this.instance_1 = new lib.shine();
	this.instance_1.parent = this;
	this.instance_1.setTransform(-52.4,32.5,0.784,0.84,0,21,0,51.6,97.4);
	this.instance_1.alpha = 0.84;
	this.instance_1._off = true;

	var maskedShapeInstanceList = [this.instance_1];

	for(var shapedInstanceItr = 0; shapedInstanceItr < maskedShapeInstanceList.length; shapedInstanceItr++) {
		maskedShapeInstanceList[shapedInstanceItr].mask = mask;
	}

	this.timeline.addTween(cjs.Tween.get(this.instance_1).wait(37).to({_off:false},0).to({regX:51.8,x:345.6},10).to({_off:true},1).wait(1));

	// mask (mask)
	var mask_1 = new cjs.Shape();
	mask_1._off = true;
	var mask_1_graphics_1 = new cjs.Graphics().p("A23PUIAA+nMAttAAAIAAeng");
	var mask_1_graphics_2 = new cjs.Graphics().p("A24PUIAA+nMAtxAAAIAAeng");
	var mask_1_graphics_3 = new cjs.Graphics().p("A29PUIAA+nMAt7AAAIAAeng");
	var mask_1_graphics_4 = new cjs.Graphics().p("A3FPUIAA+nMAuLAAAIAAeng");
	var mask_1_graphics_5 = new cjs.Graphics().p("A3QPUIAA+nMAuhAAAIAAeng");
	var mask_1_graphics_6 = new cjs.Graphics().p("A3fPUIAA+nMAu/AAAIAAeng");
	var mask_1_graphics_7 = new cjs.Graphics().p("A3xPUIAA+nMAvjAAAIAAeng");
	var mask_1_graphics_8 = new cjs.Graphics().p("A4GPUIAA+nMAwNAAAIAAeng");

	this.timeline.addTween(cjs.Tween.get(mask_1).to({graphics:null,x:0,y:0}).wait(1).to({graphics:mask_1_graphics_1,x:-146.4,y:31.6}).wait(1).to({graphics:mask_1_graphics_2,x:-140.6,y:31.6}).wait(1).to({graphics:mask_1_graphics_3,x:-122.8,y:31.6}).wait(1).to({graphics:mask_1_graphics_4,x:-93.2,y:31.6}).wait(1).to({graphics:mask_1_graphics_5,x:-51.7,y:31.6}).wait(1).to({graphics:mask_1_graphics_6,x:1.6,y:31.6}).wait(1).to({graphics:mask_1_graphics_7,x:66.7,y:31.6}).wait(1).to({graphics:mask_1_graphics_8,x:143.8,y:31.6}).wait(1).to({graphics:null,x:0,y:0}).wait(40));

	// top
	this.shape = new cjs.Shape();
	this.shape.graphics.f().s("#FFFFFF").ss(1.5,2,0,3).p("A2pAAMAtTAAA");
	this.shape.setTransform(149.7,5.7);
	this.shape._off = true;

	var maskedShapeInstanceList = [this.shape];

	for(var shapedInstanceItr = 0; shapedInstanceItr < maskedShapeInstanceList.length; shapedInstanceItr++) {
		maskedShapeInstanceList[shapedInstanceItr].mask = mask_1;
	}

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1).to({_off:false},0).wait(48));

	// mask (mask)
	var mask_2 = new cjs.Shape();
	mask_2._off = true;
	var mask_2_graphics_8 = new cjs.Graphics().p("A2XPUIAA+nMAttAAAIAAeng");
	var mask_2_graphics_9 = new cjs.Graphics().p("A2YPUIAA+nMAttAAAIAAeng");
	var mask_2_graphics_10 = new cjs.Graphics().p("A2ZPUIAA+nMAttAAAIAAeng");
	var mask_2_graphics_11 = new cjs.Graphics().p("A2aPUIAA+nMAtuAAAIAAeng");
	var mask_2_graphics_12 = new cjs.Graphics().p("A2aPUIAA+nMAtuAAAIAAeng");

	this.timeline.addTween(cjs.Tween.get(mask_2).to({graphics:null,x:0,y:0}).wait(8).to({graphics:mask_2_graphics_8,x:149.4,y:-95.4}).wait(1).to({graphics:mask_2_graphics_9,x:149.3,y:-76.5}).wait(1).to({graphics:mask_2_graphics_10,x:149.2,y:-63}).wait(1).to({graphics:mask_2_graphics_11,x:149.2,y:-54.9}).wait(1).to({graphics:mask_2_graphics_12,x:149.2,y:-52.2}).wait(1).to({graphics:null,x:0,y:0}).wait(36));

	// right
	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f().s("#FFFFFF").ss(1.5,2,0,3).p("AAAi6IAAF1");
	this.shape_1.setTransform(294.7,24.4);
	this.shape_1._off = true;

	var maskedShapeInstanceList = [this.shape_1];

	for(var shapedInstanceItr = 0; shapedInstanceItr < maskedShapeInstanceList.length; shapedInstanceItr++) {
		maskedShapeInstanceList[shapedInstanceItr].mask = mask_2;
	}

	this.timeline.addTween(cjs.Tween.get(this.shape_1).wait(8).to({_off:false},0).wait(41));

	// mask (mask)
	var mask_3 = new cjs.Shape();
	mask_3._off = true;
	var mask_3_graphics_12 = new cjs.Graphics().p("AAZPUIAA+nMAtvAAAIAAeng");
	var mask_3_graphics_13 = new cjs.Graphics().p("AgFPUIAA+nMAtvAAAIAAeng");
	var mask_3_graphics_14 = new cjs.Graphics().p("AhlPUIAA+nMAt2AAAIAAeng");
	var mask_3_graphics_15 = new cjs.Graphics().p("AkFPUIAA+nMAuBAAAIAAeng");
	var mask_3_graphics_16 = new cjs.Graphics().p("AnkPUIAA+nMAuPAAAIAAeng");
	var mask_3_graphics_17 = new cjs.Graphics().p("AsEPUIAA+nMAujAAAIAAeng");
	var mask_3_graphics_18 = new cjs.Graphics().p("AxjPUIAA+nMAu6AAAIAAeng");
	var mask_3_graphics_19 = new cjs.Graphics().p("A3qPUIAA+nMAvVAAAIAAeng");

	this.timeline.addTween(cjs.Tween.get(mask_3).to({graphics:null,x:0,y:0}).wait(12).to({graphics:mask_3_graphics_12,x:295.2,y:31.6}).wait(1).to({graphics:mask_3_graphics_13,x:292.2,y:31.6}).wait(1).to({graphics:mask_3_graphics_14,x:283.3,y:31.6}).wait(1).to({graphics:mask_3_graphics_15,x:268.4,y:31.6}).wait(1).to({graphics:mask_3_graphics_16,x:247.5,y:31.6}).wait(1).to({graphics:mask_3_graphics_17,x:220.7,y:31.6}).wait(1).to({graphics:mask_3_graphics_18,x:187.9,y:31.6}).wait(1).to({graphics:mask_3_graphics_19,x:146.9,y:31.6}).wait(3).to({graphics:null,x:0,y:0}).wait(27));

	// bottom
	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f().s("#FFFFFF").ss(1.5,2,0,3).p("AWqAAMgtTAAA");
	this.shape_2.setTransform(149.7,43.1);
	this.shape_2._off = true;

	var maskedShapeInstanceList = [this.shape_2];

	for(var shapedInstanceItr = 0; shapedInstanceItr < maskedShapeInstanceList.length; shapedInstanceItr++) {
		maskedShapeInstanceList[shapedInstanceItr].mask = mask_3;
	}

	this.timeline.addTween(cjs.Tween.get(this.shape_2).wait(12).to({_off:false},0).wait(37));

	// mask (mask)
	var mask_4 = new cjs.Shape();
	mask_4._off = true;
	var mask_4_graphics_19 = new cjs.Graphics().p("A20S8IAA+nMAtuAAAIAAeng");
	var mask_4_graphics_20 = new cjs.Graphics().p("A21RwIAA+nMAttAAAIAAeng");
	var mask_4_graphics_21 = new cjs.Graphics().p("A22Q1IAA+oMAttAAAIAAeog");
	var mask_4_graphics_22 = new cjs.Graphics().p("A22QKIAA+nMAttAAAIAAeng");
	var mask_4_graphics_23 = new cjs.Graphics().p("A22PxIAA+nMAttAAAIAAeng");
	var mask_4_graphics_24 = new cjs.Graphics().p("A22PpIAA+oMAttAAAIAAeog");

	this.timeline.addTween(cjs.Tween.get(mask_4).to({graphics:null,x:0,y:0}).wait(19).to({graphics:mask_4_graphics_19,x:146.6,y:121.2}).wait(1).to({graphics:mask_4_graphics_20,x:146.4,y:113.6}).wait(1).to({graphics:mask_4_graphics_21,x:146.2,y:107.7}).wait(1).to({graphics:mask_4_graphics_22,x:146,y:103.4}).wait(1).to({graphics:mask_4_graphics_23,x:145.9,y:100.9}).wait(1).to({graphics:mask_4_graphics_24,x:145.9,y:100.1}).wait(1).to({graphics:null,x:0,y:0}).wait(24));

	// left
	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f().s("#FFFFFF").ss(1.5,2,0,3).p("AAAC7IAAl1");
	this.shape_3.setTransform(4.8,24.4);
	this.shape_3._off = true;

	var maskedShapeInstanceList = [this.shape_3];

	for(var shapedInstanceItr = 0; shapedInstanceItr < maskedShapeInstanceList.length; shapedInstanceItr++) {
		maskedShapeInstanceList[shapedInstanceItr].mask = mask_4;
	}

	this.timeline.addTween(cjs.Tween.get(this.shape_3).wait(19).to({_off:false},0).wait(30));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-81.3,-319.7,514.8,474.7);


// stage content:
(lib._300x250 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// border
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#999999").s().p("A3bTiMAAAgnDMAu3AAAMAAAAnDgA3RTYMAujAAAMAAAgmvMgujAAAg");
	this.shape.setTransform(150,125);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

	// legal
	this.legal = new lib.legal();
	this.legal.parent = this;
	this.legal.setTransform(150.1,239.8,0.95,0.95,0,0,0,48.7,7.6);

	this.timeline.addTween(cjs.Tween.get(this.legal).wait(1));

	// cta
	this.cta = new lib.cta();
	this.cta.parent = this;
	this.cta.setTransform(151.9,217.3,0.68,0.68,0,0,0,151.8,23.9);

	this.timeline.addTween(cjs.Tween.get(this.cta).wait(1));

	// slingLogoPos
	this.slingLogoPos = new lib.slingLogo();
	this.slingLogoPos.parent = this;
	this.slingLogoPos.setTransform(152.2,219.9,0.902,0.902,0,0,0,-1.2,0);

	this.timeline.addTween(cjs.Tween.get(this.slingLogoPos).wait(1));

	// slingLogo
	this.slingLogo = new lib.slingLogo();
	this.slingLogo.parent = this;
	this.slingLogo.setTransform(152.3,29.8,0.76,0.76,0,0,0,-1.1,0);

	this.timeline.addTween(cjs.Tween.get(this.slingLogo).wait(1));

	// slash
	this.slash4 = new lib.slash();
	this.slash4.parent = this;
	this.slash4.setTransform(266.5,222.9,1,1,0,0,0,43.2,22);

	this.slash3 = new lib.slash();
	this.slash3.parent = this;
	this.slash3.setTransform(197.5,222.9,1,1,0,0,0,43.2,22);

	this.slash2 = new lib.slash();
	this.slash2.parent = this;
	this.slash2.setTransform(113.8,222.8,1,1,0,0,0,43.2,21.9);

	this.slash1 = new lib.slash();
	this.slash1.parent = this;
	this.slash1.setTransform(35.7,222.9,1,1,0,0,0,43.1,22);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.slash1},{t:this.slash2},{t:this.slash3},{t:this.slash4}]}).wait(1));

	// YouTube TV
	this.compareD = new lib.compareD();
	this.compareD.parent = this;
	this.compareD.setTransform(266.6,212.6,1.065,1.065,0,0,0,28.2,18.2);

	this.timeline.addTween(cjs.Tween.get(this.compareD).wait(1));

	// DirecTV
	this.compareA = new lib.compareA();
	this.compareA.parent = this;
	this.compareA.setTransform(33.1,212.6,1.065,1.065,0,0,0,28.2,18.2);

	this.timeline.addTween(cjs.Tween.get(this.compareA).wait(1));

	// PSVue
	this.compareC = new lib.compareC();
	this.compareC.parent = this;
	this.compareC.setTransform(195.8,212.7,1.065,1.065,0,0,0,32.6,18.4);

	this.timeline.addTween(cjs.Tween.get(this.compareC).wait(1));

	// Hulu
	this.compareB = new lib.compareB();
	this.compareB.parent = this;
	this.compareB.setTransform(112,212.7,1.065,1.065,0,0,0,36.6,18.4);

	this.timeline.addTween(cjs.Tween.get(this.compareB).wait(1));

	// priceLegal
	this.priceLegal = new lib.priceLegal();
	this.priceLegal.parent = this;
	this.priceLegal.setTransform(150,241.8,1,1,0,0,0,105.2,9.7);

	this.timeline.addTween(cjs.Tween.get(this.priceLegal).wait(1));

	// txtFinal
	this.txtFinal = new lib.txtFinal();
	this.txtFinal.parent = this;
	this.txtFinal.setTransform(150,71.5,1,1,0,0,0,123.3,17.2);

	this.timeline.addTween(cjs.Tween.get(this.txtFinal).wait(1));

	// pricePos
	this.pricePos = new lib.price();
	this.pricePos.parent = this;
	this.pricePos.setTransform(149.5,141.2,1,1,0,0,0,140.3,140.3);

	this.timeline.addTween(cjs.Tween.get(this.pricePos).wait(1));

	// price
	this.price = new lib.price();
	this.price.parent = this;
	this.price.setTransform(149.5,105.8,1,1,0,0,0,140.3,140.3);

	this.timeline.addTween(cjs.Tween.get(this.price).wait(1));

	// txt1_1
	this.txt1_1 = new lib.txt1_1();
	this.txt1_1.parent = this;
	this.txt1_1.setTransform(150.3,124.3,1,1,0,0,0,124.8,55);

	this.timeline.addTween(cjs.Tween.get(this.txt1_1).wait(1));

	// panelVS
	this.panelVS = new lib.panelVS();
	this.panelVS.parent = this;
	this.panelVS.setTransform(150,208.9,1,1,0,0,0,150,41.2);

	this.timeline.addTween(cjs.Tween.get(this.panelVS).wait(1));

	// panelBlue
	this.panelBlue = new lib.panelBlue();
	this.panelBlue.parent = this;
	this.panelBlue.setTransform(150,125.1,1,1.278,0,0,0,150,97.8);

	this.timeline.addTween(cjs.Tween.get(this.panelBlue).wait(1));

	// bg
	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#FFFFFF").s().p("A3bTiMAAAgnDMAu3AAAMAAAAnDg");
	this.shape_1.setTransform(150,125);

	this.timeline.addTween(cjs.Tween.get(this.shape_1).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(150,90.5,300,316.1);
// library properties:
lib.properties = {
	width: 300,
	height: 250,
	fps: 30,
	color: "#FFFFFF",
	opacity: 1.00,
	webfonts: {},
	manifest: [],
	preloads: []
};




})(lib = lib||{}, images = images||{}, createjs = createjs||{}, ss = ss||{}, AdobeAn = AdobeAn||{});
var lib, images, createjs, ss, AdobeAn;