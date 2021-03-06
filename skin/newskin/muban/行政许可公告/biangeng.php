<!--这是电脑站模板-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>[!--pagetitle--]</title>
  <meta name="keywords" content="[!--pagekey--]"/>
  <meta name="description" content="[!--pagedes--]"/>

  <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

  <!--font-awesome-->
  <link rel="stylesheet" href="[!--news.url--]node_modules/font-awesome/css/font-awesome.min.css">

  <!--animate.css-->
  <link rel="stylesheet" href="[!--news.url--]node_modules/animate.css/animate.min.css">

  <!-- owl carousel -->
  <link rel="stylesheet" href="[!--news.url--]skin/newskin/frontend/dist/plugins/owl.carousel.2.0.0/assets/owl.carousel.css">

  <!--vegas.css-->
  <link rel="stylesheet" href="[!--news.url--]node_modules/vegas/dist/vegas.min.css">

  <!--datatables-->
  <!--  <link rel="stylesheet" href="/node_modules/datatables.net-dt/css/jquery.dataTables.css"/>-->

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap4.min.css">

  <!--app.css-->
  <link rel="stylesheet" href="[!--news.url--]skin/newskin/frontend/dist/css/default/app.css">

  <!--[if lt IE 9]>
  <script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
  <![endif]-->

  <!--goto mobile site-->
  <!--<script src="http://siteapp.baidu.com/static/webappservice/uaredirect.js"></script>-->
  <!--<script type="text/javascript">uaredirect("/");</script>-->

</head>

<body>
[!--temp.dxshzzglj-header--]
[!--temp.dxshzzglj-nav--]

<!--breadcrumb-->
<div class="wrap margin-top-15">
  <ol class="breadcrumb">
    <li><a href="/">首页</a></li>
    <li class="active">行政许可公告</li>
  </ol>
</div>

<div class="wrap margin-top-15">
  <div class="second-list clearfix">
    <div class="list-right" style="width: 1000px;">
      <div class="section-a">
        <div class="body" style="font-size: 15px;">
          <span>行政许可 : </span>
          <a href="[!--news.url--]html/xingzhengxuke-chengli.php">登记成立</a>
          <a href="[!--news.url--]html/xingzhengxuke-zhuxiao.php">注销登记</a>
          <a href="[!--news.url--]html/xingzhengxuke-biangeng.php">变更登记</a>
        </div>

        <div class="body" style="font-size: 15px;margin-top:15px;">
          <span>年检结果查询 : </span>
          <a href="[!--news.url--]html/nianjianjieguo.php">年检结果</a>
        </div>
      </div>

      <div class="section-a">
        <div class="list-right-box">
          <div style="padding-bottom: 15px;">
            <span style="font-size: 16.8px;padding: 0 0 10px;color: #2399ff;">变更登记</span>
          </div>
          <div id="container">
            <table border="0" cellpadding="4" cellspacing="0" class="table table-striped table-bordered" id="example">
              <thead>
              <tr>
                <th>序号</th>
                <th>组织名称</th>
                <th>变更类型</th>
                <th>变更前</th>
                <th>变更后</th>
                <th>批准时间</th>
                <th>类别</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>loading...</td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

[!--temp.dxshzzglj-footer--]

<!--[if (!IE)|(gt IE 8)]><!-->
<script src="[!--news.url--]node_modules/jquery/dist/jquery.min.js"></script>
<!--<![endif]-->

<!--[if lte IE 8]>
<script src="//cdn.bootcss.com/jquery/1.9.1/jquery.min.js"></script>
<![endif]-->
<script src="[!--news.url--]skin/newskin/frontend/dist/plugins/owl.carousel.2.0.0/owl.carousel.min.js"></script>
<script src="[!--news.url--]skin/newskin/frontend/dist/plugins/jquery.SuperSlider/jquery.SuperSlide.2.1.1.js"></script>
<script src="[!--news.url--]node_modules/vegas/dist/vegas.min.js"></script>
<script src="[!--news.url--]node_modules/datatables.net/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap4.min.js"></script>
<script src="[!--news.url--]skin/newskin/frontend/dist/js/app.js"></script>

<script type="text/javascript" charset="utf-8">
  $(document).ready(function () {
    var oTable=$('#example').DataTable({
      "serverSide": true,
      "ajax": "/api/xingzhengxuke-biangeng/ajax.php",
      "lengthMenu": [[2, 4, 8, -1], [2, 4, 8, "All"]],
      "pageLength": 8,
      "bLengthChange" : false,
      "columnDefs": [
        {
          "targets": [ 6 ],
          "visible": false,
        },
      ],
      "language": {
        "processing": "处理中...",
        "lengthMenu": "显示 _MENU_ 项结果",
        "zeroRecords": "没有匹配结果",
        "info": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
        "infoEmpty": "显示第 0 至 0 项结果，共 0 项",
        "infoFiltered": "(由 _MAX_ 项结果过滤)",
        "infoPostFix": "",
        "search": "搜索:",
        "searchPlaceholder": "搜索...",
        "url": "",
        "emptyTable": "表中数据为空",
        "loadingRecords": "载入中...",
        "infoThousands": ",",
        "paginate": {
          "first": "首页",
          "previous": "上页",
          "next": "下页",
          "last": "末页"
        },
        "aria": {
          paginate: {
            first: '首页',
            previous: '上页',
            next: '下页',
            last: '末页'
          },
          "sortAscending": ": 以升序排列此列",
          "sortDescending": ": 以降序排列此列"
        },
        "decimal": "-",
        "thousands": "."
      },
    });

    var be=$('#container .row:first-child').children(':first');
    var bs=$('<select/>',{
      id:'mySelect',
      class:'form-control input-sm'
    });
    bs.append('<option value="">请选择类别</option>');
    bs.append('<option value="0">社会团体</option>');
    bs.append('<option value="1">民办非企业单位</option>');
    bs.append('<option value="2">基金会</option>');
    bs.appendTo(be);


    $('#mySelect').on('change',function(){
      var selectedValue = $(this).val();
      oTable.column(6).search(selectedValue,0,0).draw();
    });


  });
</script>
</body>
</html>
