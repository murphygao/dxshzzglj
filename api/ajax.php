<?php
require 'vendor/autoload.php';

use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\MySQL;

include "_config.php";

$dt = new Datatables(new MySQL($config));

$dt->query("Select * from dxshzzglj_ecms_xinxigongkai;");

echo $dt->generate();
