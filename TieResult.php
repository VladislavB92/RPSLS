<?php

declare(strict_types=1);

require_once 'Result.php';

class TieResult extends Result
{
    public static function getMessage(): string
    {
        return "It's a tie!";
    }
}
