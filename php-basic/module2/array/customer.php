<?php
?>
<html>
<head>
    <meta charset='UTF-8'/>
    <title>
        Customer
    </title>
   
</head>
<body>
    <?php
    $customerArr =[
        [
            'name'=> 'Ngoc Tram',
            'email' => 'tram@gmail.com',
            'phone'=> '0123346546',
            'address' => 'Can Tho',
        ],
        [
            'name'=> 'us us',
            'email' => 'us@gmail.com',
            'phone'=> '0123346546',
            'address' => 'Can Tho',
        ],
        [
            'name' => 'Min Min',
            'email' => 'min@gmail.com',
            'phone' => '0123346546',
            'address' => 'Can Tho',
        ],
        [
            'name'=> 'Ngoc Tram',
            'email' => 'tram@gmail.com',
            'phone'=> '0123346546',
            'address' => 'Can Tho',
        ],
        [
            'name' => 'Min Min',
            'email' => 'min@gmail.com',
            'phone' => '0123346546',
            'address' => 'Can Tho',
        ],
    ];
    if(!empty($customerArr)){

        //tìm phần tử trùng trong mảng
        $indexDuplicate =[];
        
        for($i=0; $i<count($customerArr)-1; $i++){
            for($j=$i+1; $j<count($customerArr); $j++){
                if($customerArr[$i]['email']== $customerArr[$j]['email']){
                    $indexDuplicate[] = $j;
                }
            }
        }

        if(!empty($indexDuplicate)){
            foreach($indexDuplicate as $index){
                if(isset($customerArr[$index])){
                    unset($customerArr[$index]);
                }
            }
        }
    }
    echo '<pre>';
    print_r($indexDuplicate);
    echo '</pre>';

    ?>
    <table width="100%" border="1" cellSpacing="0" cellpadding="0" >
        <thead>
            <tr>
                <th width= "5%">STT</th>
                <th>Họ Tên</th>
                <th>Email</th>
                <th>Điện Thoại</th>
                <th>Địa chỉ</th>

            </tr>
        </thead>
        <tbody>
            <?php
                if(!empty($customerArr)&& is_array($customerArr)):
                    $count =0;
                 foreach ($customerArr as $item) :
                    $count++;
                 
                
            ?>
            <tr>
                <td ><?php echo $count;?></td>
                <td><?php echo $item['name'];?></td>
                <td><?php echo $item['email'];?></td>
                <td><?php echo $item['phone'];?></td>
                <td><?php echo $item['address'];?></td>
            </tr>
            <?php endforeach;
            else:
            ?>
            <tr>
                <td colspan="5" style="text-align:center" > Không có dữ liệu</td>
            </tr>
            <?php endif;?>
        </tbody>
    </table>
</body>
</html>