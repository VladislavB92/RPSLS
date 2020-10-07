<?php

declare(strict_types=1);

interface SignInterface
{
    public function beats(SignInterface $sign): ResultEngine;
}
