<?php

declare(strict_types=1);

class Rock extends Result implements SignInterface
{
    protected array $beateable = [
        Scissors::class
    ];

    public function beats(SignInterface $element): Result
    {
        if ($this instanceof $element) {
            return new WinResult();
        }

        if (in_array(get_class($element), $this->beateable)) {
            return new LoseResult();
        }

        return new TieResult();
    }
}
    

