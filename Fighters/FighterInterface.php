<?php

declare(strict_types=1);

interface FighterInterface
{
    public function getName(): string;
    public function beats(FighterInterface $fighter): ResultEngine;
}
