<?php
require '../vendor/autoload.php';

use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\MySQL;

include "../_config.php";

$dt = new Datatables(new MySQL($config));

$dt->query("Select id,title,sn2,zhusuo,zhuguandanwei,faren,pizhuntime,leibie from dxshzzglj_ecms_xinxigongkai where classid=46
order by id ASC");

/*$dt->edit('leibie', function ($data)
{
  return $data['leibie'] == 0 ? '社会团体' : '民非';
});*/
echo $dt->generate();
