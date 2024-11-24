<?php

namespace Src\Infrastructure;

use Src\Domain\Core\Interfaces\IEmail;
use Src\Domain\Shared\VO\Email;
use Src\Infrastructure\Interfaces\IUserRepository;

class EmailProvider implements IEmail {
    public function __construct(
        private IUserRepository $iUserRepository
    ) {}

    public function isFree(Email $email): bool
    {
        return !$this->iUserRepository->existsEmail($email);
    }
}