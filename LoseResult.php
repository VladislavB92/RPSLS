<?php

declare(strict_types=1);

require_once 'Result.php';

class LoseResult extends Result
{
    public function getMessage(): string
    {
        return "You lost!";
    }
}