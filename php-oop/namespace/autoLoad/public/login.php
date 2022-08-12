<?php

// require_once ('app/http/controller/homeController.php');
// require_once ('autoload.php');
require_once ('../vendor/autoload.php');
require_once(__DIR__.'/../config/constant.php');

$product = new App\Product();
$slack= new App\Mail\Slack();
$homeContronller = new App\http\controller\homeController($product,$slack);

echo  $homeContronller->index().'<br>';
// Route::get('/login', 'LoginController@login');
// echo  $homeContronller->UploadImages();

// $baseModel =new App\BaseModel();

// //truy cập  phương thức từ bên ngoài class
// echo $baseModel->create();

// //truy cập phương thức bên trong class đó
// echo $baseModel->createFormBaseModel();

// $product = new App\Product();
// $product->createProduct();


// static

// echo App\DemoStatic\DemoStatic::$name.'<br>';
// echo App\DemoStatic\DemoStatic::getJob();

// $demo = new \App\DemoStatic\DemoStatic();
// echo  $demo->getJob();

// $demo1 = new App\DemoStatic\DemoStatic();
// echo  '<h2>'.$demo1->count.'</h2>';

// $demo2= new App\DemoStatic\DemoStatic();
// echo  '<h3>'.$demo2->count.'</h3>';

// $demo3 = new App\DemoStatic\DemoStatic();
// echo  '<h4>'.$demo3->count.'</h4>';

