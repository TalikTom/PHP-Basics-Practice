<?php

declare(strict_types=1);


echo 'Hello World';
echo 'Luka\'s notes';
echo "Luka's notes";

$name = 'Luka';
$greeting = 'Hello World';

if($name) {
    $greeting = 'Welcome back, ' . $name;
}



echo "My name is $name";
echo 'My name is ' . $name;

//variables, by default, are assigned by value

$x = 1;
$y = $x;
$x = 3;

echo $y . '<br />';

//assigning variables by reference

$x = 1;
$y = &$x;
$x = 3;

echo $y . '<br />';

//constants, define them by all uppercase
//no need for $ when echoing constant

define('STATUS_PAID', 'paid');

echo STATUS_PAID . '<br />';

echo defined('STATUS_PAID') . '<br />';

//constants defined with const keyword are defined at compile time, while const created with define function are defined at runtime

const STATUS_PAID = 'paid';

//dynamicaly declared constant

$void = 'VOID';

define('STATUS_' . $void, $void);

echo STATUS_VOID . '<br />';

//variable variables

$foo = 'bar';

$$foo = 'baz';

echo "$foo, $bar" . '<br />';
echo "$foo, ${$foo}" . '<br />';

//arrays

$companies = [];
$companies[] = 1;
$companies[]= 2;

print_r($companies);

//boolean

$true = 0;

if($true) {
    echo 'It works';
} else {
    echo "It wasn't true";
}




//arithmetic operators (+-*/%**)
$a = 10;
$b = 2;


//using mod with floats
var_dump(fmod($a, $b));

// if / else /elseif / else if

$score = 95;

if($score >= 90) {
    echo 'A';
        if($score >= 95) {
            echo '+';
        };

} elseif($score >= 80) {
    echo 'B';
        if($score >= 85) {
            echo '+';
        };

} elseif($score >= 70) {
    echo 'C';
        if($score >= 75) {
            echo '+';
        };

} elseif($score >= 60) {
    echo 'D';
        if($score >= 65) {
            echo '+';
        };

} else {
    echo 'F';
};


//loops

$i = 0;

while($i <= 15) {
    echo $i++;
}

$stock = 5;
$ordered = 4;

if ($stock > 0) {
    $message = 'In stock';
} elseif ($ordered > 0) {
    $message = 'Coming soon';
} else {
    $message = 'Out of stock';
}

//switch statement

$day = date('l');

switch ($day) {

    case 'Monday':
        $offer = '20% off on djindje';
        break;

    case 'Tuesday':
        $offer = '20% off on everything';
        break;
    
    case 'Wednesday':
        $offer = '30% off on kauci';
        break;

    default:
        $offer = 'No discount for you!';
    
}

//match

$ponuda = match($day) {
    'Monday' => 'Lijep dan za ponedjeljak',
    'Tuesday' => 'Lijep dan za utorak',
    'Wednesday' => 'Lijep dan za srijedu',
    'Thursday' => 'Lijep dan za cetvrtak',
    default => 'Nikakav dan'
};

//while loop

while ($counter <10) {
    echo 'yup ';
    $counter++;
}

$counts = 1;
$packs = 5;
$price = 1.99;



$lollypopCount = 1;
$lollypopPacks = 10;
$lollypopPrice = 0.99;


//do while gets executed at least once no matter what
do {
    echo $counter;
    $counter ++;
} while ($counter < 10);

//for loop   

for ($i = 0; $i < 10; $i++) {
    echo '<br>';
    echo $i;
}

//foreach loop

$products = [
    'toffee' => 2.99,
    'mints' => 1.99,
    'fudge' => 3.40
];

foreach ($products as $item => $price) {
    echo $item;
    echo ' -$';
    echo $price;
    echo '<br>';
}
require 'index.view.php';
require 'about.view.php';

