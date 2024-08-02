<?php

namespace App\Docker\Request;

use App\Docker\Data\ContainerState;

class ChangeContainerStateRequest
{
    private string $containerId;
    private ContainerState $containerState;

    public function __construct(array $request)
    {
        $this->containerId = array_get($request, 'containerId');
        $this->containerState = ContainerState::from(array_get($request, 'containerState'));
    }

    public function getContainerId(): string
    {
        return $this->containerId;
    }

    public function getContainerState(): ContainerState
    {
        return $this->containerState;
    }
}