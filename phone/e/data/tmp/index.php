<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><!--这是电脑站模板-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>定西社会组织管理局</title>
    <meta name="keywords" content="定西社会组织管理局"/>
    <meta name="description" content="定西社会组织管理局"/>

    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

    <!--font-awesome-->
    <link rel="stylesheet" href="/node_modules/font-awesome/css/font-awesome.min.css">

    <!--animate.css-->
    <link rel="stylesheet" href="/node_modules/animate.css/animate.min.css">

    <!-- owl carousel -->
    <link rel="stylesheet" href="/skin/newskin/frontend/dist/plugins/owl.carousel.2.0.0/assets/owl.carousel.css">

    <link rel="stylesheet" href="/node_modules/vegas/dist/vegas.min.css">

    <!--app.css-->
    <link rel="stylesheet" href="/skin/newskin/frontend/dist/css/default/app.css">

    <!--跳转手机站-->
    <SCRIPT LANGUAGE="JavaScript">
        function mobile_device_detect(url) {
            var thisOS = navigator.platform;
            var os = new Array("iPhone", "iPod", "iPad", "android", "Nokia", "SymbianOS", "Symbian", "Windows Phone", "Phone", "Linux armv71", "MAUI", "UNTRUSTED/1.0", "Windows CE", "BlackBerry", "IEMobile");
            for (var i = 0; i < os.length; i++) {
                if (thisOS.match(os[i])) {
                    window.location = url;
                }

            }
            //因为相当部分的手机系统不知道信息,这里是做临时性特殊辨认
            if (navigator.platform.indexOf('iPad') != -1) {
                window.location = url;
            }
            //做这一部分是因为Android手机的内核也是Linux
            //但是navigator.platform显示信息不尽相同情况繁多,因此从浏览器下手，即用navigator.appVersion信息做判断
            var check = navigator.appVersion;
            if (check.match(/linux/i)) {
                //X11是UC浏览器的平台 ，如果有其他特殊浏览器也可以附加上条件
                if (check.match(/mobile/i) || check.match(/X11/i)) {
                    window.location = url;
                }
            }
            //类in_array函数
            Array.prototype.in_array = function (e) {
                for (i = 0; i < this.length; i++) {
                    if (this[i] == e)
                        return true;
                }
                return false;
            }
        }
        mobile_device_detect("http://rdw.jq2.com/");
    </SCRIPT>

</head>

<body>
<header>
  <div class="main">
    <div class="left">
      <h1>
        定西社会组织管理局
      </h1>

      <p>
        DINGXISHI SHEHUIZUZHI GUANLIJU
      </p>
    </div>

    <div class="right">
      <div class="item">
        <a href="#" class="active">综合</a><a href="#">办事事项</a><a href="#">政策解读</a><a href="#">下载</a>
      </div>
      <div class="search">
        <form action="">
          <input type="search" name="search" placeholder="输入关键字进行搜索">
          <input type="submit" value="搜索">
        </form>
      </div>
    </div>
  </div>
</header>
<!--导航-->
<nav>
  <ul class="clearfix" id="nav">
    <li class="nli on">
      <h3><a href="#">首页</a></h3>
    </li>
    <li class="nli">
      <h3><a href="#">新闻中心</a></h3>
      <ul class="sub">
        <li><a href="#">政务新闻</a></li>
        <li><a href="#">社会关注</a></li>
        <li><a href="#">社会组织动态</a></li>
        <li><a href="#">理论观点</a></li>
        <li><a href="#">社会组织风采</a></li>
      </ul>
    </li>
    <li class="nli">
      <h3><a href="#">信息公开</a></h3>
      <ul class="sub">
        <li><a href="#">机构设置及职能</a></li>
        <li><a href="#">行政许可</a></li>
        <li><a href="#">查出公告</a></li>
        <li><a href="#">评估结果</a></li>
        <li><a href="#">年检结果</a></li>

      </ul>
    </li>
    <li class="nli">
      <h3><a href="#">区县动态</a></h3>
    </li>
    <li class="nli">
      <h3><a href="#">政策法规</a></h3>
    </li>
    <li class="nli">
      <h3><a href="#">政策解读</a></h3>
    </li>
    <li class="nli">
      <h3><a href="#">网上办事大厅</a></h3>
    </li>
    <li class="nli">
      <h3><a href="#">问卷调查</a></h3>
    </li>
  </ul>
</nav>


<footer>
    <div class="container">
        <ul class="list-unstyled links">
            <li><a href="/">首页</a></li>
            <li><a href="#">关于我们</a></li>
            <li><a href="#">联系我们</a></li>
            <li><a href="#">网站声明</a></li>
        </ul>
        <p>定西市社会组织管理局</p>

        <p>ICP备案序号 : 陇ICP备88888888号 陇公安网备案 : 88888888</p>
    </div>
</footer>
<script src="/node_modules/jquery/dist/jquery.min.js"></script>
<script src="/skin/newskin/frontend/dist/plugins/owl.carousel.2.0.0/owl.carousel.min.js"></script>
<script src="/skin/newskin/frontend/dist/plugins/jquery.SuperSlider/jquery.SuperSlide.2.1.1.js"></script>
<script src="/node_modules/vegas/dist/vegas.min.js"></script>
<script src="/skin/newskin/frontend/dist/js/app.js"></script>
</body>
</html>