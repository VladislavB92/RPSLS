<?php

declare(strict_types=1);

require_once 'Signs/SignsCollection.php';
require_once 'Signs/Rock.php';
require_once 'Signs/Paper.php';
require_once 'Signs/Scissors.php';
require_once 'Signs/CustomSign.php';

$signs = new SignsCollection();
$signs->addSigns(new Rock());
$signs->addSigns(new Paper());
$signs->addSigns(new Scissors());
$signs->addSigns(new CustomSign("Spock", ['Scissors', 'Rock']));
$signs->addSigns(new CustomSign("Lizard", ['Spock', 'Paper']));
$fighter = $signs->getAllSigns();
$playAgain = "y";
$playerFighter = "";

echo "\nWelcome to the Rock-Paper-Scissors-Lizard-Spock game!\n";

echo "\nOur today's fighters for your choice!\n";

while ($playAgain === "y") {
    $signs->displaySigns() . PHP_EOL;
    $playerFighter = readline("\nChoose your fighter's number: ");
    $computerFighter = $fighter[rand(0, count($signs->getAllSigns()) - 1)];

    $fight = $fighter[$playerFighter]->beats($computerFighter);

    $result = new $fight;

    echo "\nFIGHT!\n";
    sleep(1);

    echo "\n" . $fighter[$playerFighter]->getName() .
        " VS " .
        $computerFighter->getName() . PHP_EOL;

    if ($result instanceof TieResult) {
        echo "\n" . $result->getMessage() . PHP_EOL;
    } else {
        echo "\nYour fighter, " .
            $fighter[$playerFighter]->getName() .
            $result->getMessage() . PHP_EOL;
    }

    $playAgain = readline("\nPlay again? y/n \n");
}
