<?php
session_start();
date_default_timezone_set(
    'Asia/Ho_Chi_Minh'
);
include '../../model/pdo.php';
include '../../model/binhluan.php';
include '../../model/taikhoan.php';
$idpro = $_REQUEST['idpro'];
if (isset($_SESSION['user'])) {
    $idUser = $_SESSION['user']['id'];
}
$listComment = loadall_binhluan($idpro);
// var_dump($listComment);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>




    <div class="row mb">
        <div class="boxtitle" id="comment_smooth">BÌNH LUẬN</div>
        <div class="boxcontent comment">
            <div>
                <?php
                // echo "bình luận ở đây: " . $idpro;
                foreach ($listComment as $item) {
                    $info_user =  loadone_binhluan($item['id']);
                    echo '<div>';
                    $linkDm = 'index.php?act=sanpham&iddm=' . $item['id'];
                    echo '<span>' . $item['noidung'] . '</span>';
                    echo '<span class="info_comment">';
                    echo '<span>' . $info_user['iduser'] . '</span>';
                    echo '<span>' . $item['ngaybl'] . '</span>';
                    echo '</span>';

                    echo '</div>';
                }
                ?>

            </div>
        </div>
        <div class="boxfooter searbox">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="form_search_sp">
                <input type="text" name="message">
                <input type="hidden" name="idpro" value="<?= $idpro ?>">
                <input type="hidden" name="iduser" value="<?= $idUser ?>">

                <input type="submit" class="btn_search" name="comment" value="Bình Luận">
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['comment']) && $_POST['comment']) {
        $idpro = $_POST['idpro'];
        $id_user = $_POST['iduser'];
        $noidung = $_POST['message'];
        $ngaybl = date('Y-m-d H:i:s');
        insert_binhluan($noidung, $id_user, $idpro, $ngaybl);
        header("Location: " . $_SERVER['HTTP_REFERER'] . "#comment_smooth");
    }

    ?>

</body>

</html>