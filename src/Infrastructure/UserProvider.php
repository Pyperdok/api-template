<?php

namespace Src\Infrastructure;

use Src\Domain\Core\Interfaces\IUser;
use Src\Domain\Shared\VO\Email;
use Src\Domain\Shared\VO\Password;
use Src\Infrastructure\Interfaces\IUserRepository;

class UserProvider implements IUser {
    public function __construct(
        private IUserRepository $iUserRepository
    ) {}

    public function register(Email $email, Password $password): string
    {
        $userId = $this->iUserRepository->addUser($email, $password);

        return $this->iUserRepository->getUserToken($userId);
    }
}