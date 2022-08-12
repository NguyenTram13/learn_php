<?php
for($i=1;$i<=10; $i++){
    echo $i.'<br/>';
}

for($i=1;$i<=10; $i++):
    echo $i.'<br/>';
endfor;

$i=1;
while($i<=10){
    echo $i.'<br/>';
    $i++;

}

$i=1;
while($i<=10):
    echo $i.'<br/>';
    $i++;
    
endwhile;


//thay thế foreach

$datArr=[
    'item1',
    'item2'
];
foreach ($datArr as $item){
    echo $item."<br/>";
}

foreach ($datArr as $item):
    echo $item."<br/>";
endforeach;