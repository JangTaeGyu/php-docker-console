<?php

namespace App\Docker;

class DockerException extends \RuntimeException
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}