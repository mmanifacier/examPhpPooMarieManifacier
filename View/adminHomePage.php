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
    <h2>Welcome <?php $user = unserialize($_SESSION['user']);
                    echo($user->getUsername()) ?></h2>

    <div class="container">
        <div class="row">
            <div class="col">
                <a href="./index.php?controller=MotoController&action=addMoto" class="btn btn-info">Create new moto</a>
            </div>
        </div>
    </div>

</body>

</html>