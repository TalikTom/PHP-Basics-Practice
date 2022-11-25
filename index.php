<?php

echo 'Hello World';
echo 'Luka\'s notes';
echo "Luka's notes";

$name = 'Luka';

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
