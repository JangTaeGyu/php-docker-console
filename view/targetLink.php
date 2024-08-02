<!doctype html>
<html lang="kr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<script type="text/javascript">
    <?php if (!empty($message)): ?>
    alert('<?= $message ?>')
    <?php endif; ?>

    document.location.href = '<?= $target ?>';
</script>
</body>
</html>
