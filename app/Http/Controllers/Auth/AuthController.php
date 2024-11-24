<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\AuthRegisterRequest;
use Illuminate\Http\JsonResponse;
use Src\Domain\Core\ErrorCodes\UserError;
use Src\Domain\Shared\Result;
use Src\Features\Auth\Usecases\Registration;
use Src\Infrastructure\Pipeline;

class AuthController  {
    public function __construct(
        private Registration $registration
    ) {}

    public function register(AuthRegisterRequest $request) {
        $register = $this->registration->register($request->email, $request->password);
        $result = Pipeline::execute($register());

        return $this->formatResponse($result);
    }

    private function formatResponse(Result $result): JsonResponse
    {
        
        if ($result->isSuccess()) {
            return response()->json([
                'status' => 'success',
                'data' => $result->getData(),
            ]);
        }

        $error = $result->getErrorCode();

        return response()->json([
            'status' => 'error',
            'code' => $this->getErrorMessage($error),
        ], 400);
    }

    private function getErrorMessage($error): string
    {
        return match ($error) {
            UserError::EmailAlreadyExists => 'Email is already in use',

            default => 'An unknown error occurred',
        };
    }
}