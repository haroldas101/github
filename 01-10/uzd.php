<?php 

// $name = 'Haroldas';
// $age = 24;

// echo "My name is $name. My age is $age";


// $info = `cat /etc/os-release`;

// echo $info;




$arr = ["a", "b", "c"];
var_dump($arr);

echo '<br>';

echo $arr[0] . ' ' . $arr[1] . ' ' . $arr[2];

echo '<br>';

$arr[] = ["d"];

echo $arr[0] . ' + ' . $arr[1]. ', ' . $arr[2] . ' + ' . $arr[3];

echo '<br>';

$arr2 = [2, 5, 3, 9];

$result = ($arr2[0] * $arr2[1]) + ($arr2[2] * $arr2[3]);

echo $result;

echo '<br>';

$arr3 = [];

for ($i=1; $i <= 5; $i++) { 
    $arr3[$i] = $i;
}

var_dump($arr3);
