<html>

<head>
    <?php
        include './View/parts/head.php';
    ?>
</head>
<?php
    include './View/parts/navbar.php';
?>

<body>
    <div>
        <h2>Détails de la moto <?php echo(' '.$moto->getBrand().' '.$moto->getModel()); ?></h2>
    </div>
    <div class="container">
        <img style="max-height: 200px;" src="<?php echo($moto->getImage()); ?>" alt="">
        <br>
        <p><?php echo($moto->getBrand()); ?></p>
        <p><?php echo($moto->getModel()); ?></p>
        <p><?php echo($type->getName()); ?></p>
    </div>
</body>

</html>
