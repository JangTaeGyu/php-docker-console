<?php

require_once "vendor/autoload.php";

use App\Docker\DockerContainerManager;

$dockerContainerManager = new DockerContainerManager();
$containers = $dockerContainerManager->fetch();

dump($containers);
?>

<?= view('top') ?>

    <main>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Running</th>
                <th scope="col">Size</th>
                <th scope="col">Created At</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($containers as $container): ?>
                <tr>
                    <td><?= $container->getId() ?></td>
                    <td><?= $container->getName() ?></td>
                    <td><?= $container->getRunningFor() ?></td>
                    <td><?= $container->getSize() ?></td>
                    <td><?= $container->getCreatedAt()->format('Y-m-d H:i:s') ?></td>
                    <td><?= $container->getStatus() ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </main>

<?= view('bottom') ?>