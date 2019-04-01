
(function($,Edge,compId){var Composition=Edge.Composition,Symbol=Edge.Symbol;
//Edge symbol: 'stage'
(function(symbolName){Symbol.bindElementAction(compId,symbolName,"${_CTA}","mouseout",function(sym,e){sym.getSymbol("CTA").play("up");});
//Edge binding end
Symbol.bindElementAction(compId,symbolName,"${_CTA}","mouseover",function(sym,e){sym.getSymbol("CTA").play("over");});
//Edge binding end
Symbol.bindElementAction(compId,symbolName,"${_CTA}","mouseup",function(sym,e){sym.getSymbol("CTA").play("up");});
//Edge binding end
Symbol.bindElementAction(compId,symbolName,"${_Stage}","click",function(sym,e){clickTAG();});
//Edge binding end
Symbol.bindElementAction(compId,symbolName,"${_btn_sal}","mouseover",function(sym,e){sym.$("btn_kathleen").hide();sym.$("btn_thad").hide();sym.$("btn_sal").hide();sym.play("sal");});
//Edge binding end
Symbol.bindElementAction(compId,symbolName,"${_btn_thad}","mouseover",function(sym,e){sym.$("btn_kathleen").hide();sym.$("btn_thad").hide();sym.$("btn_sal").hide();sym.play("thad");});
//Edge binding end
Symbol.bindElementAction(compId,symbolName,"${_btn_kathleen}","mouseover",function(sym,e){sym.$("btn_kathleen").hide();sym.$("btn_thad").hide();sym.$("btn_sal").hide();sym.play("kathleen");});
//Edge binding end
})("stage");
//Edge symbol end:'stage'

//=========================================================

//Edge symbol: 'CTA'
(function(symbolName){})("CTA");
//Edge symbol end:'CTA'

//=========================================================

//Edge symbol: 'btn_box1'
(function(symbolName){})("btn_kathleen");
//Edge symbol end:'btn_kathleen'

//=========================================================

//Edge symbol: 'btn_box2'
(function(symbolName){})("btn_thad");
//Edge symbol end:'btn_thad'

//=========================================================

//Edge symbol: 'btn_box3'
(function(symbolName){})("btn_sal");
//Edge symbol end:'btn_sal'
})(jQuery,AdobeEdge,"EDGE-7162222");