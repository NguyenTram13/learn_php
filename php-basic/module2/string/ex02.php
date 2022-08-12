<?php
//Các hàm xử lý chuỗi

$str = 'Trung tâm đào tạo lập trình unicode';


// 1. thêm ký tự eacape (/) vào phía trc ký tự mong muốn
$str = addcslashes($str, "ul");
echo $str.'<br/>';

//loại bỏ eacape
$str= stripcslashes($str);
echo $str.'<br/>';

// chuyển chuỗi thành mảng
$str= 'Trung tâm Unicode';
$arr= explode(' ', $str);
print_r($arr);
echo '<br/>';

//mảng => chuỗi
$str=implode(' - ', $arr);
echo $str;
echo '<br/>';

// lấy độ dài chuỗi
$length= strlen($str);
echo $length;
echo '<br/>';

//Lấy số chữ trong chuỗi



// lập chuỗi số lần xác định
// $str= str_repeat($str, 10);
// echo $str;
// echo '<br/>';

//tìm kiếm và thay thế
$str= 'c:\xampp\htdocs\hocphp';
$str = str_replace('Unicode', '', $str);
echo $str;
echo '<br/>';
// mã hóa 1 chiều(32 ký tự)
$str= '12345';
$str= md5($str);
echo $str;
echo '<br/>';

// mã hóa 1 chiều(40 ký tự)
$str= '12345';
$str= sha1($str);
echo $str;
echo '<br/>';

//  chuyển chuỗi html thành dạng thực thể
$str = '<p>Đào tạo Php</p>';
$str = htmlentities($str);
echo $str;
echo '<br/>';

//  chuyển từ dạng thực thể sang chuỗi html
$str = '<p>Đào tạo Php</p>';
$str = html_entity_decode($str);
echo $str;
echo '<br/>';

// loại bỏ thẻ html
$str ='<p>Trung tâm đào tạo<a href="">Lập trình <strongg>Unicode</strong></a></p>';
$str = strip_tags($str, '<a><strong>');
echo $str;
echo '<br/>';

//lấy chuỗi con từ chuỗi cha
$str= 'Trung tâm đào tạo unicode';
$subStr= substr($str, 6, 9);
echo $subStr;
echo '<br/>';