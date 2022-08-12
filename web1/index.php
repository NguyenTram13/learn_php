<?php

session_start();
date_default_timezone_set(
    'Asia/Ho_Chi_Minh'
);
include "view/header.php";
// include "view/boxright.php";

include "model/danhmuc.php";
// include "view/boxright.php";
include "model/sanpham.php";
include "model/pdo.php";
include "model/taikhoan.php";
include "model/binhluan.php";
include "model/cart.php";

include "global.php";

if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];

$spnew = loadall_sanpham_home();
$dsdm = loadall_danhmuc();
$top10 = loadall_sanpham_top10();
if ((isset($_GET['act'])) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'about':
            include "view/about/about.php";
            break;
        case 'contact':
            include "view/contact/contact.php";
            break;
        case 'sanpham':

            if (isset($_POST['kyw']) && $_POST['kyw'] != "") {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && $_GET['iddm'] > 0) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $listSpDm = loadall_sanpham($kyw, $iddm);
            $namedm = load_tendm($iddm);
            include "view/sanpham.php";

            break;
        case 'sanphamct':

            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $sp = loadone_sanpham($id);
                extract($sp);
                // print_r($sp);
                $sp_cungloai = load_sanpham_cungloai($id, $idCate);
                include "view/sanphamct.php";
            } else {
                include "view/home.php";
            }
            break;
        case 'dangky':
            if (isset($_POST['dangky']) && $_POST['dangky']) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                // var_dump('áda');
                insert_taikhoan($email, $user, $pass);
                $thongbao = "Đã đăng ký thành công. Vui lòng đăng nhập";
            }
            include "view/taikhoan/dangky.php";
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($user, $pass);
                // var_dump($checkuser);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    header('location: index.php');
                    $thongbao = "Đăng nhập thành công";
                } else {
                    $thongbao = "Tài khoản không tồn tại.Vui lòng kiểm tra hoặc đăng ký";
                }
            }
            include "view/taikhoan/dangnhap.php";
            break;
        case 'edit_taikhoan':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];

                update_taikhoan($id, $user, $pass, $email, $address, $tel);
                $_SESSION['user'] = checkuser($user, $pass);

                header('location: index.php?act=edit_taikhoan');
                $thongbao = 'Cập nhật thành công';
            }
            include "view/taikhoan/edit.php";
            break;
        case 'quenmk':
            if (isset($_POST['guiemail']) && $_POST['guiemail']) {

                $email = $_POST['email'];
                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là: " . $checkemail['pass'];
                } else {
                    $thongbao = "Email không tồn tại";
                }
            }
            include "view/taikhoan/quenmk.php";
            break;
        case 'addcart':
            if (isset($_POST['addtocart']) && $_POST['addtocart']) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['image'];
                $price = $_POST['price'];
                $soluong = 1;
                $thanhtien = $soluong * $price;
                $spadd = [$id, $name, $img, $price, $soluong, $thanhtien];

                if (isset($_SESSION['mycart']) && !empty($_SESSION['mycart'])) {

                    foreach ($_SESSION['mycart'] as $key => $cart) {
                        $check = -1;

                        if ($cart[0] === $id) {

                            $cart[4] += 1;
                            $cart[5] = $cart[4] *  $cart[3];
                            $check = 1;

                            $cartNew = $cart;
                            $keyNew = $key;
                            // echo "<pre>";
                            // print_r($cartNew);
                            break;
                        } else {
                            $check = -1;
                        }
                    }
                    if (isset($check) &&  $check > 0) {
                        $_SESSION['mycart'][$keyNew] = [];
                        $_SESSION['mycart'][$keyNew] = $cartNew;
                    } else {
                        array_push($_SESSION['mycart'], $spadd);
                    }
                } else {

                    array_push($_SESSION['mycart'], $spadd);
                }
            }
            // $listCart = loadALLCart($id);
            include "view/cart/viewcart.php";
            break;
        case 'delcart':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                echo $_GET['id'];
                // die();
                foreach ($_SESSION['mycart'] as $key => $item) {
                    if ($item[0] == $_GET['id']) {
                        array_splice($_SESSION['mycart'], $key, 1);
                    }
                }
            }


            include "view/cart/viewcart.php";

            break;
        case 'bill':
            if (isset($_POST['bill']) && $_POST['bill']) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['image'];
                $price = $_POST['price'];
                $soluong = 1;
                $thanhtien = $soluong * $price;
                $spadd = [$id, $name, $img, $price, $soluong, $thanhtien];



                array_push($_SESSION['mycart'], $spadd);
            }
            // $listCart = loadALLCart($id);
            include "view/cart/bill.php";
            break;
        case 'billconfirm':
            if (isset($_POST['dongydathang']) && $_POST['dongydathang']) {
                if(isset( $_SESSION['user'])) $iduser=  $_SESSION['user']['id'];
                else $iduser =0;
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $pttt = $_POST['pttt'];
                $ngaydathang = date('Y-m-d h:i:sa');
                $tongdonhang = tongdonhang();

                $idbill = insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang);
                foreach ($_SESSION['mycart'] as $cart) {
                    // print_r($_SESSION['mycart']);
                    // die();

                    add_cart(
                        $_SESSION['user']['id'],
                        $cart[0],
                        $cart[2],
                        $cart[1],
                        $cart[3],
                        $cart[4],
                        $cart[5],
                        $idbill,

                    );
                }
                $_SESSION['mycart'] = [];
            }
            $oneOrder = loadone_bill($idbill);
            // print_r($oneOrder);
            $listcart = loadAll_cart($idbill);
            // var_dump($listcart);
            include "view/cart/billconfirm.php";
            break;
        case 'mybill':
            // if (isset($_POST['mybill']) && $_POST['mybill']) {
                // $id = $_POST['id'];
                // $name = $_POST['name'];
                // $img = $_POST['image'];
                // $price = $_POST['price'];
                // $soluong = 1;
                // $thanhtien = $soluong * $price;
                // $spadd = [$id, $name, $img, $price, $soluong, $thanhtien];



                // array_push($_SESSION['mycart'], $spadd);
            // }
            // $listCart = loadALLCart($id);
            $listbill= loadall_bill("",$_SESSION['user']['id']);
            include "view/cart/mybill.php";
            break;
        case 'thoat':
            session_unset();
            header('location: index.php');
        default:
            include "view/home.php";

            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";
