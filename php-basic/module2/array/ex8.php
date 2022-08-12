<?php
require_once 'function.php';
$menu=[
    [
        'id'=>'1',
        'title'=>'Trang chủ',
        'link'=> '#',
        'parent'=> '0',
    ],
    [
        'id'=>'2',
        'title'=>'Giới thiệu',
        'link'=> '#',
        'parent'=> '0',
    ],
    [
        'id'=>'3',
        'title'=>'Dịch vụ',
        'link'=> '#',
        'parent'=> '0',
    ],
    [
        'id'=>'4',
        'title'=>'Thiết kế web',
        'link'=> '#',
        'parent'=> '3',
    ],
    [
        'id'=>'5',
        'title'=>'Dịch vụ SEO',
        'link'=> '#',
        'parent'=> '3',
    ],

    [
        'id'=>'6',
        'title'=>'Phần mềm',
        'link'=> '#',
        'parent'=> '3',
    ],
    [
        'id'=>'7',
        'title'=>'Web bán hàng',
        'link'=> '#',
        'parent'=> '4',
    ],
    [
        'id'=>'8',
        'title'=>'Web tin tức',
        'link'=> '#',
        'parent'=> '4',
    ],
    [
        'id'=>'9',
        'title'=>'Tin tức',
        'link'=> '#',
        'parent'=> '0',
    ],
    [
        'id'=>'10',
        'title'=>'Liên hệ ',
        'link'=> '#',
        'parent'=> '0',
    ],
] ;

// makeMenu($menu);

// $tree=getTreeMenu($menu);
// // echo $tree;
// echo '<pre>';
// print_r($tree);
// echo '</pre>';

$childCate= getchildCategogy($menu, 3);
echo '<pre>';
print_r($childCate);
echo '</pre>';
