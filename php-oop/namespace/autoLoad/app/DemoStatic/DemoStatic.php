<?php

namespace App\DemoStatic;
class DemoStatic{
    // public static $name ='Tram';
    // public static $job;


    // public  function __construct($job){
    //    self::setJob($job) ;
    // }

    // public  function getJob(){
    //     return self::$job;
    // }

    // public static function setJob($job){
    //     self::$job = $job;
    //  }
    
    public $count= 0;
    public static $countStatic =0;
    public function __construct(){
        $this->count++;
        self::$countStatic++;
    }

    public function getCountStatic(){
        return self::$countStatic;
    }

}