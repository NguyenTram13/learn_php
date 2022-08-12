<?php
function insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm)
{
    $sql = "insert into product (name, price, img, mota, idCate) values('$tensp', '$giasp', '$hinh', '$mota',' $iddm ')";
    pdo_execute($sql);
}
function delete_sanpham($id)
{

    $sql = "delete from product where id =" . $id;
    pdo_execute($sql);
}
function loadall_sanpham($kyw = "", $iddm = 0)
{
    $sql = "select * from product where 1";
    if ($kyw != "") {
        $sql .= " and name like '%" . $kyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " and idCate='" . $iddm . "'";
    }
    $sql .= " order by id desc";
    $listsanpham =  pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham_home()
{
    $sql = "select * from product where 1 order by id desc limit 0,9";

    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham_top10()
{
    $sql = "select * from product where 1 order by views desc limit 0,10";

    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadone_sanpham($id)
{
    $sql = "select * from product where id =" . $id;
    $sp =  pdo_query_one($sql);
   return $sp;
}
function load_tendm($iddm)
{
    if($iddm>0){

        $sql = "select * from category where id =" . $iddm;
        $dm =  pdo_query_one($sql);
        extract($dm);
        return $name;
    }else{
        return  "";
    }

    
}
function load_sanpham_cungloai($id,$iddm)
{
    $sql = "select * from product where idCate=".$iddm." AND id <>" . $id;
    $listsanpham =  pdo_query($sql);

    return $listsanpham;
}

function update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh)
{
    if ($hinh != "")
        $sql = "update product set idCate ='" . $iddm . "' , name ='" . $tensp . "', price ='" . $giasp . "', mota ='" . $mota . "',  img ='" . $hinh . "' where id=" . $id;
    else
        $sql = "update product set idCate ='" . $iddm . "' , name ='" . $tensp . "', price ='" . $giasp . "', mota ='" . $mota . "'  where id=" . $id;

    pdo_execute($sql);
}
