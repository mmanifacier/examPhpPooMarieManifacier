<html>

<head>
    <?php
        include './View/parts/head.php';
    ?>
</head>
<?php
    include './View/parts/navbar.php';
    include './View/parts/jumbotron.php';
?>

<body>
    <a class="btn btn-info right" href="./index.php?controller=MotoController&action=homePage">Return</a>
    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Model</th>
                    <th scope="col">Type</th>
                    <th scope="col">More</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($motos as $key => $moto) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo($key+1) ?></th>
                                <td><img style="height: 100px;"
                                        src="<?php echo($moto->getImage()) ?>">
                                </td>
                                <td><?php echo($moto->getBrand()) ?></td>
                                <td><?php echo($moto->getModel()) ?></td>
                                <td><?php $type = $this->typeManager->getOne($moto->getType());
                                        echo($type->getName()); ?></td>
                                <td>
                                    <div class="btn-group float-end">
                                        <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="./index.php?controller=MotoController&action=detailMoto&id=<?php echo($moto->getId()); ?>&type=<?php echo($moto->getType()); ?>">View Details</a></li>
                                            <?php 
                                                if (!empty($_SESSION['user'])) {
                                                    ?>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="./index.php?controller=MotoController&action=delete&id=<?php echo($moto->getId()); ?>">Delete</a>
                                                        </li>
                                                    <?php
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>