<?php
require 'vendor/autoload.php';

use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\MySQL;

include "_config.php";

$dt = new Datatables(new MySQL($config));

$r=$dt->query("Select * from dxshzzglj_ecms_xinxigongkai;");
var_dump($r);
die();
echo $dt->generate();
