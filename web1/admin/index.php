<?php
include "../model/pdo.php";
include "header.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/cart.php";


//controler danh mục
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':

            //kiểm tra xem ng dùng có click vào nút add hay không
            if (isset($_POST["themmoi"]) && ($_POST["themmoi"])) {
                $tenloai = $_POST['tenloai'];
                if ($tenloai != '') {
                    insert_danhmuc($tenloai);

                    $thongbao = "Thêm thành công";
                } else {
                    $thongbao = "Vui lòng nhập dữ liệu";
                }
            };


            include 'danhmuc/add.php';
            break;
        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        case 'xoadm':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                //     $sql = "delete from category where id =" .$_GET['id'];
                //     pdo_execute($sql);

                delete_danhmuc($_GET['id']);
            }
            // $listdanhmuc=  pdo_query($sql);
            // $sql = "select * from category order by id desc";
            // $listdanhmuc=  pdo_query($sql);
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {

                $dm = loadone_danhmuc($_GET['id']);
            }
            include 'danhmuc/update.php';
            break;

        case 'updatedm':
            if (isset($_POST["capnhat"]) && ($_POST["capnhat"])) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];

                if ($tenloai != '') {
                    update_danhmuc($id, $tenloai);
                    $thongbao = "Cập nhật thành công";
                } else {
                    $thongbao = "Vui lòng nhập dữ liệu";
                }
            };

            $listdanhmuc = loadall_danhmuc();


            include "danhmuc/list.php";
            break;

        case 'adddm':
            include 'danhmuc/add.php';
            break;

            //controller sản phẩm 

        case 'addsp':
            if (isset($_POST["themmoi"]) && ($_POST["themmoi"])) {
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = '../upload/';
                $target_file = $target_dir . basename($_FILES['hinh']['name']);
                if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                } else {
                }
                if ($tensp != '' && $giasp != '' && $mota != '') {
                    insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm);

                    $thongbao = "Thêm thành công";
                } else {
                    $thongbao = "Vui lòng nhập dữ liệu";
                }
            };
            $listdanhmuc = loadall_danhmuc();



            include 'sanpham/add.php';
            break;
        case 'listsp':
            if (isset($_POST["listok"]) && ($_POST["listok"])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = "";
                $iddm = 0;
            }
            $listdanhmuc = loadall_danhmuc();

            $listsanpham = loadall_sanpham($kyw, $iddm);
            include "sanpham/list.php";
            break;

        case 'xoasp':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                //     $sql = "delete from category where id =" .$_GET['id'];
                //     pdo_execute($sql);

                delete_sanpham($_GET['id']);
            }
            // $listsanpham=  pdo_query($sql);
            // $sql = "select * from category order by id desc";
            // $listsanpham=  pdo_query($sql);
            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;

        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {

                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();

            include 'sanpham/update.php';
            break;

        case 'updatesp':
            if (isset($_POST["capnhat"]) && ($_POST["capnhat"])) {
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];

                // var_dump($iddm);
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = '../upload/';
                $target_file = $target_dir . basename($_FILES['hinh']['name']);
                if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                } else {
                }
                // if ($tensp != ''&& $giasp!="" && $mota!="" && $hinh!="") {
                update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh);
                $thongbao = "Cập nhật thành công";
                // } else {
                //     $thongbao = "Vui lòng nhập dữ liệu";
                // }
            };
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham("", 0);


            include "sanpham/list.php";
            break;
        case 'dskh':
            $listtaikhoan = loadall_taikhoan();
            include 'taikhoan/list.php';
            break;
        case 'addsp':
            include 'sanpham/add.php';
            break;
        case 'dsbl':
            $listComments =  loadall_binhluan(0);
            include 'binhluan/list.php';
            break;
        case 'xoabl':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                //     $sql = "delete from category where id =" .$_GET['id'];
                //     pdo_execute($sql);

                delete_binhluan($_GET['id']);
            }
            $listComments =  loadall_binhluan(0);
            include 'binhluan/list.php';
            break;
        case 'bill':
            if (isset($_POST['kyw']) && $_POST['kyw'] != "") {
                $kyw = $_POST['kyw'];
                var_dump($kyw);
            } else {
                $kyw = "";
            }
            $listbill = loadall_bill($kyw, 0);

            include 'bill/list.php';
            break;
        case 'xoadh':
            if (isset($_GET['id']) && $_GET['id'] > 0) {

                delete_bill($_GET['id']);
            }
            $listbill = loadall_bill("", 0);

            include 'bill/list.php';
            break;
        case 'thongke':

            $listtk = load_all_thongke();
            // var_dump($listtk);
            include 'thongke/list.php';
            break;
        case 'bieudo':

            $listtk = load_all_thongke();
            // var_dump($listtk);
            include 'thongke/bieudo.php';
            break;
        default:
            include 'home.php';

            break;
    }
} else {
    include 'home.php';
}







// include "home.php";
include "footer.php";
