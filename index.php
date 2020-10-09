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

$playerFighter = $_GET['fighter'] ?? '0';

$computerFighter = $fighter[rand(0, count($signs->getAllSigns()) - 1)];

$fight = $fighter[$playerFighter]->beats($computerFighter);

$result = new $fight;

?>

<html lang="en">

<head>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPSLS</title>
</head>

<body>
    <div class="header">
        <h1>RPSLS</h1>
    </div>

    <div class="main">

        <div class="fighters">
            <h2>CHOOSE YOUR FIGHTER</h2>

            <form action="/" method="get">

                <input type="submit" id="rock" value="ROCK" />
                <input type="hidden" name="fighter" value="0" />

            </form>

            <form action="/" method="get">

                <input type="submit" id="paper" value="PAPER" />
                <input type="hidden" name="fighter" value="1" />

            </form>

            <form action="/" method="get">

                <input type="submit" id="scissors" value="SCISSORS" />
                <input type="hidden" name="fighter" value="2" />

            </form>

            <form action="/" method="get">

                <input type="submit" id="lizard" value="LIZARD" />
                <input type="hidden" name="fighter" value="3" />

            </form>


            <form action="/" method="get">

                <input type="submit" id="spock" value="SPOCK" />
                <input type="hidden" name="fighter" value="4" />

            </form>

        </div>

        <div class="fightScreen">

            <div class="player1">
                <img src="snippets/<?= strtolower($fighter[$playerFighter]->getName()); ?>.gif">
            </div>

            <div class="vs">
                <p id="vsSign">VS</p>
            </div>

            <div class="cp">
                <img src="snippets/<?= strtolower($computerFighter->getName()); ?>.gif">
            </div>

            <div class="outcome">

                <?php if ($result instanceof TieResult) : ?>
                    <?= $result->getMessage(); ?>
                <?php else : ?>
                <?= $fighter[$playerFighter]->getName() .
                        $result->getMessage();
                endif; ?>

            </div>

        </div>




    </div>


</body>

</html>