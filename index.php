<?php

declare(strict_types=1);

echo 'Hello World';
echo 'Luka\'s notes';
echo "Luka's notes";

$name = 'Luka';
$greeting = 'Hello World';

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

require 'index.view.php';


//arithmetic operators (+-*/%**)
$a = 10;
$b = 2;


//using mod with floats
var_dump(fmod($a, $b));

// if / else /elseif / else if

$score = 50;
if($score >= 90) {
    echo 'A';
    if($score >= 95) {
        echo '+';
    };
} elseif($score >= 80) {
    echo 'B';
} elseif($score >= 70) {
    echo 'C';
} elseif($score >= 60) {
    echo 'D';
} else {
    echo 'F';
};