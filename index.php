<?php



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

echo $y;

//assigning variables by reference

$x = 1;
$y = &$x;
$x = 3;

echo $y;

//constants, define them by all uppercase
//no need for $ when echoing constant

define('STATUS_PAID', 'paid');

echo STATUS_PAID;

echo defined('STATUS_PAID');

//constants defined with const keyword are defined at compile time, while const created with define function are defined at runtime

const STATUS_PAID = 'paid';

require 'index.view.php';
