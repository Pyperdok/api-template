<?php

class Success implements StatusInterface {
    public function __construct(private $data, private $event){}

    public function getData() {
        return $this->data;
    }

    public function isError() {
        return false;
    }

    public function isSuccess()
    {
        return true;
    }
}