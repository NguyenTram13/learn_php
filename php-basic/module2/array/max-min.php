<?php
$demoArr= [
    'a'=>1,
    'b'=>5,
    'c'=>8,
    'f'=>9,
    'h'=>5,
    'd'=>44,
    'j'=>3,];
echo '<pre>';
print_r($demoArr);
echo '</pre>';

if(!empty($demoArr)){

    $firstElement=[];
    //tìm phần tử đầu tiên trong mảng
    foreach($demoArr as $key=> $item){
        $firstElement= ['key'=>$key, 'value'=>$item];
        break;
    }
    $max=[
        'key'=>$firstElement['key'],
        'value'=> $firstElement['value'],
    ];
    $min=[
        'key'=>$firstElement['key'],
        'value'=> $firstElement['value'],
    ];
    foreach($demoArr as $key=>$item){
        if($item>$max['value']){
            $max['key']=$key;
            $max['value']=$item;
        }
        if($item<$min['value']){
            $min['key']=$key;
            $min['value']=$item;
        }
    }
  
}
echo 'Giá trị lớn nhất: '.$max['value'].' Vị trí '.$max['key'].'<br/>';
echo 'Giá trị nhỏ nhất: '.$min['value'].' Vị trí '.$min['key'].'<br/>';
