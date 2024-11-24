<?php

namespace Src\Domain\Core\Interfaces;

use Src\Domain\Shared\VO\Email;
use Src\Domain\Shared\VO\Password;

interface IUser {
    public function register(Email $email, Password $password): string;
}