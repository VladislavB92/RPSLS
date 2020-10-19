<?php

declare(strict_types=1);

class FightersCollection
{
    private array $fighters = [];

    public function getAllFighters(): array
    {
        return $this->fighters;
    }

    public function addFighter(FighterInterface $fighter)
    {
        $this->fighters[] = $fighter;
    }
}
