<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/main.css">
    <title><?= $title ?></title>
</head>

<body>
    <?php if ($_SESSION && $_SESSION['alert']['status']) : ?>
        <div class="alert success-alert">
            <h3><?=$_SESSION['alert']['message']?></h3>
        </div>
    <?php elseif ($_SESSION && !$_SESSION['alert']['status']) : ?>
        <div class="alert danger-alert">
            <h3><?=$_SESSION['alert']['message']?></h3>
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['alert']); ?>


    <div class="container">
        <?php
        echo $content;
        ?>
    </div>
</body>

</html>