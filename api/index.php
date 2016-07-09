<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>DataTables example</title>
    <link rel="stylesheet" href="/node_modules/datatables.net-dt/css/jquery.dataTables.css"/>
    <script type="text/javascript" language="javascript" src="/node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" language="javascript" src="/node_modules/datatables.net/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('#example').dataTable( {
                "serverSide": true,
                "ajax" : "ajax.php"
            } );
        } );
    </script>
</head>
<body id="dt_example">
<div id="container">
    <h1>Datatables - A simple example</h1>
    <table border="0" cellpadding="4" cellspacing="0" class="display" id="example">
        <thead>
        <tr>
            <th width="8%">ID</th>
            <th width="32%">Title</th>
            <th width="60%">SN</th>
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
