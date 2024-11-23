<?php

namespace Src\Domain\Shared\VO;

use Src\Domain\Shared\ErrorCodes\PasswordError;
use Src\Domain\Shared\Result;

class Password
{
    private string $password;

    private function __construct(string $password)
    {
        $this->password = $password;
    }

    public static function create(string $password): Result
    {
        if (strlen($password) < 8) {
            return Result::error(PasswordError::TooWeak);
        }

        return Result::success(new self($password));
    }

    public function getValue(): string
    {
        return bcrypt($this->password);
    }
}