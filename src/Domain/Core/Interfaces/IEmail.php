<?php

namespace Src\Domain\Core\Interfaces;

use Src\Domain\Shared\VO\Email;

interface IEmail {
    public function isFree(Email $email): bool;
}