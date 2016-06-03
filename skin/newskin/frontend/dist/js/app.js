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

// 设置为主页
function SetHome(obj, vrl) {
  try {
    obj.style.behavior = 'url(#default#homepage)';
    obj.setHomePage(vrl);
  }
  catch (e) {
    if (window.netscape) {
      try {
        netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
      }
      catch (e) {
        alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将 [signed.applets.codebase_principal_support]的值设置为'true',双击即可。");
      }
      var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
      prefs.setCharPref('browser.startup.homepage', vrl);
    } else {
      alert("您的浏览器不支持，请按照下面步骤操作：1.打开浏览器设置。2.点击设置网页。3.输入：" + vrl + "点击确定。");
    }
  }
}
// 加入收藏
function shoucang(sTitle, sURL) {
  try {
    window.external.addFavorite(sURL, sTitle);
  }
  catch (e) {
    try {
      window.sidebar.addPanel(sTitle, sURL, "");
    }
    catch (e) {
      alert("加入收藏失败，请使用Ctrl+D进行添加");
    }
  }
}

$(document).ready(function () {

  // 首页头部背景图切换
  $('header').vegas({
    timer: false,
    //cover: true,
    transition: ['fade', 'zoomOut', 'swirlLeft'],
    slides: [
      {src: '/skin/newskin/frontend/dist/images/h01.jpg'},
      {src: '/skin/newskin/frontend/dist/images/h02.jpg'},
      {src: '/skin/newskin/frontend/dist/images/h03.jpg'}
    ]
  });

  // 导航下拉
  $("#nav").slide({
    type: "menu",
    titCell: ".nli",
    targetCell: ".sub",
    effect: "slideDown",
    delayTime: 300,
    triggerTime: 0,
    returnDefault: true
  });

  // 幻灯片切换
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

  // 专题专栏
  $("#zhuantizhuanlan").owlCarousel({
    loop: true,
    margin: 15,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    items: 4,
    nav: true,
    navText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
    ],
  });

  // 信息公开菜单切换
  jQuery(".box-a").slide({});


  // 底部图片滚动
  $(".news-images").slide({
    mainCell: ".bd ul",
    autoPlay: true,
    effect: "leftMarquee",
    vis: 8,
    interTime: 30,
    trigger: "click"
  });

  // 友情链接切换
  $("#news-box-c-2").slide({});

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

