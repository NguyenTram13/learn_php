<?php
  
  namespace App\Databases;
use PDO;
  class DB{
    protected static $instance;
    public static function geinstancetInstanse(){
        if(empty(self::$instance)){
            self::$instance = new PDO('mysql:host=localhost; dbname=gate', 'root','');
        }
        return self::$instance; 
    }
    
  }