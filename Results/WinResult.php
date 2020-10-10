<?php

declare(strict_types=1);

require_once 'Fighters/ResultEngine.php';

class WinResult extends ResultEngine
{
    public function getMessage(): string
    {
        return " won!" . PHP_EOL;
    }
}
