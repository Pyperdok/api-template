<?php

namespace Src\Domain\Shared\ErrorCodes;

use Src\Domain\Shared\ErrorCode;

enum PasswordError implements ErrorCode
{
    case Required;
    case TooWeak;
}