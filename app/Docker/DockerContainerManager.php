<?php

namespace App\Docker;

use App\Docker\Data\ContainerState;
use App\Docker\Data\DockerContainer;
use App\Docker\Request\ChangeContainerStateRequest;

class DockerContainerManager
{
    const string DOCKER_CONTAINER_FETCH_COMMAND = 'docker ps -a --format "{{json .}}"';
    const string DOCKER_CONTAINER_START_COMMAND = 'dockera start %s';
    const string DOCKER_CONTAINER_STOP_COMMAND = 'dockera stop %s';

    /**
     * @return DockerContainer[]
     */
    public function fetch(): array
    {
        $output = shell_exec(self::DOCKER_CONTAINER_FETCH_COMMAND);
        $lines = explode(PHP_EOL, trim($output));
        return array_map([DockerContainerMapper::class, 'toDockerContainer'], $lines);
    }

    private function start(string $containerId): void
    {
        $command = sprintf(self::DOCKER_CONTAINER_START_COMMAND, $containerId);
        $output = shell_exec($command);
        if (is_null($output)) {
            throw new DockerException('Docker container failed to start');
        }
    }

    private function stop(string $containerId): void
    {
        $command = sprintf(self::DOCKER_CONTAINER_STOP_COMMAND, $containerId);
        $output = shell_exec($command);
        if (is_null($output)) {
            throw new DockerException('Docker container failed to stop');
        }
    }

    public function changeState(ChangeContainerStateRequest $request): void
    {
        switch ($request->getContainerState()) {
            case ContainerState::Running:
                $this->start($request->getContainerId());
                break;
            case ContainerState::Exited:
                $this->stop($request->getContainerId());
                break;
        }
    }
}