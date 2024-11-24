<?php

namespace Src\Infrastructure\Interfaces;

use Src\Domain\Shared\VO\Email;
use Src\Domain\Shared\VO\Id;
use Src\Domain\Shared\VO\Password;

interface IUserRepository {
    public function addUser(Email $email, Password $password): Id;
    public function getUserToken(Id $userId): string;
    public function existsEmail(Email $email): bool;
}