<?php

class UseCase {
    private static function error(Error $error) {
        $response = self::getErrorResponse($error);
        return response()->json($response['data'], $response['status'], $response['headers'], $response['options']);
    }

    private static function success(Success $success) {
        $response = self::getSuccessResponse($success);
        return response()->json($response['data'], $response['status'], $response['headers'], $response['options']);
    }

    public static getSuccessResponse(Success $success) {
        $code = $success->getCode();
        return 
    }
    
    public static function execute($useCase): Success|Error {
    
        $status = null;
        foreach ($useCase as $step) {
            /** @var Success|Error $status */
            $status = $step();
    
            if ($status->isError()) {
                return error($status);
            }
        }
    
        return success($status);
    }
}