<?php

declare(strict_types=1);

class SignsCollection
{
    private array $signs = [];

    public function getAllSigns(): array
    {
        return $this->signs;
    }

    public function addSigns(SignInterface $sign)
    {
        $this->signs[] = $sign;
    }

}
