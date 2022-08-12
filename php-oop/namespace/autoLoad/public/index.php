<?php


require_once ('../vendor/autoload.php');
require_once(__DIR__.'/../config/constant.php');

$product = new App\Product();
$slack= new App\Mail\Slack();
$homeContronller = new App\http\controller\homeController($product,$slack);
echo  $homeContronller->index().'<br>';




