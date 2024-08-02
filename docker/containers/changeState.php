<?php

use App\Docker\DockerContainerManager;
use App\Docker\DockerException;
use App\Docker\Request\ChangeContainerStateRequest;

require_once "../../vendor/autoload.php";

try {
    $dockerContainerManager = new DockerContainerManager();
    $dockerContainerManager->changeState(new ChangeContainerStateRequest($_REQUEST));
} catch (DockerException $e) {
    echo $e->getMessage();
}