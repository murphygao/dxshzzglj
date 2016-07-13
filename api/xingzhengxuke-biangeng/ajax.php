<?php
/*
 * 变更类型:
 * 0==法定代表人
 * 1==住所
 * 2==名称
 * 3==注册资金
 * */
require '../vendor/autoload.php';

use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\MySQL;

include "../_config.php";

$dt = new Datatables(new MySQL($config));

$dt->query("Select id,title,biangengleixin,biangengqian,biangenghou,newstime,leibie from dxshzzglj_ecms_xinxigongkai2 order by
newstime
DESC");


$dt->edit('newstime', function ($data)
{
  return date('Y-m-d', $data['newstime']);
});

$dt->edit('biangengleixin', function ($data)
{
  $flag = $data['biangengleixin'];
  $output = '';
  switch ($flag)
  {
    case 0:$output = '法定代表人';break;
    case 1: $output='住所';break;
    case 2:$output='名称';break;
    default:$output='未填写';
  }
  return $output;
});

echo $dt->generate();
