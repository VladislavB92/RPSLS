<?php

declare(strict_types=1);

require_once 'Signs/Rock.php';
require_once 'Signs/Paper.php';
require_once 'Signs/Scissors.php';
require_once 'Signs/SignsCollection.php';

$rock = new Rock();
$paper = new Paper();
$siccors = new Scissors();

$outcome = $rock->beats($siccors);

$result = new $outcome;

echo $result->getMessage();