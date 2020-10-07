<?php

declare(strict_types=1);

require_once 'SignInterface.php';
require_once 'Results/TieResult.php';
require_once 'Results/WinResult.php';
require_once 'Results/LoseResult.php';

class Paper extends ResultEngine implements SignInterface
{
    protected array $beateable = [
        Rock::class
    ];

    public function beats(SignInterface $element): ResultEngine
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
