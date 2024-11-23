<?php

namespace Src\Domain\Shared\VO;

use Src\Domain\Shared\ErrorCodes\EmailError;
use Src\Domain\Shared\Result;

class Email
{
    private string $email;

    private function __construct(string $email)
    {
        $this->email = $email;
    }

    public static function create(string $email): Result
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return Result::error(EmailError::InvalidFormat);
        }

        return Result::success(new self($email));
    }

    public function getValue(): string
    {
        return $this->email;
    }
}