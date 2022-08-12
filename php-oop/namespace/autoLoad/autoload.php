<?php
spl_autoload_register(function ($class) {
$namespace = "App\\";
$path = "app";
$class = str_replace('App\\', '',$class);//  /http/controller/homeController
$file = __DIR__.DIRECTORY_SEPARATOR;//namespace/autoLoad=>dir + / + app 
$file = $file.DIRECTORY_SEPARATOR.str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';//namespace/autoLoad=>dir + / + app + / + /http/controller/homeController
if(file_exists($file)){
    include($file);
}
// echo $file;
});