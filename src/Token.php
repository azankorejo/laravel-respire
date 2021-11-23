<?php

namespace azankorejo\Respire;

class Token extends Expiration
{
    public function __construct()
    {
        $this->type = "token";
    }
}


