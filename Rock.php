<?php

declare(strict_types=1);

require_once 'SignInterface.php';
require_once 'TieResult.php';
require_once 'WinResult.php';
require_once 'LoseResult.php';

class Rock extends Result implements SignInterface
{
    protected array $beateable = [
        Scissors::class
    ];

    public function beats(SignInterface $element): Result
    {
        if ($this instanceof $element) {
            return new TieResult();
        }

        if (in_array(get_class($element), $this->beateable)) {
            return new WinResult();
        }

        return new LoseResult();
    }
}
