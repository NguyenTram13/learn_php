<div class="row">
    <div class="row frmtitle">
        <h1>DANH SÁCH KHÁCH HÀNG</h1>
    </div>
    <div class="row frmcontent">
        <div class="row mb10 frmdsloai">
            <table>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>NỘI DUNG BÌNH LUẬN</th>
                    <th>ID USER</th>
                    <th>ID SẢN PHẨM</th>
                    <th>NGÀY BÌNH LUẬN</th>

                    <th></th>
                </tr>
                <?php
                if (!empty($listComments)) {

                    foreach ($listComments as $item) {
                        // $suabl = 'index.php?act=suabl&id=' . $item['id'];
                        $xoabl = 'index.php?act=xoabl&id=' . $item['id'];

                        echo '<tr>
                        <td><input type="checkbox" name="" id="" /></td>
                        <td>' . $item['id'] . '</td>
                        <td>' . $item['noidung'] . '</td>
                        <td>' . $item['iduser'] . '</td>
                        <td>' . $item['idpro'] . '</td>
                        <td>' . $item['ngaybl'] . '</td>

                        <td>
                            
                            <a href="' . $xoabl . '"><input type="button" value="Xóa" /></a>
                        </td>
                    </tr>';
                    }
                }

                ?>


            </table>
        </div>
        <!-- <div class="row mb10">
            <input type="button" value="Chọn tất cả" />
            <input type="button" value="Bỏ chọn tất cả" />
            <input type="button" value="Xóa các mục đã chọn" />
        </div> -->
    </div>
</div>