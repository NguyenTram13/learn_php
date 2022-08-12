<?php
//1 viết chương trình lấy username của 1 email
$email='tram.web@gmail.com';

// $endEmail= strstr($email, '@');
// echo $endEmail.'<br/>';
// $username= str_replace($endEmail, '', $email);
// echo $username.'<br/>';

$username= strstr($email, '@', true);
echo $username.'<br/>';



//2. viết chương trình lấy 5 ký tự cuối chuỗi
$str='Học lập học trình php';
$endStr = mb_substr($str, -5, null, 'UTF-8');
echo $endStr.'<br/>';

//3.xóa chữ đầu tiên trong chuỗi
// $positionSpace= mb_strpos($str,' ',null,'UTF-8') ;
// echo $positionSpace.'<br/>';
// $firstWord= mb_substr($str,0, $positionSpace+1, 'UTF-8');
// $str= str_replace($firstWord, '', $str);
// echo $str.'<br/>';


// 4. đảo ngược chữ đầu và chữ cuối

//lấy chữ đầu tiên
$positionSpaceFirst= mb_strpos($str,' ',null,'UTF-8') ;
$firstWord= mb_substr($str,0, $positionSpaceFirst, 'UTF-8');
//lấy chữ cuối cùng
$positionSpaceLast= mb_strripos($str, ' ', null, 'UTF-8');
$leftLength = mb_strLen($str, 'UTF-8')-$positionSpaceLast;
$endword= mb_substr($str, $positionSpaceLast+1, $leftLength,'UTF-8');
// var_dump($endword);
//chèn và thay thế
//lấy nội dung giữa chuỗi
$middelWord = mb_substr($str, $positionSpaceFirst, $positionSpaceLast-$positionSpaceFirst+1, 'UTF-8');
// var_dump($middelWord);
$str=$endword.$middelWord.$firstWord;
echo $str.'<br/>';

//5 nhập full name in họ&tên đệm , tên

$fullname= 'Nguyễn Thị Ngọc Trâm';
$positionSpaceLast= mb_strripos($fullname, ' ', null, 'UTF-8');
$leftLength= mb_strlen($fullname, 'UTF-8')-($positionSpaceLast+1);
$firstName= mb_substr($fullname,0, $positionSpaceLast, 'UTF-8');

$lastName= mb_substr($fullname, $positionSpaceLast+1, $leftLength, 'UTF-8');
echo 'First name: '.$firstName.'<br/>';
echo 'Last name: '.$lastName.'<br/>';
// echo $fullName?

// In ra 50 chữ đầu tiên trong chuỗi
$content='Trong tiết trời âm u và oi bức, 456 thí sinh tại điểm thi trường THCS Ba Đình, Hà Nội có mặt từ đầu giờ chiều 6/7 để làm thủ tục thi.';
$content.='Các em lần lượt xếp hàng đo thân nhiệt, rửa tay khử khuẩn trước khi vào phòng thi. ';
$limitWord =50;
$contentLength= mb_strlen($content, 'UTF-8');
echo $contentLength;
$description= null;
$count= 0;
for($i=0; $i<$contentLength; $i++){
    $description.=mb_substr($content, $i, 1, 'UTF-8');

    if(mb_substr($content, $i, 1, 'UTF-8')==' '){

        $count++;
        if($count>=$limitWord){
            break;
        }
    }
}
echo $description.'<br/>';

//7 kiểm tra độ mạnh của mật khẩu
$password= 'Ngoctram!123@';
$number ='1234567890';
$symbol='!@#$%^&*()-+';
$checkLength = false;
$checkNumber =false;
$checkLower= false;
$checkUpper=false;
$checkSym = false;

if(mb_strlen($password, 'UTF-8')>=6){
    $checkLength=true;
}
for($i=0; $i< mb_strlen($password, 'UTF-8'); $i++){
    $char = mb_substr($password,  $i, null, 'UTF-8');
    if(mb_strpos($number, $char, null, 'UTF-8')!=false){
        $checkNumber= true;

    }
    if($char>='a' && $char <='z'){
        $checkLower= true;

    }
    if($char>='A' && $char <='Z'){
        $checkUpper= true;

    }
    if(mb_strpos($symbol, $char, null, 'UTF-8')!=false){
        $checkSym= true;
        echo $checkSym.'<br/>';
        
    }
   
}
if($checkLength && $checkNumber  && $checkLower && $checkSym ){
    echo 'Mật khẩu mạnh';
}
else{
    echo 'Mật khẩu yếu';
}