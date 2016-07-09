<?php
require 'vendor/autoload.php';

use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\MySQL;

include "_config.php";

$dt = new Datatables(new MySQL($config));

$dt->query("Select id,title,sn,zhusuo,zhuguandanwei,faren,newstime from dxshzzglj_ecms_xinxigongkai");

$dt->edit('newstime', function($data){

  return date('Y-m-d',$data['newstime']);
  // return an edit link.
  //return "<a href='user.php?id=" . $data['id'] . "'>edit</a>";
});
echo $dt->generate();
