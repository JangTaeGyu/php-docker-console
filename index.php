<?php

require_once "vendor/autoload.php";

use App\Docker\DockerContainerManager;

$dockerContainerManager = new DockerContainerManager();
$containers = $dockerContainerManager->fetch();

foreach ($containers as $container) {
//    dump($container);
}
?>

<?= view('top') ?>