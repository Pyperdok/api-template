<?php

namespace Src\Domain\Core\ErrorCodes;

use Src\Domain\Shared\ErrorCode;

enum UserError implements ErrorCode
{
    case EmailAlreadyExists;
}