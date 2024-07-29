<?php

namespace App\Docker;

use App\Docker\Data\DockerContainer;

class DockerContainerManager
{
    const string DOCKER_FETCH_COMMAND = 'docker ps -a --format "{{json .}}"';

    /**
     * @return DockerContainer[]
     */
    public function fetch(): array {
        $output = shell_exec(self::DOCKER_FETCH_COMMAND);
        $lines = explode(PHP_EOL, trim($output));
        return array_map([DockerContainerMapper::class, 'toDockerContainer'], $lines);
    }
}