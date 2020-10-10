<?php

declare(strict_types=1);

require_once 'FighterInterface.php';
require_once 'Results/TieResult.php';
require_once 'Results/WinResult.php';
require_once 'Results/LoseResult.php';

class Rock extends ResultEngine implements FighterInterface
{
    private string $fightersName = 'Rock';

    protected array $beatableFighters = [
        Scissors::class
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
