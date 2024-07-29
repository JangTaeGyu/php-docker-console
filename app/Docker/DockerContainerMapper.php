<?php

namespace App\Docker;

use App\Docker\Data\DockerContainer;

class DockerContainerMapper
{
    public static function toDockerContainer(string $lines): DockerContainer
    {
        $data = json_decode($lines, true);
        return new DockerContainer(
            array_get($data, 'ID', ''),
            array_get($data, 'Image', ''),
            array_get($data, 'Names', ''),
            array_get($data, 'Command', ''),
            array_get($data, 'Networks', ''),
            array_get($data, 'Mounts', ''),
            array_get($data, 'Ports', ''),
            array_get($data, 'CreatedAt', ''),
            array_get($data, 'RunningFor', ''),
            array_get($data, 'Size', ''),
            array_get($data, 'State', ''),
            array_get($data, 'Status', ''),
        );
    }
}