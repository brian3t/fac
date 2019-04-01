// 300x250 ALACARTE

function initVars(){


	window.txt1_1 = exportRoot.txt1_1;

	window.price = exportRoot.price;
	window.pricePos = exportRoot.pricePos;
	pricePos.alpha = 0;

	window.panelVS = exportRoot.panelVS;

	window.compareA = exportRoot.compareA;
	window.compareB = exportRoot.compareB;
	window.compareC = exportRoot.compareC;
	window.compareD = exportRoot.compareD;

	window.slash1 = exportRoot.slash1;
	window.slash2 = exportRoot.slash2;
	window.slash3 = exportRoot.slash3;
	window.slash4 = exportRoot.slash4;

	window.priceLegal = exportRoot.priceLegal;

	window.txtFinal = exportRoot.txtFinal;

	window.cta				= exportRoot.cta;
	window.cta.ctaRef.alpha = 0;

	window.legal			= exportRoot.legal;
	window.slingLogo		= exportRoot.slingLogo;
	window.slingLogoPos 	= exportRoot.slingLogoPos;
	slingLogoPos.alpha = 0;

	// end editable vars

	window.loading = document.getElementById("loading");

	initPlayback();
}

function runGSAP() {

	setTimeout(function(){console.log("15 sec");}, 15000);

	tl = new TimelineLite();

	window.GSAPTimeline = tl;

	console.log("runGSAP");

	window.imgEase = Power3.easeOut;
	enterEase = Power2.easeOut;
	exitEase = Power3.easeIn;
	enter = 0.5;

	var easeBounce = Back.easeOut.config(3);

	window.moveAmt = 100;

	tl

	.to( loading		, 	0.5,		{	opacity:0	}) // fade out loader
	.from(	canvas  ,	0.5,		{	opacity:0	})


	.from(txt1_1, enter, {alpha:0, scaleX:0, scaleY:0, ease:enterEase})
	.from(txt1_1, 1, {}) //pause
	.to(txt1_1, exit, {alpha:0, scaleX:0, scaleY:0, ease:exitEase})

	.from(price, enter, {scaleX:0, scaleY:0, ease:enterEase})
	.from(price, 0.25, {}) //pause
	.from(panelVS, enter, {y:panelVS.y+moveAmt, ease:enterEase}, "panelVSIn")
	.from(priceLegal, enter, {alpha:0})
	.from(compareA, enter, {y:panelVS.y+moveAmt, ease:enterEase})
	.from(compareB, enter, {y:panelVS.y+moveAmt, ease:enterEase})
	.from(compareC, enter, {y:panelVS.y+moveAmt, ease:enterEase})
	.from(compareD, enter, {y:panelVS.y+moveAmt, ease:enterEase})
	.from(compareD, 1.5, {}) //pause

	// slashes
	.from(slash1, 0.25, {scaleX:0, scaleY:0, ease:easeBounce})
	.from(slash2, 0.25, {scaleX:0, scaleY:0, ease:easeBounce})
	.from(slash3, 0.25, {scaleX:0, scaleY:0, ease:easeBounce})
	.from(slash4, 0.25, {scaleX:0, scaleY:0, ease:easeBounce})
	.from(slash4, 0.5, {}) //pause

	.to(panelVS, exit, {y:panelVS.y+moveAmt, ease:exitEase}, "panelVSOut")
	.to(compareA, exit, {y:panelVS.y+moveAmt, ease:exitEase}, "panelVSOut")
	.to(compareB, exit, {y:panelVS.y+moveAmt, ease:exitEase}, "panelVSOut")
	.to(compareC, exit, {y:panelVS.y+moveAmt, ease:exitEase}, "panelVSOut")
	.to(compareD, exit, {y:panelVS.y+moveAmt, ease:exitEase}, "panelVSOut")
	.to(slash1, exit, {y:panelVS.y+moveAmt, ease:exitEase}, "panelVSOut")
	.to(slash2, exit, {y:panelVS.y+moveAmt, ease:exitEase}, "panelVSOut")
	.to(slash3, exit, {y:panelVS.y+moveAmt, ease:exitEase}, "panelVSOut")
	.to(slash4, exit, {y:panelVS.y+moveAmt, ease:exitEase}, "panelVSOut")
	.to(priceLegal, exit, {y:panelVS.y+moveAmt, ease:exitEase}, "panelVSOut")

	.to(price, enter, {y:pricePos.y, ease:Power2.easeInOut})

	.from(txtFinal, enter, {alpha:0, scaleX:0, scaleY:0, ease:enterEase})


	// .to(	slingLogo 	, enter, {x:slingLogoPos.x, ease:Power2.easeInOut})
	.from(	cta 		, enter, {scaleX:0, scaleY:0, ease:enterEase}, "cta")
	.add(function(){cta.gotoAndPlay("ctaBuild");}, "cta+=0.25")
	.from(	legal 		,	0.7,		{	alpha:0	}, "cta+=0.5"		)

	.add(function(){	slingLogo.gotoAndPlay("wave");	}, "wave")

	;

}


function initPlayback() {

	stage = new createjs.Stage(canvas);
	stage.addChild(exportRoot);
	stage.update();

	createjs.Ticker.timingMode = createjs.Ticker.RAF_SYNCHED; //AdHelper.js

	createjs.Ticker.setFPS(lib.properties.fps);
	createjs.Ticker.addEventListener("tick", stage);

	exportRoot.gotoAndStop(0);

	runGSAP();
}

var tl;

var initDelay 	= 0.25; // hide initial flash of content until gsap positions everything
var pause 		= 1.5;
var enter 		= 1;
var exit 		= 0.5;

var enterEase 	= Elastic.easeOut.config(0.75,0.5);
var exitEase 	= Back.easeIn.config(2);

var xHide = -350;
var xHideRight = 455;
var yHide = 250;


function contCanvas() {
	exportRoot.play();
}

function contGSAP() {
	tl.resume();
}

function pauseGSAP() {
	tl.pause();
	setTimeout(contGSAP, (pause * 1000));
}

