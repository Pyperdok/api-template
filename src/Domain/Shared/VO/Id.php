<?php

namespace Src\Domain\Shared\VO;

use Src\Domain\Shared\ErrorCodes\IdError;
use Src\Domain\Shared\Result;

class Id
{
    private int $id;

    private function __construct(int $id)
    {
        $this->id = $id;
    }

    public static function create(int $id): Result
    {
        if ($id <= 0) {
            return Result::error(IdError::InvalidFormat);
        }

        return Result::success(new self($id));
    }

    public function getValue(): int
    {
        return $this->id;
    }
}