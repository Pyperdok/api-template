<?php

namespace Src\Domain\Shared\ErrorCodes;

use Src\Domain\Shared\ErrorCode;

enum IdError implements ErrorCode
{
    case InvalidFormat;
}