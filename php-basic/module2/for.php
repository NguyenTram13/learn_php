<?php
// Hiển thị số chẵn số lẻ từ 1->100
$start=1;
$end=100;
$even=null;
$odd=null;
$evenCount=0;
$oddCount=0;
for ($i=$start; $i<=$end; $i++){
    if($i % 2 == 0){
        $even.=$i.' ';
        $evenCount++;
    }else{
        $odd.=$i.' ';
        $oddCount++;

    }
    
}
echo "Số chẵn: ".$even."<br/>";
echo "Có ".$evenCount." số chẵn <br/>";
echo "Số lẻ: ".$odd."<br/>";
echo "Có ".$oddCount." số lẻ <br/>";

// tính giai thừa
$n=10;
$gt=1;
if($n>0){
    for($i=1; $i<=$n; $i++){
        $gt*=$i;
    }
    echo $n."! = ".$gt."<br/>";
}
else{
    echo $n." không hợp lệ <br/>";
}

//kiểm tra số nguyên tố
$check=true;

if($n>1){
    for($i=2; $i<=$n/2; $i++){
        if($n%$i==0){
            $check=false;
        }
    }
}
else{
    $check=true;
    // echo $n." không là số nguyên tố <br/>";
}
if($check==true){
    echo $n." là số nguyên tố<br/>";
}else{
    echo $n." không là số nguyên tố<br/>";

}

//bàn cờ vua





?>

