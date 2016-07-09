<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
  <title>DataTables example</title>
  <link rel="stylesheet" href="/node_modules/datatables.net-dt/css/jquery.dataTables.css"/>
  <script type="text/javascript" language="javascript" src="/node_modules/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" language="javascript"
          src="/node_modules/datatables.net/js/jquery.dataTables.js"></script>
  <script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
      $('#example').dataTable({
        "serverSide": true,
        "ajax": "ajax.php",
        "lengthMenu": [[2, 4, 8, -1], [2, 4, 8, "All"]],
        "pageLength": 4,
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
        }

        initComplete: function () {
          var api = this.api();
          api.columns().indexes().flatten().each( function ( i ) {
            var column = api.column( i );
            var select = $('<select><option value=""></option></select>')
              .appendTo( $(column.footer()).empty() )
              .on( 'change', function () {
                var val = $.fn.dataTable.util.escapeRegex(
                  $(this).val()
                );
                column
                  .search( val ? '^'+val+'$' : '', true, false )
                  .draw();
              } );
            column.data().unique().sort().each( function ( d, j ) {
              select.append( '<option value="'+d+'">'+d+'</option>' )
            } );
          } );
        }
      });
    });
  </script>
</head>
<body id="dt_example">
<div id="container">
  <h1>Datatables - A simple example</h1>
  <table border="0" cellpadding="4" cellspacing="0" class="display" id="example">
    <thead>
    <tr>
      <th width="10%">序号</th>
      <th width="15%">组织机构名称</th>
      <th width="15%">登记证号</th>
      <th width="15%">住所</th>
      <th width="15%">业务主管单位</th>
      <th width="15%">法定代表人</th>
      <th width="15%">批准时间</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td>loading...</td>
    </tr>
    </tbody>
  </table>
</div>
</body>
</html>
