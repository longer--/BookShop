/**
 *  当页面滚动时为导航栏添加效果
 *  Author: Santino Wu
 *  Date:   2013-12-15
 *  ---- ---- ---- ----
 *  使用方法：
 *  jQuery.fn.navBarScroll({
 *      selector:       '#navbar',  // 导航标识
 *      fadeOutOpacity: .5,         // 淡出透明度
 *      fadeInOpacity:  1,          // 淡入透明度
 *      fadeOutSpeed:   200,        // 淡出速度
 *      fadeInSpeed:    100         // 淡入速度
 *  });
 */
jQuery.fn.navBarScroll = function (options){
    options = $.extend({
        selector: '#navbar',
        fadeOutOpacity: .5,
        fadeInOpacity: 1,
        fadeOutSpeed: 200,
        fadeInSpeed: 100
    }, options || {});

    var navBar = jQuery(options.selector);
    var scrollTop = null;
    var animating = false;
    
    navBar.mouseover(function (){
        jQuery(this).stop().animate({
            opacity: options.fadeInOpacity,
        }, options.fadeInSpeed, function (){
            animating = false;
        });
    });
    jQuery(window).bind("scroll", function(){
        scrollTop = jQuery(document).scrollTop();
        if (scrollTop == 0){
            navBar.stop().animate({
                opacity: options.fadeInOpacity,
            }, options.fadeInSpeed, function (){
                animating = false;
            });
        }
        else {
            /** This makes navbar fade out more perfect when window is scrolling too fast */
            if (animating) return;
            
            animating = true;
            navBar.stop().animate({
                opacity: options.fadeOutOpacity,
            }, options.fadeOutSpeed, function (){
                animating = false;
            });
        }
    });
};
