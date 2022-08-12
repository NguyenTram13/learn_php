<?php
//tìm thông tin khách hàng nhỏ tuổi nhất
$customers=[
    [
        'name'=> 'Trâm',
        'age'=>'21',
    ],
    [
        'name'=> 'Min',
        'age'=>'22',
    ],
    [
        'name'=> 'Us',
        'age'=>'13',
        
    ],
    [
        'name'=> 'Anh',
        'age'=>'18',
       
    ],

];
if(!empty($demoArr)){

   
    $min=$customers[0];
    foreach($demoArr as $key=>$item){
       
        if($item['age']<$min['age']){
            $min=$item;
        }
    }
  
}
echo $min;