<?php

declare(strict_types=1);

interface SignInterface
{

    public function getName(): string;
    public function beats(SignInterface $sign): ResultEngine;
}
