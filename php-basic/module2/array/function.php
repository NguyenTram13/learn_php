<?php
function buildmenu($menu, $isSub = false){
    if(!empty($menu)){
    echo '<ul class="menu">';
        foreach($menu as $item){
                echo '<li>';
                echo '<a href="'.$item['link'].'">'.$item['title'].'</a>';
                if(!empty($item['sub'])){
                    buildmenu($item['sub'], true);

                }
            echo '</li>';
            }
    echo '</ul>';
    }
}

function makeMenu($menu, $parentId=0, $isSub=false){

    $childArr = [];
    if(!empty($menu)){
        foreach($menu as $key=>$item){
            if($item['parent']==$parentId){
                $childArr[]= $item;
                unset($menu[$key]);

            }
        }
    }



    if(!empty($childArr)){
        echo ($isSub)?'<ul class="sub-menu">':'<ul class="menu">';
        foreach($childArr as $item){
            if($item['parent']==$parentId){
                echo '<li>';
                echo '<a href="'.$item['link'].'">'.$item['title'].'</a>';
                makeMenu($menu, $item['id'], true);
                echo '</li>';
            }
        }
        echo '</ul>';
    }
}

function getTreeMenu($menu, $parentId=0, &$resultArr=[]){
    if(!empty($menu)){
        foreach($menu as $key=> $item){
            if($item['parent']==$parentId){
                $resultArr[$key]=$item;
                getTreeMenu($menu, $item['id'], $resultArr[$key]['sub']);
                if(empty($resultArr[$key]['sub'])){
                    unset($resultArr[$key]['sub']);
                }
                unset($menu[$key]);
            }
        }
    }
    return $resultArr;
}


function getchildCategogy($category, $parentId=0, &$resultArr=[]){
    if(!empty($category)){
        foreach($category as $key=> $item){
            if($item['parent']==$parentId){
                $resultArr[]=$item['id'];
                getTreeMenu($category, $item['id'], $resultArr);
               
            }
        }
    }
    return $resultArr;
}