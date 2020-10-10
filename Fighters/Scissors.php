<?php

declare(strict_types=1);

require_once 'FighterInterface.php';
require_once 'Results/TieResult.php';
require_once 'Results/WinResult.php';
require_once 'Results/LoseResult.php';

class Scissors extends ResultEngine implements FighterInterface
{
    private string $fightersName = 'Scissors';

    protected array $beatableFighters = [
        Paper::class
    ];

    public function getName(): string
    {
        return $this->fightersName;
    }

    public function beats(FighterInterface $fighter): ResultEngine
    {
        if ($this instanceof $fighter) {
            return new TieResult();
        }

        if (in_array(get_class($fighter), $this->beatableFighters)) {
            return new WinResult();
        }

        return new LoseResult();
    }
}
