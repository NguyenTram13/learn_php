<?php

namespace math\cricle;
use math\constant;
use DateTime;

require_once __DIR__.'/../const.php';

function strlen($str){
    return \strlen(str)-1;
}

class circle{ 

    public function getAreaCircle($radius){
        return constant::pi*$radius*$radius;
    }

    public function getTimeStamp(){
        $dataTime = new DateTime();
        return $dataTime->getTimeStamp();
    }
}