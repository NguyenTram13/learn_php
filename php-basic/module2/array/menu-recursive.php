<?php
require_once 'function.php';
$menu=[
    [
        'title'=>'Trang chủ',
        'link'=>'#',
    ],
    [
        'title'=>'Giới thiệu',
        'link'=>'#',
    ],
    [
        'title'=>'Dịch vụ',
        'link'=>'#',
        'sub'=>[
            [
                'title'=>'Thiết kế web',
                'link'=>'#'
            ],
            [
                'title'=>'Dịch vụ SEO',
                'link'=>'#'
            ],
            [
                'title'=>'Phần mềm',
                'link'=>'#',
                'sub'=>[
                    [
                        'title'=>'Quản lý bán hàng ',
                        'link'=>'#'
                    ],
                    [
                        'title'=>'Quản lý khách hàng',
                        'link'=>'#'
                    ],
                ],
            ],
        ],
    ],
    [
        'title'=>'Tin tức',
        'link'=>'#'
    ],
    [
        'title'=>'Liên hệ ',
        'link'=>'#'
    ],

];
echo '<pre>';
print_r($menu);
echo '</pre>';
buildmenu($menu);
?>
<!-- <ul class="menu">
    <li><a href="#">Trang chủ</a></li>
    <li><a href="#">Giới thiệu</a></li>
    <li><a href="#">Dịch vụ</a>
        <ul class="sub-menu">
            <li><a href="#">Thiết kế web</a></li>
            <li><a href="#">Dịch vụ SEO</a></li>
            <li><a href="#">Phần mềm</a>
                <ul class="sub-menu">
                    <li><a href="#">Quản lý bán hàng</a></li>
                    <li><a href="#">Quản lý khách hàng</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li><a href="#">Tin tức</a></li>
    <li><a href="#">liên hệ </a></li>
</ul> -->