<?php

function add_cart(
    $idUser,
    $idItem,
    $image,
    $name,
    $price,
    $soluong,
    $thanhtien,
    $idbill,
) {
    $sql = "insert into carts (iduser,idpro,img,name,price,soluong,thanhtien,idbill) values ('$idUser','$idItem','$image','$name','$price','$soluong','$thanhtien', '$idbill')";
    pdo_execute($sql);
}
function loadAll_cart($idbill)
{
    $sql = "select * from carts where idbill=" . $idbill;
    $cart = pdo_query($sql);
    return $cart;
}
function loadAll_cart_count($idbill)
{
    $sql = "select * from carts where idbill=" . $idbill;
    $cart = pdo_query($sql);
    return sizeof($cart);
}

function loadALLCart($idUser)
{
    $sql = "select * from carts where iduser='" . $idUser . "' order by id desc";

    $listCart  = pdo_query($sql);
    return $listCart;
}
function delete_cart($id)
{
    $sql = "delete from carts where id=" . $id;
    pdo_execute($sql);
}
function viewsCart($del)
{
    global $path_img;
    $tongtien = 0;
    if (is_array($_SESSION['mycart'])) {
        if ($del == 1) {
            $xoa_th = '<th>Thao Tác</th> ';
            $xoa_sp = '<td></td>';
        } else {
            $xoa_th = '';
            $xoa_sp = '';
        }
        echo '
        <tr>
                        <th>Hình</th>
                        <th>Sản Phẩm</th>
                        <th>Đơn Giá</th>
                        <th>Số Lượng</th>
                        <th>Thành Tiền</th>
                        ' . $xoa_th . '


                    </tr>
        ';
        foreach ($_SESSION['mycart']  as $item) {

            $xoa = "index.php?act=delcart&id=" . $item[0];
            $img = $path_img . $item[2];
            $ttien = $item[3] * $item[4];
            $tongtien += $ttien;
            if ($del == 1) {

                $xoa_td = ' <td> <a href="' . $xoa . '" > <input name="xoacart" type="button" value="Xóa"></a></td>';
            } else {

                $xoa_td = '';
            }
            echo '
            
         <tr>
         <td height="80px"><img src="' . $img . '" height="80px" alt=""></td>
         <td>' . $item[1] . '</td>
         <td>' . $item[3] . '</td>
         <td>' . $item[4] . '</td>
         <td>' .  $ttien . ' VNĐ</td>
            ' . $xoa_td . '
     </tr>
             ';
        }
        echo '
                    <tr>
                     <td colspan="4">Tổng đơn hàng </td>
                     <td>' . $tongtien . ' VNĐ</td>
                     ' . $xoa_sp . '
                 
                 </tr>
                         
                    ';
    }
}
function views_one_Cart($listbill)
{
    global $path_img;
    $tongtien = 0;
    foreach ($listbill as $item) {

        $img = $path_img . $item['img'];
        $tongtien += $item['thanhtien'];
        echo '
                <tr>
                    <td height="80px"><img src="' . $img . '" height="80px" alt=""></td>
                    <td>' . $item['name'] . '</td>
                    <td>' . $item['price'] . '</td>
                    <td>' . $item['soluong'] . '</td>
                    <td>' . $item['thanhtien'] . 'VNĐ</td>
                        
                        
                </tr>
                ';
    }
    echo '
            <tr>
                <td colspan="4">Tổng đơn hàng </td>
                <td>' . $tongtien . ' VNĐ</td>
               
            </tr>
            ';
}
function sumMoney($id)
{
    $listCart = loadALLCart($id);
    $sum = 0;
    foreach ($listCart as $item) {
        $sum += $item['thanhtien'];
    }
    return $sum;
}
function tongdonhang()
{
    $tong = 0;
    foreach ($_SESSION['mycart'] as $item) {
        $ttien = $item[3] * $item[4];
        $tong += $ttien;
    }
    return $tong;
}
function insert_bill($iduser, $bill_name, $bill_email, $bill_address, $bill_tel, $bill_pttt, $ngaydathang, $total)
{
    $sql = "insert into bill(iduser,bill_name, bill_email, bill_address, bill_tel,bill_pttt,ngaydathang, total)values('$iduser', '$bill_name', '$bill_email', '$bill_address', '$bill_tel','$bill_pttt', '$ngaydathang',	'$total')";
    return pdo_execute_lastInsertID($sql);
}
function loadone_bill($idbill)
{
    $sql = "select * from bill where id =" . $idbill;
    $bill =  pdo_query_one($sql);
    return $bill;
}

function loadall_bill($kyw="",$iduser=0)
{
    $sql = "select * from bill where 1";
    if($iduser>0) $sql .= " AND iduser=" . $iduser;
    if($kyw!="") $sql .= " AND id like '%". $kyw."%'";
    $sql.=" order by id desc";
    $listbill  = pdo_query($sql);
    return $listbill;
}
function delete_bill($id){
   
    $sql = "delete from bill where id =".$id;
    pdo_execute($sql);  
}
function get_ttdh($n)
{
    switch ($n) {
        case "0":
            $tt = "Đơn hàng mới";
            break;
        case "1":
            $tt = "Đang xử lý";

            break;
        case "2":
            $tt = "Đang giao hàng";

            break;
        case "3":
            $tt = "Đã giao hàng";

            break;
        default:$tt = "Đơn hàng mới";
            break;
    }
    return $tt;
}
function get_pttt($n)
{
    switch ($n) {
        case "1":
            $tt = "Trả tiền sau khi nhận hàng";
            break;
        case "2":
            $tt = "Chuyển Khoản Ngân Hàng";

            break;
        case "3":
            $tt = "Thanh Toán Online";

            break;
        default:
            break;
    }
    return $tt;
}
function load_all_thongke()
{
    $sql = "select category.id as madm,category.name as namedm,count(product.id) as count_sp,min(product.price) as min_price,max(product.price) as max_price,avg(product.price) as avg_price";
    $sql .= " from product left join category on category.id = product.idCate";
    $sql .= " group by category.id order by category.id desc";

    $listTk  = pdo_query($sql);
    return $listTk;
}
