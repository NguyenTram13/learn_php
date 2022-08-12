<div class="row mb ">
    <div class="boxtrai mr">
        <div class="row mb ">
            <div class="boxtitle">GIỎ HÀNG</div>
            <div class="row boxcontent cart mb10 frmdsloai">
                <table>
                   
                    <?php
                //     $tongtien = 0;


                //     foreach ($_SESSION['mycart'] as $item) {

                //         // print_r($item);
                //         $xoa = "index.php?act=delcart&id=" . $item[0];
                //         $img = $path_img . $item[2];
                //         $ttien= $item[3]* $item[4];
                //         $tongtien+=$ttien;
                //         echo '
                //      <tr>
                //      <td height="80px"><img src="' . $img . '" height="80px" alt=""></td>
                //      <td>' . $item[1] . '</td>
                //      <td>' . $item[3] . '</td>
                //      <td>' . $item[4] . '</td>
                //      <td>' .  $ttien. ' VNĐ</td>
                //      <td> <a href="'.$xoa.'" > <input name="xoacart" type="button" value="Xóa"></a></td>
                 
                //  </tr>
                //          ';
                //     }
                //     echo '
                //     <tr>
                //      <td colspan="4">Tổng đơn hàng </td>
                //      <td>' . $tongtien. ' VNĐ</td>
                //      <td></td>
                 
                //  </tr>
                         
                //     ';
                    
                viewsCart(1);
                    ?>

                </table>
            </div>
        </div>

        <div class="row mb bill">
            <a href="index.php?act=bill"><input type="submit" value="ĐỒNG Ý ĐẶT HÀNG"></a>

        </div>
    </div>
    <div class="boxphai">
        <?php include 'view/boxright.php'; ?>

    </div>
</div>