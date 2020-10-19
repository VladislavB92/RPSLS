<?php

declare(strict_types=1);

require_once 'FighterInterface.php';
require_once 'Results/TieResult.php';
require_once 'Results/WinResult.php';
require_once 'Results/LoseResult.php';

class Lizard extends ResultEngine implements FighterInterface
{
    private string $fightersName = "Lizard";
    protected array $beatableFighters = [];

    public function __construct(array $beatableFighters)
    {
        foreach ($beatableFighters as $fighter) {
            $this->beatableFighters[] = $fighter;
        }
    }

    public function getName(): string
    {
        return $this->fightersName;
    }

    // To know which fighters can be beaten
    public function getBeatableFighters()
    {
        return $this->beatableFighters;
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
