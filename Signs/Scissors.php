<?php

declare(strict_types=1);

require_once 'SignInterface.php';
require_once 'Results/TieResult.php';
require_once 'Results/WinResult.php';
require_once 'Results/LoseResult.php';

class Scissors extends ResultEngine implements SignInterface
{

    private string $signName = 'Scissors';

    protected array $beatableSigns = [
        Paper::class
    ];

    public function getName(): string
    {
        return $this->signName;
    }

    public function beats(SignInterface $element): ResultEngine
    {
        if ($this instanceof $element) {
            return new TieResult();
        }

        if (in_array(get_class($element), $this->beatableSigns)) {
            return new WinResult();
        }
        
        return new LoseResult();
    }
}
