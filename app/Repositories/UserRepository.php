<?php

namespace App\Repositories;

use App\Models\User as ModelUser;
use Illuminate\Support\Facades\DB;
use Src\Domain\Shared\VO\Email;
use Src\Domain\Shared\VO\Password;
use Src\Domain\Shared\VO\Id;
use Src\Infrastructure\Interfaces\IUserRepository;

class UserRepository implements IUserRepository {
    public function addUser(Email $email, Password $password): Id
    {
        $user = new ModelUser();
        $user->email = $email->getValue();
        $user->password = $password->getValue();
        $user->save();

        return Id::create($user->id)->getData();
    }

    public function existsEmail(Email $email): bool {
        return ModelUser::where('email', $email->getValue())->exists();
    }

    public function getUserToken(Id $userId): string
    {
        return 'Hello World Token: '. $userId->getValue();
    }
}