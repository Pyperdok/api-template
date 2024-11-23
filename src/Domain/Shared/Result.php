<?php

namespace Src\Domain\Shared;

abstract class Result
{
    protected function __construct(private mixed $data = null, private ?ErrorCode $errorCode = null) {}

    public static function success(mixed $data = null): Success
    {
        return new Success($data);
    }

    public static function error(ErrorCode $errorCode, mixed $data = null): Error
    {
        return new Error($errorCode, $data);
    }

    public function getData(): mixed
    {
        return $this->data;
    }

    public function getErrorCode(): ?ErrorCode
    {
        return $this->errorCode;
    }

    abstract public function isSuccess(): bool;
}