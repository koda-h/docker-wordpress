/////////////////////////////////
// window size
/////////////////////////////////
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y };
}
var viewport = updateViewportDimensions();



/////////////////////////////////
// 画面のサイズ変更が完了した時にjqueryを動かす
/////////////////////////////////
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();
var timeToWaitForLast = 100;


function loadGravatars() {
  viewport = updateViewportDimensions();
  if (viewport.width >= 768) {
  jQuery('.comment img[data-gravatar]').each(function(){
    jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
  });
	}
}

/////////////////////////////////
// target Link Img addClass
/////////////////////////////////
jQuery(document).ready(function ($) {
	$("a:has(img)").addClass("no-icon");
});

/////////////////////////////////
// Page Top Button
/////////////////////////////////
jQuery(document).ready(function($) {
$(function() {
    var showFlag = false;
    var topBtn = $('#page-top');
    var showFlag = false;
    $(window).scroll(function () {
        if ($(this).scrollTop() > 400) {
            if (showFlag == false) {
                showFlag = true;
                topBtn.stop().addClass('pt-active'); 
            }
        } else {
            if (showFlag) {
                showFlag = false;
                topBtn.stop().removeClass('pt-active'); 
            }
        }
    });

    topBtn.click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });
});
  loadGravatars();
});