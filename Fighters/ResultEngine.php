<?php

declare(strict_types=1);

abstract class ResultEngine
{
    public function beats(FighterInterface $fighter): ResultEngine
    {
        if ($this instanceof $fighter) {
            return new TieResult();
        }

        if (in_array(get_class($fighter), $this->beatableFighters)) {
            return new WinResult();
        }

        return new LoseResult();
    }
}
