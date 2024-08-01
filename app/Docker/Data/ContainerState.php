<?php

namespace App\Docker\Data;

enum ContainerState: string
{
    case Running = 'running';
    case Exited = 'exited';

    public function isExited(): bool
    {
        return $this === self::Exited;
    }
}
