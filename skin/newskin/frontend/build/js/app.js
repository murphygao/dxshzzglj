/**
 * Created by buuug7 on 2016/3/24.
 */

//You can also extend jQuery to add a function that does it all for you:
$.fn.extend({
  animateCss: function (animationName) {
    var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
    $(this).addClass('animated ' + animationName).one(animationEnd, function () {
      $(this).removeClass('animated ' + animationName);
    });
  }
});

$(document).ready(function () {

  $('header').vegas({
    timer: false,
    cover: true,
    transition: ['fade', 'zoomOut', 'swirlLeft'],
    slides: [
      {src: '/dist/images/h03.jpg'}
    ]
  });


  $("#nav").slide({
    type: "menu",
    titCell: ".nli",
    targetCell: ".sub",
    effect: "slideDown",
    delayTime: 300,
    triggerTime: 0,
    returnDefault: true
  });

  $("#jiaodianxinwen").owlCarousel({
    loop: true,
    //margin:10,
    responsiveClass: true,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1,
        nav: false
      },
      600: {
        items: 1,
        nav: false
      },
      1000: {
        items: 1,
        nav: false
      }
    }
  });

  jQuery(".box-a").slide({});


  $("#news-box-c-2").slide({});


  // 底部图片滚动
  $(".news-images").slide({
    mainCell: ".bd ul",
    autoPlay: true,
    effect: "leftMarquee",
    vis: 8,
    interTime: 30,
    trigger: "click"
  });

  /////////////////////////////////////////////


  $("#latest-news").owlCarousel({
    loop: true,
    autoplay: true,
    items: 1,
    nav: false,
    margin: 0,
    autoWidth: true,
    dots: false,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    animateOut: 'slideOutUp',
    animateIn: 'slideInUp',
  });

  $("#m1").slide({trigger: "click"});
  $("#m2").slide({trigger: "click"});
  $("#m3").slide({trigger: "click"});

  // 手动调节内容页中图片的居中以及
  $(".content-zhengwen img").css({
    "maxWidth": "100%",
    "display": "block",
    "height": "auto",
    "margin": "0 auto",
    "overflow": "hidden"
  });
});

