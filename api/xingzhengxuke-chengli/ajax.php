<?php
require '../vendor/autoload.php';

use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\MySQL;

include "../_config.php";

$dt = new Datatables(new MySQL($config));

$dt->query("Select id,title,sn2,zhusuo,zhuguandanwei,faren,pizhuntime,leibie from dxshzzglj_ecms_xinxigongkai where classid=45
order by id ASC");

/*$dt->edit('newstime', function ($data)
{
  return date('Y-m-d', $data['newstime']);
});*/
echo $dt->generate();
