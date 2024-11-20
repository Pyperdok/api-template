<?php

class Error implements StatusInterface {
    public function __construct(private $data){}
    
    public function getError() {
        return $this->data;
    }

    public function isError() {
        return true;
    }

    public function isSuccess()
    {
        return false;
    }
}