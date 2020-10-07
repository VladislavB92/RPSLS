<?php

declare(strict_types=1);

require_once 'Rock.php';
require_once 'Paper.php';
require_once 'Scissors.php';

$rock = new Rock();
$paper = new Paper();
$siccors = new Scissors();

var_dump($rock->beats($paper));