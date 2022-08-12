<?php
$menuArr= [
    [
        'title' => 'Home',
        'link' => '#',
        'class' => '',
    ],
    [
        'title' => 'News',
        'link' => '#',
        'class' => '',
    ],
    [
        'title' => 'Dropdown',
        'link' => '#',
        'class' => 'dropbtn',
        'sub' =>[
            [
                'title' => 'Link 1',
                'link' => '#',
            ],
            [
                'title' => 'Link 2',
                'link' => '#',
            ],
            [
                'title' => 'Link 3',
                'link' => '#',
            ],
        ]
    ],
];

echo '<pre>';
print_r($menuArr);
echo '</pre>';

if(!empty($menuArr)){
    echo '<div class= "navbar">';
    foreach($menuArr as $item){
        $class =!empty($item['class'])? 'class="'.$item['class'].'"':null;
        echo '<a href="'.$item['link'].'">'.$item['title'].'</a>';

        if(!empty($item['sub'])){
            echo '<div class= "dropdown">';
            $submenu= $item['sub'];
            echo '<div class= "dropdown-content">';
            foreach($submenu as $sub){
                echo '<a href= "'.$sub["link"].'">'.$sub['title'].'</a>';
            }
            echo '</div>';
            echo '</div>';
        }
        echo '</a>';
    }
    echo '</div>';
}

?> 

<html>
    <head>
        <meta charset='UTF-8'/>
        <title>Menu Dropdown</title>
        <style>
            body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            }

            .navbar {
            overflow: hidden;
            background-color: #333;
            
            }

            .navbar a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            }

            .dropdown {
            float: left;
            overflow: hidden;
            }

            .dropdown .dropbtn {
            font-size: 16px;  
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
            }

            .navbar a:hover, .dropdown:hover .dropbtn {
            background-color: red;
            }

            .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            }

            .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
            }

            .dropdown-content a:hover {
            background-color: #ddd;
            }

            .dropdown:hover .dropdown-content {
            display: block;
            }
        </style>
    </head>
    <body>
    <!-- <div class="navbar">
        <a href="#home">Home</a>
        <a href="#news">News</a>
        <div class="dropdown">
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div>
        </div> 
    </div> -->
    </body>
</html>