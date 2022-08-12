<?php
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

$keyWord='trâm';
$result=[];
if(!empty($customers)){

    foreach($customers as $item){
        $customersName=$item['name'];
        $customersName= mb_strtolower($customersName, 'UTF-8');
        $checkSearch= mb_strpos($customersName, $keyWord, null, 'UTF-8');
        if($checkSearch!==false){
            $result=$item; 
            break;
        }
    }
}

echo '<pre>';
print_r($result);
echo '</pre>';
