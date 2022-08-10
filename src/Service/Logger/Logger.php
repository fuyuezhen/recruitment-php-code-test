<?php

namespace App\Service\Logger;

interface Logger{
    public function info();
    
    public function debug();

    public function error();
}