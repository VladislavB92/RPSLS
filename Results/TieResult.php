<?php

declare(strict_types=1);

class TieResult implements Result
{
    public function getMessage(): string
    {
        return "It's a tie!";
    }
}
