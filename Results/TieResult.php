<?php

declare(strict_types=1);

require_once 'Fighters/ResultEngine.php';

class TieResult extends ResultEngine
{
    public static function getMessage(): string
    {
        return "It's a tie!" . PHP_EOL;
    }
}
