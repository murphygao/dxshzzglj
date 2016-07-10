<?php
require '../vendor/autoload.php';

use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\MySQL;

include "../_config.php";

$dt = new Datatables(new MySQL($config));

$dt->query("Select id,title,biangengleixin,biangengqian,biangenghou,newstime from dxshzzglj_ecms_xinxigongkai2 order by newstime
DESC");


$dt->edit('newstime', function ($data)
{
  return date('Y-m-d', $data['newstime']);
});

echo $dt->generate();
