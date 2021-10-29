/*!
 * jQuery Vertical News Ticker Plugin
 *
 * http://www.jugbit.com/jquery-vticker-vertical-news-ticker/
 * http://github.com/kasp3r/vTicker
 *
 * Copyright 2013 Tadas Juozapaitis
 * Released under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 */
!function(h){h.fn.vTicker=function(n){n=h.extend({speed:700,pause:4e3,showItems:3,animation:"",mousePause:!0,isPaused:!1,direction:"up",height:0},n);return moveUp=function(e,i,n){var t;n.isPaused||(e=(t=e.children("ul")).children("li:first").clone(!0),0<n.height&&(i=t.children("li:first").height()),t.animate({top:"-="+i+"px"},n.speed,function(){h(this).children("li:first").remove(),h(this).css("top","0px")}),"fade"==n.animation&&(t.children("li:first").fadeOut(n.speed),0==n.height&&t.children("li:eq("+n.showItems+")").hide().fadeIn(n.speed).show()),e.appendTo(t))},moveDown=function(e,i,n){var t;n.isPaused||(e=(t=e.children("ul")).children("li:last").clone(!0),0<n.height&&(i=t.children("li:first").height()),t.css("top","-"+i+"px").prepend(e),t.animate({top:0},n.speed,function(){h(this).children("li:last").remove()}),"fade"==n.animation&&(0==n.height&&t.children("li:eq("+n.showItems+")").fadeOut(n.speed),t.children("li:first").hide().fadeIn(n.speed).show()))},this.each(function(){var e=h(this),i=0;e.css({overflow:"hidden",position:"relative"}).children("ul").css({position:"absolute",margin:0,padding:0}).children("li").css({margin:0,padding:0}),0==n.height?(e.children("ul").children("li").each(function(){h(this).height()>i&&(i=h(this).height())}),e.children("ul").children("li").each(function(){h(this).height(i)}),e.height(i*n.showItems)):e.height(n.height);setInterval(function(){("up"==n.direction?moveUp:moveDown)(e,i,n)},n.pause);n.mousePause&&e.bind("mouseenter",function(){n.isPaused=!0}).bind("mouseleave",function(){n.isPaused=!1})})}}(jQuery);