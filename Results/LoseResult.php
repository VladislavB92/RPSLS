<?php

declare(strict_types=1);

class LoseResult implements Result
{
    public function getMessage(): string
    {
        return "You lost!";
    }
}