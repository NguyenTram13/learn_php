<?php
require ('math/code/circle.php');
$cricle = new math\cricle\circle();
echo 'Circle: '.$cricle->getAreaCircle(10).'<br/>';
$time = new DateTime();
echo 'Time: '.$time->getTimeStamp().'<br/>';
echo strlen('tram').'<br/>';