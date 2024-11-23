<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Src\Domain\Shared\Error;
use Src\Domain\Shared\ErrorCodes\EmailError;
use Src\Domain\Shared\ErrorCodes\PasswordError;
use Src\Domain\Shared\VO\Email;
use Src\Domain\Shared\VO\Password;

class AuthRegisterRequest extends FormRequest
{

    public readonly Email $email;
    public readonly Password $password;

    public function authorize(): bool
    {
        return true;
    }

    protected function passedValidation(): void
    {
        $email = $this->input('email');

        if (is_null($email)) {
            $this->handleError(new Error(EmailError::Required));
        }

        $emailResult = Email::create($email);

        if (!$emailResult->isSuccess()) {
            $this->handleError($emailResult);
        }

        $password = $this->input('password');

        if (is_null($password)) {
            $this->handleError(new Error(PasswordError::Required));
        }

        $passwordResult = Password::create($password);

        if (!$passwordResult->isSuccess()) {
            $this->handleError($passwordResult);
        }
        
        $this->email = $emailResult->getData();
        $this->password = $passwordResult->getData();
    }

    private function handleError(Error $errorResult): void
    {
        $errorCode = $errorResult->getErrorCode();

        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'message' => $this->getErrorMessage($errorCode),
        ], 422));
    }

    private function getErrorMessage($error): string
    {
        return match ($error) {
            EmailError::Required => 'Email is required',
            EmailError::InvalidFormat => 'Email has invalid format',

            PasswordError::Required => 'Password is required',
            PasswordError::TooWeak => 'Password is too weak',

            default => 'An unknown error occurred',
        };
    }
}
