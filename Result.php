<?php

declare(strict_types=1);

abstract class Result
{
    public function beats(SignInterface $element): Result
    {
        if ($this instanceof $element) {
            return new TieResult();
        }

        if (in_array(get_class($element), $this->beateable)) {
            return new WinResult();
        }
        return new LoseResult();
    }
}