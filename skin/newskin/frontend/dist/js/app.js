function SetHome(e,i){try{e.style.behavior="url(#default#homepage)",e.setHomePage(i)}catch(t){if(window.netscape){try{netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect")}catch(t){alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将 [signed.applets.codebase_principal_support]的值设置为'true',双击即可。")}var a=Components.classes["@mozilla.org/preferences-service;1"].getService(Components.interfaces.nsIPrefBranch);a.setCharPref("browser.startup.homepage",i)}else alert("您的浏览器不支持，请按照下面步骤操作：1.打开浏览器设置。2.点击设置网页。3.输入："+i+"点击确定。")}}function shoucang(e,i){try{window.external.addFavorite(i,e)}catch(t){try{window.sidebar.addPanel(e,i,"")}catch(t){alert("加入收藏失败，请使用Ctrl+D进行添加")}}}function uaredirect(e){try{if(null!=document.getElementById("bdmark"))return;var i=!1;if(arguments[1]){var t=window.location.host,a=window.location.href;1==isSubdomain(arguments[1],t)?(e=e+"/#m/"+a,i=!0):2==isSubdomain(arguments[1],t)?(e=e+"/#m/"+a,i=!0):(e=a,i=!1)}else i=!0;if(i){var n=window.location.hash;n.match("fromapp")||navigator.userAgent.match(/(iPhone|iPod|Android|ios)/i)&&location.replace(e)}}catch(s){}}function isSubdomain(e,i){if(this.getdomain=function(e){var i=e.indexOf("://");if(i>0)var t=e.substr(i+3);else var t=e;var a=/^www\./;return a.test(t)&&(t=t.substr(4)),t},e==i)return 1;var e=this.getdomain(e),t=this.getdomain(i);if(e==t)return 1;e=e.replace(".","\\.");var a=new RegExp("\\."+e+"$");return t.match(a)?2:0}$(document).ready(function(){$("header").vegas({timer:!1,transition:"random",slides:[{src:"/skin/newskin/frontend/dist/images/h01.jpg"},{src:"/skin/newskin/frontend/dist/images/h02.jpg"},{src:"/skin/newskin/frontend/dist/images/h03.jpg"}]}),$("#nav").slide({type:"menu",titCell:".nli",targetCell:".sub",effect:"slideDown",delayTime:300,triggerTime:0,returnDefault:!0}),$("#latest-news").slide({mainCell:"ul",autoPlay:!0,effect:"leftMarquee",interTime:50,trigger:"click"}),$("#jiaodianxinwen").owlCarousel({responsiveClass:!0,autoplay:!0,autoplayTimeout:3e3,autoplayHoverPause:!0,responsive:{0:{items:1,nav:!1},600:{items:1,nav:!1},1e3:{items:1,nav:!1}}}),$("#zhuantizhuanlan").owlCarousel({loop:!0,margin:15,autoplay:!0,autoplayTimeout:3e3,autoplayHoverPause:!0,items:4,nav:!0,navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]}),jQuery(".box-a").slide({}),$(".news-images").slide({mainCell:".bd ul",autoPlay:!0,effect:"leftMarquee",vis:8,interTime:30,trigger:"click"}),$("#news-box-c-2").slide({}),$("#leftsead a").hover(function(){"youhui"==$(this).prop("className")?$(this).children("img.hides").show():($(this).children("img.hides").show(),$(this).children("img.shows").hide(),$(this).children("img.hides").animate({marginRight:"0px"},"slow"))},function(){"youhui"==$(this).prop("className")?$(this).children("img.hides").hide("slow"):$(this).children("img.hides").animate({marginRight:"-143px"},"slow",function(){$(this).hide(),$(this).next("img.shows").show()})}),$("#top_btn").click(function(){"off"!=scroll&&$("html,body").animate({scrollTop:0},600)})});