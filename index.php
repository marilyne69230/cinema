<?php

use App\Service\PDOService;

include_once __DIR__ . '/vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $listMovie = new PDOService();
    dump($listMovie->findAll());

    ?>

</body>

</html>