<div class="row">
    <div class="row frmtitle mb10">
        <h1>DANH SÁCH ĐƠN HÀNG</h1>
    </div>
    <form action="index.php?act=bill" method="post" class="form_filter">
        <input type="text" name="kyw">

        <input type="submit" name="filter" value='Tìm kiếm'>
    </form>
    <div class="row frmcontent">
        <div class="row mb10 frmdsloai">
            <table>
                <tr>
                    <th></th>
                    <th>MÃ ĐƠN HÀNG</th>
                    <th>KHÁCH HÀNG</th>
                    <th>SỐ LƯỢNG HÀNG</th>
                    <th>GÁ TRỊ ĐƠN HÀNG</th>
                    <th>NGAY DAT HANG</th>
                    <th>TÌNH TRẠNG ĐƠN HÀNG</th>

                    <TH>THAO TÁC</TH>

                </tr>
                <?php
                if (!empty($listbill)) {

                    foreach ($listbill as $item) {

                        $sua = 'index.php?act=suadh&id=' . $item['id'];
                        $xoa = 'index.php?act=xoadh&id=' . $item['id'];
                        $kh = 'Tên: ' . $item['bill_name'] . '<br/><br/> Địa chỉ: ' . $item['bill_address'] . '<br/><br/>Email: ' . $item['bill_email'] . '<br/><br/>Số điện thoại: ' . $item['bill_tel'] . '';
                        $ttdh = get_ttdh($item['bill_status']);
                        $countsp= loadAll_cart_count($item['id']);

                        echo '<tr>
                        <td><input type="checkbox" name="" id="" /></td>
                        <td> ' . $item['id'] . '</td>
                        <td>' . $kh . '</td>
                        <td>' . $countsp . '</td>
                        <td>' . $item['total'] . '</td>
                        <td>' . $item['ngaydathang'] . '</td>
                        <td>' . $ttdh . '</td>


                        <td>
                            <a href="' . $sua . '"><input type="button" value="Sửa" /></a>
                            <a href="' . $xoa . '"><input type="button" value="Xóa" /></a>
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