<?php

declare(strict_types=1);

abstract class ResultEngine
{
    public function beats(SignInterface $element): ResultEngine
    {
        if ($this instanceof $element) {
            return new TieResult();
        }

        if (in_array(get_class($element), $this->beatableSigns)) {
            return new WinResult();
        }

        return new LoseResult();
    }
}
