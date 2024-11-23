<?php

namespace Src\Infrastructure;

use Closure;
use Src\Domain\Shared\Result;

class LazyClosure
{
    private bool $executed = false;
    private mixed $result = null;

    public function __construct(private Closure $closure)
    {
        $this->closure = $closure;
    }

    public function __invoke(Result $input): mixed
    {
        if (!$this->executed) {
            $this->result = ($this->closure)($input);
            $this->executed = true;
        }

        return $this->result;
    }
}