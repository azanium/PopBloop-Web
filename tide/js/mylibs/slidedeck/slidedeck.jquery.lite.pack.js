/**
 * SlideDeck 1.3.2 Lite - 2011-11-17
 * Copyright (c) 2011 digital-telepathy (http://www.dtelepathy.com)
 * 
 * Support the developers by purchasing the Pro version at http://www.slidedeck.com/download
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * 
 * More information on this project:
 * http://www.slidedeck.com/
 * 
 * Requires: jQuery v1.3+
 * 
 * Full Usage Documentation: http://www.slidedeck.com/usage-documentation 
 * Usage:
 *     $(el).slidedeck(opts);
 * 
 * @param {HTMLObject} el    The <DL> element to extend as a SlideDeck
 * @param {Object} opts      An object to pass custom override options to
 */

var SlideDeck;var SlideDeckSkin={};(function($){window.SlideDeck=function(u,v){var w=this,u=$(u);var x="1.3.2";this.options={speed:500,transition:'swing',start:1,activeCorner:true,index:true,scroll:true,keys:true,autoPlay:false,autoPlayInterval:5000,hideSpines:false,cycle:false,slideTransition:'slide'};this.classes={slide:'slide',spine:'spine',label:'label',index:'index',active:'active',indicator:'indicator',activeCorner:'activeCorner',disabled:'disabled',vertical:'slidesVertical',previous:'previous',next:'next'};this.current=1;this.deck=u;this.former=-1;this.spines=u.children('dt');this.slides=u.children('dd');this.controlTo=1;this.session=[];this.disabledSlides=[];this.pauseAutoPlay=false;this.isLoaded=false;var y=navigator.userAgent.toLowerCase();this.browser={chrome:y.match(/chrome/)?true:false,firefox:y.match(/firefox/)?true:false,firefox2:y.match(/firefox\/2/)?true:false,firefox30:y.match(/firefox\/3\.0/)?true:false,msie:y.match(/msie/)?true:false,msie6:(y.match(/msie 6/)&&!y.match(/msie 7|8/))?true:false,msie7:y.match(/msie 7/)?true:false,msie8:y.match(/msie 8/)?true:false,msie9:y.match(/msie 9/)?true:false,chromeFrame:(y.match(/msie/)&&y.match(/chrome/))?true:false,opera:y.match(/opera/)?true:false,safari:(y.match(/safari/)&&!y.match(/chrome/))?true:false};for(var b in this.browser){if(this.browser[b]===true){this.browser._this=b}}if(this.browser.chrome===true&&!this.browser.chromeFrame){this.browser.version=y.match(/chrome\/([0-9\.]+)/)[1]}if(this.browser.firefox===true){this.browser.version=y.match(/firefox\/([0-9\.]+)/)[1]}if(this.browser.msie===true){this.browser.version=y.match(/msie ([0-9\.]+)/)[1]}if(this.browser.opera===true){this.browser.version=y.match(/version\/([0-9\.]+)/)[1]}if(this.browser.safari===true){this.browser.version=y.match(/version\/([0-9\.]+)/)[1]}var A;var B;var C,spine_outer_width,slide_width,spine_half_width;this.looping=false;var D="";switch(w.browser._this){case"firefox":case"firefox3":D="-moz-";break;case"chrome":case"safari":D="-webkit-";break;case"opera":D="-o-";break}var E=function(a){if(w.browser.msie&&!w.browser.msie9){var b=a.css('background-color');var c=b;if(c=="transparent"){b="#ffffff"}else{if(c.match('#')){if(c.length<7){var t="#"+c.substr(1,1)+c.substr(1,1)+c.substr(2,1)+c.substr(2,1)+c.substr(3,1)+c.substr(3,1);b=t}}}b=b.replace("#","");var d={r:b.substr(0,2),g:b.substr(2,2),b:b.substr(4,2)};var e="#";var f="01234567890ABCDEF";for(var k in d){d[k]=Math.max(0,(parseInt(d[k],16)-1));d[k]=f.charAt((d[k]-d[k]%16)/16)+f.charAt(d[k]%16);e+=d[k]}a.find('.'+w.classes.index).css({'filter':'progid:DXImageTransform.Microsoft.BasicImage(rotation=1) chroma(color='+e+')',backgroundColor:e})}};var F={id:"SlideDeck_Bug"+(Math.round(Math.random()*100000000)),styles:"position:absolute !important;height:"+13+"px !important;width:"+130+"px !important;display:block !important;margin:0 !important;overflow:hidden !important;visibility:visible !important;opacity:1 !important;padding:0 !important;z-index:999 !important",width:130,height:13};var G=function(){if(!document.getElementById(F.id)){var a=document.createElement('A');a.id=F.id;a.href="http://www.slidedeck.com/ref?utm_source=LiteUser&utm_medium=Link&utm_campaign=SDbug";a.target="_blank";var b=document.createElement('IMG');b.src=(document.location.protocol=="https:"?"https:":"http:")+"//www.slidedeck.com/6885858486f31043e5839c735d99457f045affd0/"+x+"/lite";b.alt="Powered by SlideDeck&trade;";b.width=F.width;b.height=F.height;b.border="0";a.appendChild(b);F.top=(u.offset().top+u.height()+5);F.left=u.offset().left+u.width()-F.width;var s=document.createElement('STYLE');s.type="text/css";var c='#'+F.id+'{top:'+F.top+'px;left:'+F.left+'px;'+F.styles+'}'+'#'+F.id+' img{top:0 !important;left:0 !important;'+F.styles+'}';if(s.styleSheet){s.styleSheet.cssText=c}else{s.appendChild(document.createTextNode(c))}$('head').append(s);if(Math.random()<0.5){$(document.body).prepend(a)}else{$(document.body).append(a)}$(window).resize(function(){G()})}F.top=(u.offset().top+u.height()+5);F.left=u.offset().left+u.width()-F.width;$('#'+F.id).css({top:F.top+"px",left:F.left+"px"})};var H=function(){gotoNext=function(){if(w.pauseAutoPlay===false){if(w.options.cycle===false&&w.current==w.slides.length){w.pauseAutoPlay=true}else{w.next()}}};setInterval(gotoNext,w.options.autoPlayInterval)};var I=function(a,i){var b={display:'block'};b[D+'transform-origin']="50% 50%";b[D+'transform']="";if(i<w.current){var c=i*spine_outer_width;if(w.options.hideSpines===true){if(i==w.current-1){c=0}else{c=0-(w.options.start-i-1)*u.width()}}}else{var c=i*spine_outer_width+slide_width;if(w.options.hideSpines===true){c=(i+1-w.options.start)*u.width()}}switch(a){case"slide":default:b.left=c;b.zIndex=1;break}w.slides.eq(i).css(D+'transition',"").css(b);return c};var J=function(){if($.inArray(u.css('position'),['position','absolute','fixed'])){u.css('position','relative')}u.css('overflow','hidden');for(var i=0;i<w.slides.length;i++){var e=$(w.slides[i]);if(w.spines.length>i){var f=$(w.spines[i])}var g={top:parseInt(e.css('padding-top'),10),right:parseInt(e.css('padding-right'),10),bottom:parseInt(e.css('padding-bottom'),10),left:parseInt(e.css('padding-left'),10)};var h={top:parseInt(e.css('border-top-width'),10),right:parseInt(e.css('border-right-width'),10),bottom:parseInt(e.css('border-bottom-width'),10),left:parseInt(e.css('border-left-width'),10)};for(var k in h){h[k]=isNaN(h[k])?0:h[k]}if(i<w.current){if(i==w.current-1){if(w.options.hideSpines!==true){f.addClass(w.classes.active)}e.addClass(w.classes.active)}}w.slide_width=(slide_width-g.left-g.right-h.left-h.right);var j={position:'absolute',zIndex:1,height:(B-g.top-g.bottom-h.top-h.bottom)+"px",width:w.slide_width+"px",margin:0,paddingLeft:g.left+spine_outer_width+"px"};var l=I(w.options.slideTransition,i);e.css(j).addClass(w.classes.slide).addClass(w.classes.slide+"_"+(i+1));if(w.options.hideSpines!==true){var m={top:parseInt(f.css('padding-top'),10),right:parseInt(f.css('padding-right'),10),bottom:parseInt(f.css('padding-bottom'),10),left:parseInt(f.css('padding-left'),10)};for(var k in m){if(m[k]<10&&(k=="left"||k=="right")){m[k]=10}}var n=m.top+"px "+m.right+"px "+m.bottom+"px "+m.left+"px";var o={position:'absolute',zIndex:3,display:'block',left:l,width:(B-m.left-m.right)+"px",height:C+"px",padding:n,rotation:'270deg','-webkit-transform':'rotate(270deg)','-webkit-transform-origin':spine_half_width+'px 0px','-moz-transform':'rotate(270deg)','-moz-transform-origin':spine_half_width+'px 0px','-o-transform':'rotate(270deg)','-o-transform-origin':spine_half_width+'px 0px',textAlign:'right'};if(!w.browser.msie9){o.top=(w.browser.msie)?0:(B-spine_half_width)+"px";o.marginLeft=((w.browser.msie)?0:(0-spine_half_width))+"px";o.filter='progid:DXImageTransform.Microsoft.BasicImage(rotation=3)'}f.css(o).addClass(w.classes.spine).addClass(w.classes.spine+"_"+(i+1));if(w.browser.msie9){f[0].style.msTransform='rotate(270deg)';f[0].style.msTransformOrigin=Math.round(parseInt(u[0].style.height,10)/2)+'px '+Math.round(parseInt(u[0].style.height,10)/2)+'px'}}else{if(typeof(f)!="undefined"){f.hide()}}if(i==w.slides.length-1){e.addClass('last');if(w.options.hideSpines!==true){f.addClass('last')}}if(w.options.activeCorner===true&&w.options.hideSpines===false){var p=document.createElement('DIV');p.className=w.classes.activeCorner+' '+(w.classes.spine+'_'+(i+1));f.after(p);f.next('.'+w.classes.activeCorner).css({position:'absolute',top:'25px',left:l+spine_outer_width+"px",overflow:"hidden",zIndex:"999"}).hide();if(f.hasClass(w.classes.active)){f.next('.'+w.classes.activeCorner).show()}}if(w.options.hideSpines!==true){var q=document.createElement('DIV');q.className=w.classes.index;if(w.options.index!==false){var r;if(typeof(w.options.index)!='boolean'){r=w.options.index[i%w.options.index.length]}else{r=""+(i+1)}q.appendChild(document.createTextNode(r))}f.append(q);f.find('.'+w.classes.index).css({position:'absolute',zIndex:2,display:'block',width:C+"px",height:C+"px",textAlign:'center',bottom:((w.browser.msie)?0:(0-spine_half_width))+"px",left:((w.browser.msie)?5:20)+"px",rotation:"90deg",'-webkit-transform':'rotate(90deg)','-webkit-transform-origin':spine_half_width+'px 0px','-moz-transform':'rotate(90deg)','-moz-transform-origin':spine_half_width+'px 0px','-o-transform':'rotate(90deg)','-o-transform-origin':spine_half_width+'px 0px'});if(w.browser.msie9){f.find('.'+w.classes.index)[0].style.msTransform='rotate(90deg)'}E(f)}}G();if(w.options.hideSpines!==true){w.spines.bind('click',function(a){a.preventDefault();w.goTo(w.spines.index(this)+1)})}if(w.options.keys!==false){$(document).bind('keydown',function(a){if($(a.target).parents().index(w.deck)==-1){if(a.keyCode==39){w.pauseAutoPlay=true;w.next()}else if(a.keyCode==37){w.pauseAutoPlay=true;w.prev()}}})}if(typeof($.event.special.mousewheel)!="undefined"){u.bind("mousewheel",function(a,b){if(w.options.scroll!==false){var c=a.detail?a.detail:a.wheelDelta;if(typeof(c)=='undefined'){c=0-b}if(w.browser.msie||w.browser.safari||w.browser.chrome){c=0-c}var d=false;if($(a.originalTarget).parents(w.deck).length){if($.inArray(a.originalTarget.nodeName.toLowerCase(),['input','select','option','textarea'])!=-1){d=true}}if(d!==true){if(c>0){switch(w.options.scroll){case"stop":a.preventDefault();break;case true:default:if(w.current<w.slides.length||w.options.cycle==true){a.preventDefault()}break}w.pauseAutoPlay=true;w.next()}else{switch(w.options.scroll){case"stop":a.preventDefault();break;case true:default:if(w.current!=1||w.options.cycle==true){a.preventDefault()}break}w.pauseAutoPlay=true;w.prev()}}}})}$(w.spines[w.current-2]).addClass(w.classes.previous);$(w.spines[w.current]).addClass(w.classes.next);if(w.options.autoPlay===true){H()}w.isLoaded=true};var K=function(a){a=Math.min(w.slides.length,Math.max(1,a));return a};var L=function(a){var b=[];if(typeof(w.options.complete)=="function"){b.push(function(){w.options.complete(w)})}switch(typeof(a)){case"function":b.push(function(){a(w)});break;case"object":b.push(function(){a.complete(w)});break}var c=function(){w.looping=false;for(var z=0;z<b.length;z++){b[z]()}};return c};var M={slide:function(a,b,c){for(var i=0;i<w.slides.length;i++){var d=0;if(w.options.hideSpines!==true){var e=$(w.spines[i])}var f=$(w.slides[i]);if(i<w.current){if(i==(w.current-1)){f.addClass(w.classes.active);if(w.options.hideSpines!==true){e.addClass(w.classes.active);e.next('.'+w.classes.activeCorner).show()}}d=i*spine_outer_width}else{d=i*spine_outer_width+slide_width}if(w.options.hideSpines===true){d=(i-w.current+1)*u.width()}var g={duration:w.options.speed,easing:w.options.transition};if(i==(c===true&&w.current-1)||i==(c===false&&w.current)){if(i===0){g.complete=L(b)}}f.stop().animate({left:d+"px",width:w.slide_width+"px"},g);if(w.options.hideSpines!==true){E(e);if(e.css('left')!=d+"px"){e.stop().animate({left:d+"px"},{duration:w.options.speed,easing:w.options.transition});e.next('.'+w.classes.activeCorner).stop().animate({left:d+spine_outer_width+"px"},{duration:w.options.speed,easing:w.options.transition})}}}}};var N=function(a,b){a=K(a);if((a<=w.controlTo||w.options.controlProgress!==true)&&w.looping===false){var c=true;if(a<w.current){c=false}var d=[w.classes.active,w.classes.next,w.classes.previous].join(' ');w.former=w.current;w.current=a;if(typeof(w.options.before)=="function"){w.options.before(w)}if(typeof(b)!="undefined"){if(typeof(b.before)=="function"){b.before(w)}}if(w.current!=w.former){w.spines.removeClass(d);w.slides.removeClass(d);u.find('.'+w.classes.activeCorner).hide();w.spines.eq(w.current-2).addClass(w.classes.previous);w.spines.eq(w.current).addClass(w.classes.next);var e='slide';if(typeof(M[w.options.slideTransition])!='undefined'){e=w.options.slideTransition}M[e](a,b,c)}G()}};var O=function(a,b){var c=a;if(typeof(a)==="string"){c={};c[a]=b}for(var d in c){b=c[d];switch(d){case"speed":case"start":b=parseFloat(b);if(isNaN(b)){b=w.options[d]}break;case"scroll":case"keys":case"activeCorner":case"hideSpines":case"autoPlay":case"cycle":if(typeof(b)!=="boolean"){b=w.options[d]}break;case"transition":if(typeof(b)!=="string"){b=w.options[d]}break;case"complete":case"before":if(typeof(b)!=="function"){b=w.options[d]}break;case"index":if(typeof(b)!=="boolean"){if(!$.isArray(b)){b=w.options[d]}}break}w.options[d]=b}};var P=function(){B=u.height();A=u.width();u.css('height',B+"px");C=0;spine_outer_width=0;if(w.options.hideSpines!==true&&w.spines.length>0){C=$(w.spines[0]).height();spine_outer_width=$(w.spines[0]).outerHeight()}slide_width=A-spine_outer_width*w.spines.length;if(w.options.hideSpines===true){slide_width=A}spine_half_width=Math.ceil(C/2)};var Q=function(a){if((w.browser.opera&&w.browser.version<"10.5")||w.browser.msie6||w.browser.firefox2||w.browser.firefox30){if(typeof(console)!="undefined"){if(typeof(console.error)=="function"){console.error("This web browser is not supported by SlideDeck. Please view this page in a modern, CSS3 capable browser or a current version of Inernet Explorer")}}return false}if(typeof(a)!="undefined"){for(var b in a){w.options[b]=a[b]}}if(w.spines.length<1){w.options.hideSpines=true}if(w.options.hideSpines===true){w.options.activeCorner=false}w.options.slideTransition='slide';w.current=Math.min(w.slides.length,Math.max(1,w.options.start));if(u.height()>0){P();J()}else{var c;c=setTimeout(function(){P();if(u.height()>0){clearInterval(c);P();J()}},20)}};var R=function(a){var b;b=setInterval(function(){if(w.isLoaded===true){clearInterval(b);a(w)}},20)};this.loaded=function(a){R(a);return w};this.next=function(a){var b=Math.min(w.slides.length,(w.current+1));if(w.options.cycle===true){if(w.current+1>w.slides.length){b=1}}N(b,a);return w};this.prev=function(a){var b=Math.max(1,(w.current-1));if(w.options.cycle===true){if(w.current-1<1){b=w.slides.length}}N(b,a);return w};this.goTo=function(a,b){w.pauseAutoPlay=true;N(Math.min(w.slides.length,Math.max(1,a)),b);return w};this.setOption=function(a,b){O(a,b);return w};this.vertical=function(){return false};Q(v)};$.fn.slidedeck=function(a){var b=[];for(var i=0;i<this.length;i++){if(!this[i].slidedeck){this[i].slidedeck=new SlideDeck(this[i],a)}b.push(this[i].slidedeck)}return b.length>1?b:b[0]}})(jQuery);