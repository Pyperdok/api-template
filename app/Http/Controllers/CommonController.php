<?php

namespace App\Http\Controllers;

use Src\Auth\Registration;


class FunctionMonad
{
    private $functions;

    // Конструктор инициализирует пустой массив функций
    private function __construct(array $functions = [])
    {
        $this->functions = $functions;
    }

    // Создать пустую монаду
    public static function create()
    {
        return new self();
    }

    // Добавить функцию в цепочку
    public function bind(callable $fn)
    {
        $newFunctions = $this->functions;
        $newFunctions[] = $fn;
        return new self($newFunctions);
    }

    // Запустить последовательность функций с исходным значением
    public function run()
    {
        $result = null;
        foreach ($this->functions as $fn) {
            $result = $fn($result);
        }
        return $result;
    }
}

class CommonController extends Controller {
    public function __construct(private Registration $registration) {}

    public function register() {
        // $email = $request->email;
        // $password = $request->password;
        $useCase = $this->registration->register('', '');

        return $this->execute($useCase);
    }
}
