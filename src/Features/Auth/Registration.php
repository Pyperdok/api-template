<?php

namespace Src\Auth;

use RegistrationError;

class EmailInterface {
    public function isAvailableEmail() {
        return true;
    }
}

class PasswordInterface {
    public function isGoodPassword($password): RegistrationError {
        return RegistrationError::PasswordTooLong;
    }
}

class Registration {
    public function __construct(private EmailInterface $emailInterface)
    {
        
    }

    public function register(string $email, string $password) {
        $isAvailableEmail = fn() => $email !== 'zhitov.egoriko';
        $isAvailableEmail2 = fn() => $this->emailInterface->isAvailableEmail($email);

        $isGoodPassword = fn() => $this->emailInterface->isAvailableEmail($email);
        
        return [
            $isAvailableEmail,
            $isAvailableEmail2
        ];
    }
}

