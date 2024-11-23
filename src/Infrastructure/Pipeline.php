<?php

namespace Src\Infrastructure;

use Src\Domain\Shared\Result;

class Pipeline
{
    public static function execute(array $steps, Result $initialResult): Result
    {
        $currentResult = $initialResult;

        foreach ($steps as $step) {
            $currentResult = $step($currentResult);

            if (!$currentResult->isSuccess()) {
                return $currentResult;
            }
        }

        return $currentResult;
    }
}