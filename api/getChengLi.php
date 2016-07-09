<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/7/9
 * Time: 12:19
 * Desc:
 */

require('../e/class/connect.php');
require('../e/class/db_sql.php');
$link=db_connect();
$empire=new mysqlquery();

$sql=$empire->query('select * from {$dbtbpre}ecms_xinxigongkai');
var_dump($empire->fetch($sql));

while($r=$empire->fetch($sql)){
  echo $r['title'];
}

db_close();
$empire=null;
