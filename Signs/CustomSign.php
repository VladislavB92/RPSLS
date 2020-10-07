<?php

declare(strict_types=1);

require_once 'SignInterface.php';
require_once 'Results/TieResult.php';
require_once 'Results/WinResult.php';
require_once 'Results/LoseResult.php';

class CustomSign extends ResultEngine implements SignInterface
{
    private string $signName;
    protected array $beatableSigns = [];

    public function __construct(string $name, array $beatableSigns)
    {
        $this->signName = $name;

        foreach ($beatableSigns as $element) {
            $this->beatableSigns[] = $element;
        }
    }

    public function getName(): string
    {
        return $this->signName;
    }

    // To know which signs can beat
    public function getBeatableSigns()
    {
        return $this->beatableSigns;
    }

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
