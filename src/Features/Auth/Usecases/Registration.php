<?php

namespace Src\Features\Auth\Usecases;

use Closure;
use Src\Domain\Core\ErrorCodes\UserError;
use Src\Domain\Shared\Result;
use Src\Domain\Shared\VO\Email;
use Src\Domain\Shared\VO\Password;
use Src\Features\Auth\Auth;

class Registration extends Auth {
    public function register(Email $email, Password $password): Closure {
        return fn() => [
            fn() => $this->iEmail->isFree($email) 
            ? Result::success() 
            : Result::error(UserError::EmailAlreadyExists),

            fn() => Result::success(['token' => $this->iUser->register($email, $password)])
        ];
    }
}