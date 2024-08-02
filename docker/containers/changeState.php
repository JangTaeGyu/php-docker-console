<?php

use App\Docker\DockerContainerManager;
use App\Docker\DockerException;
use App\Docker\Request\ChangeContainerStateRequest;

require_once "../../vendor/autoload.php";

$result = ['target' => '/'];

try {
    $dockerContainerManager = new DockerContainerManager();
    $dockerContainerManager->changeState(new ChangeContainerStateRequest($_REQUEST));
} catch (DockerException $e) {
    $result = array_merge($result, ['message' => $e->getMessage()]);
}

echo view('targetLink', $result);