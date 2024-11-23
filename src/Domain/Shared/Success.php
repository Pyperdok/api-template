<?php

namespace Src\Domain\Shared;

class Success extends Result
{
    public function __construct(mixed $data = null)
    {
        parent::__construct($data);
    }

    public function isSuccess(): bool
    {
        return true;
    }
}