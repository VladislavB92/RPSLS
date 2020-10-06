<?php

declare(strict_types=1);

class WinResult implements Result
{
    public function getMessage(): string
    {
        return "You win!";
    }
}