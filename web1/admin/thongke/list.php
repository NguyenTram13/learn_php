<div class="row">
    <div class="row frmtitle mb10">
        <h1>DANH SÁCH THỐNG KÊ</h1>
    </div>

    <div class="row frmcontent">
        <div class="row mb10 frmdsloai">
            <table>
                <tr>
                    <th>STT</th>
                    <th>MÃ DANH MỤC</th>

                    <th>TÊN DANH MỤC</th>
                    <th>SỐ LƯỢNG</th>
                    <th>GIÁ THẤP NHẤT</th>
                    <th>GÁ CAO NHẤT</th>
                    <TH>GIÁ TRUNG BÌNH</TH>

                </tr>
                <?php
                if (!empty($listtk)) {
                    $i = 0;
                    // echo '<pre>';
                    // print_r($listtk);
                    foreach ($listtk as $item) {
                        extract($item);
                        $i++;
                        echo '<tr>
                        <td>' . $i . '</td>
                        <td>' . $madm . '</td>
                        <td>' . $namedm. '</td>
                        <td>' . $count_sp . '</td>
                        <td>' . $min_price . '</td>
                        <td>' .  $max_price . '</td>
                        <td>' . $avg_price . '</td>


                    </tr>';
                    }
                }

                ?>


            </table>
        </div>
    </div>
    <div class="row">

        <a href="index.php?act=bieudo"><button class="bieudo">Biểu Đồ</button></a>
    </div>
</div>