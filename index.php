<?php

require_once "vendor/autoload.php";

use App\Docker\Data\ContainerState;
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
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($containers as $container): ?>
                <tr class="<?= $container->getState()->isExited() ? 'table-secondary' : '' ?>">
                    <td><?= $container->getId() ?></td>
                    <td><?= $container->getName() ?></td>
                    <td><?= $container->getRunningFor() ?></td>
                    <td><?= $container->getSize() ?></td>
                    <td>
                        <?= $container->getCreatedAt()->format('Y-m-d') ?>
                        <small class="d-block"><?= $container->getCreatedAt()->format('H:i:s') ?></small>
                    </td>
                    <td><?= $container->getStatus() ?></td>
                    <td>
                        <?php if ($container->getState()->isExited()): ?>
                            <button class="btn btn-sm btn-primary" onclick="onStart('<?= $container->getId() ?>')">
                                Start
                            </button>
                        <?php else: ?>
                            <button class="btn btn-sm btn-danger" onclick="onStop('<?= $container->getId() ?>')">
                                Stop
                            </button>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <script type="text/javascript">
        function changeState(containerId, toState) {
            console.log(containerId, toState)
        }

        function onStart(containerId) {
            changeState(containerId, '<?= ContainerState::Running->value ?>')
        }

        function onStop(containerId) {
            changeState(containerId, '<?= ContainerState::Exited->value ?>')
        }
    </script>

<?= view('bottom') ?>