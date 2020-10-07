<?php

declare(strict_types=1);

require_once 'Signs/ResultEngine.php';

class LoseResult extends ResultEngine
{
    public function getMessage(): string
    {
        return "You lost!" . PHP_EOL;
    }
}