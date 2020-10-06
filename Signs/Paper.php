<?php

declare(strict_types=1);

class Paper extends Result implements SignInterface
{
    protected array $beateable = [
        Rock::class
    ]


}