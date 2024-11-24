<?php

namespace Src\Features\Auth;

use Src\Domain\Core\Interfaces\IEmail;
use Src\Domain\Core\Interfaces\IUser;

abstract class Auth {
    public function __construct(
        protected IEmail $iEmail,
        protected IUser $iUser,
    ) {}
}
