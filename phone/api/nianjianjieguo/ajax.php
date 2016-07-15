<?php
require '../vendor/autoload.php';

use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\MySQL;

include "../_config.php";

$dt = new Datatables(new MySQL($config));

$dt->query("Select id,title,sn2,zhuguandanwei,pici,jieguo,leibie from dxshzzglj_ecms_xinxigongkai3 where classid=50
order by newstime DESC");


echo $dt->generate();
