<?php
$data =[
    'Tin tức',
    'Sản phẩm',
];

foreach ($data as $item){
    $url =$item;
    $url= '?module='.urlencode($url);
    echo '<a href="'.$url.'">'.$item.'</a><br/>';
}

if(!empty($_GET['module'])){
    $module = urldecode($_GET['module']);
    echo $module;
}
echo '<br/>';

echo '<pre>';
print_r($_SERVER);
echo '</pre>';

