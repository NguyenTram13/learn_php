<?php
 function insert_binhluan($noidung, $iduser, $idpro, $ngaybl){
    $sql = "insert into binhluan (noidung,iduser,idpro,ngaybl) values('$noidung', '$iduser', '$idpro', '$ngaybl')";
    pdo_execute($sql);
}
function delete_binhluan($id){
   
        $sql = "delete from binhluan where id =".$id;
        pdo_execute($sql);  
}
function loadall_binhluan($idpro){
    $sql = "select * from binhluan where 1";
    if($idpro>0 ) $sql.=" AND idpro='".$idpro."'";
    $sql.= " order by id desc";
    $listbinhluan=  pdo_query($sql);
    return $listbinhluan;
}

function loadone_binhluan($id){
    $sql = "select * from binhluan where id =".$id;
    $bl=  pdo_query_one($sql);
    return $bl;
}



function update_binhluan($id, $tenloai){
    $sql = "update binhluan set name ='".$tenloai."' where id=".$id;
                    pdo_execute($sql);
}
?>