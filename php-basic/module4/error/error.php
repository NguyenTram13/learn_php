<?php   
// try -catch


    echo 'Học lập trình php<br/>';
    $age = 30;
    try{
        //tất cả code thực thi
       if($age<35){
        throw new Exception("Tuổi phải lớn hơn 35");
       }
    }
    catch(Error $exception){
        echo $exception-> getMessage().'<br/>';
        echo 'File: '.$exception->getFile().' - Line: '.$exception->getLine();
        echo '<br/>';
    }
    catch(Exception $exception){
        echo $exception->getMessage().'<br/>';
    }
    echo 'runing <br/>';
