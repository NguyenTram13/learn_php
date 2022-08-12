<?php
$number=11;
if($number==10){
    echo "bạn đủ tuổi <br/>";
}else{
    echo "bạn chưa đủ tuổi<br/>";
}

echo $number==11?'Bạn đủ tuổi <br/>':'Bạn chưa đủ tuổi <br/>';

//thay thế if

if($number==10){
    ?>
    <h3>1</h3>
    <h4>2</h4>
    <p>đoạn văn</p>
    <?php
}else{
    ?>
    <p>không hợp lệ</p>
    <?php
}

if($number==10):
    ?>
    <h3>1</h3>
    <h4>2</h4>
    <p>đoạn văn</p>
    <?php
    else:
        ?>
        <p>không hợp lệ</p>
        <?php
endif;


