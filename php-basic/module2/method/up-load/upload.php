<?php
   if ($_SERVER['REQUEST_METHOD']=='POST'){
    echo '<pre>';
    print_r($_FILES['file_upload']);
    echo '</pre>';
    die();

    if(!empty($_FILES['file_upload'])){
        $fileName = $_FILES['file_upload']['name'];

        $fileNameArr= explode('.', trim($fileName));

        $fileExt=end($fileNameArr[1]);
        $fileBefore= shal(uniqid());

        $fileName = $fileBefore.'.'.$fileExt;
        $allLowerArr =['mp4', 'png', 'gif', 'jpg'];

        if(in_array($fileExt, $allLowerArr)){
            $size = $_FILES(['file_upload']['size']);
            echo $size;
            if($size <=  5000000){
                $upload = move_uploaded_file($_FILES['file_upload']['tmp_name'], '/uploads/'.$fileName);
                if($upload){
                    echo 'Upload thành công';
                }
                else{
                    echo'Upload không thành công';
                }
            }else{
                echo 'Dung lượng vượt quá cho phép';
            }
        }
    }
   }
    

?>