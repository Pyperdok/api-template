<?php

namespace Src\Domain\Shared\ErrorCodes;

use Src\Domain\Shared\ErrorCode;

enum EmailError implements ErrorCode
{
    case Required;
    case InvalidFormat;
}