<?php
require 'vendor/autoload.php';

use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\MySQL;

include "_config.php";

$dt = new Datatables(new MySQL($config));

$dt->query("Select id,title,sn,zhusuo,zhuguandanwei,faren,newstime,leibie from dxshzzglj_ecms_xinxigongkai");

$dt->edit('newstime', function ($data)
{
  return date('Y-m-d', $data['newstime']);
});

/*$dt->edit('leibie', function ($data)
{
  return $data['leibie'] == 0 ? '社会团体' : '民非';
});*/
echo $dt->generate();
