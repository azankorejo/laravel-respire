<?php

use azankorejo\Respire\Expiration;

class Password extends Expiration {

    public function __construct()
    {
        $this->type = 'password';
    }
}