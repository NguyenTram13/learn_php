<?php
/*
thứ tự 
header
content
footer
*/

$path_dir= __DIR__.'/include';
// echo $path_dir;
$path_dir= 'include/';
require_once $path_dir.'/header.php';
// include_once $path_dir.'/header.php';

echo 'đây là trang home <br/>';

include $path_dir.'/content.php';
include $path_dir.'/footer.php';

