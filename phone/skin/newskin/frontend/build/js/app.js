/**
 * Created by buuug7 on 2016/3/24.
 */


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

  $("#latest-news").slide({
    mainCell: "ul",
    autoPlay: true,
    effect: "leftMarquee",
    interTime: 50,
    trigger: "click"
  });

  // 幻灯片切换
  $("#jiaodianxinwen").owlCarousel({
    //loop: true,
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



  // sidebar
  $("#leftsead a").hover(function(){
    if($(this).prop("className")=="youhui"){
      $(this).children("img.hides").show();
    }else{
      $(this).children("img.hides").show();
      $(this).children("img.shows").hide();
      $(this).children("img.hides").animate({marginRight:'0px'},'slow');
    }
  },function(){
    if($(this).prop("className")=="youhui"){
      $(this).children("img.hides").hide('slow');
    }else{
      $(this).children("img.hides").animate({marginRight:'-143px'},'slow',function(){$(this).hide();$(this).next("img.shows").show();});
    }
  });
  $("#top_btn").click(function(){if(scroll=="off") return;$("html,body").animate({scrollTop: 0}, 600);});



});

