<?php
require 'vendor/autoload.php';

use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\MySQL;

include "_config.php";

$dt = new Datatables(new MySQL($config));

$r=$dt->query("Select id,title,sn,zhusuo,zhuguandanwei,faren,newstime from dxshzzglj_ecms_xinxigongkai");

echo $dt->generate();
