<?php

namespace Src\Domain\Shared;

class Error extends Result
{
    public function __construct(ErrorCode $errorCode)
    {
        parent::__construct(null, $errorCode);
    }

    public function isSuccess(): bool
    {
        return false;
    }
}