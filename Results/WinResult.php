<?php

declare(strict_types=1);

require_once 'Signs/ResultEngine.php';

class WinResult extends ResultEngine
{
    public function getMessage(): string
    {
        return "You win!" . PHP_EOL;
    }
}