<?php

declare(strict_types=1);

class Scissors extends Result implements SignInterface
{

    protected array $beateable = [
        Paper::class
    ];

    // In one function
    

}