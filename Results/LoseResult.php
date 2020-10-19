<?php

declare(strict_types=1);

require_once 'Fighters/ResultEngine.php';

class LoseResult extends ResultEngine
{
    public function getMessage(): string
    {
        return " lost!" . PHP_EOL;
    }
}
