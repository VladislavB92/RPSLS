<?php

declare(strict_types=1);

require_once 'Fighters/FightersCollection.php';
require_once 'Fighters/Rock.php';
require_once 'Fighters/Paper.php';
require_once 'Fighters/Scissors.php';
require_once 'Fighters/Spock.php';
require_once 'Fighters/Lizard.php';

$fighters = new FightersCollection();
$fighters->addFighter(new Rock(["Scissors", "Lizard"]));
$fighters->addFighter(new Paper(["Rock", "Spock"]));
$fighters->addFighter(new Scissors(["Paper", "Lizard"]));
$fighters->addFighter(new Lizard(['Spock', 'Paper']));
$fighters->addFighter(new Spock(['Scissors', 'Rock']));
$fighter = $fighters->getAllFighters();

$playerFighter = $_GET['fighter'] ?? '0';

$computerFighter = $fighter[rand(0, count($fighters->getAllFighters()) - 1)];
$fight = $fighter[$playerFighter]->beats($computerFighter);
$result = new $fight;

?>

<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MF: RPSLS</title>
</head>

<body>
    <div class="header">
        <h1>Mortal Fight: RPSLS edition</h1>
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
                <?php if (!isset($_GET['fighter'])) : ?>
                    <img id="vsimage" src="snippets/rules.jpg">
                <?php else : ?>
                    <img id="vsimage" src="snippets/<?= strtolower($fighter[$playerFighter]->getName()); ?>.gif">
                <?php endif; ?>
            </div>

            <div class="vs">
                <p id="vsSign">VS</p>
            </div>

            <div class="cp">
                <?php if (!isset($_GET['fighter'])) : ?>
                    <img id="vsimage" src="snippets/rules.jpg">
                <?php else : ?>
                    <img id="vsimage" src="snippets/<?= strtolower($computerFighter->getName()); ?>.gif">
                <?php endif; ?>
            </div>

            <div class="outcome">
                <?php if (!isset($_GET['fighter'])) : ?>
                    Read rules and choose a fighter
                <?php elseif ($result instanceof TieResult) : ?>
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