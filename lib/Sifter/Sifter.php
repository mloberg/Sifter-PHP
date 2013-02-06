<?php

namespace Sifter;

class Sifter
{

    public function __construct($host, $token)
    {
        Request::config($host, $token);
    }

    public function projects()
    {
        return new Projects();
    }

}
