<?php
    const _HOST = 'localhost';
    const _USER = 'root';
    const _PASS = '';
    const _DB = 'phponine';
    Const _DRIVER = 'mysql';

 try{
    if(class_exists('PDO')){
        $dsn = _DRIVER.' :dbname = '._DB.' ;host= '._HOST;
        $conn = new PDO($dsn, _USER, _PASS);
        var_dump($conn);
       }
 }
 catch(Exception $exception){
    echo $exception->getMessage().'<br/>';
    die();
}
?>