<html>

<head>
    <?php
        include './View/parts/head.php';
    ?>
    <link rel="stylesheet" href="./css/style-form.css">
</head>

<?php
    include './View/parts/navbar.php';
?>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">

            <!-- ADDING TEAM FORM: Start -->
            <div id="login">
                <div class="container">
                    <div id="login-row" class="row justify-content-center align-items-center">
                        <div id="login-column" class="col-md-6">
                            <div id="login-box" class="col-md-12">
                                <form id="login-form" class="form" method="post" enctype="multipart/form-data">
                                    <h3 class="text-center text-info">New Moto</h3>
                                    <div class="form-group">
                                        <label for="brand" class="text-info">Brand:</label><br>
                                        <input type="text" name="brand" id="brand" class="form-control"
                                        value="<?php echo((!empty($lastSaisie['brand']))?$lastSaisie['brand']:''); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="model" class="text-info">Model:</label><br>
                                        <input type="text" name="model" id="model" class="form-control"
                                        value="<?php echo((!empty($lastSaisie['model']))?$lastSaisie['model']:''); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="type" class="text-info">Type:</label><br>
                                        <select name="type" id="type">
                                            <option value="">Choose a type option</option>
                                            <?php
                                                foreach($types as $type){
                                                    ?>
                                                        <option value="<?php echo($type->getId()); ?>"><?php echo($type->getName()); ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="text-info">Image:</label><br>
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <br>
                                        <input type="submit" class="btn btn-info btn-md" value="Create">
                                        <?php
                                            if (count($errors) != 0) {
                                                foreach ($errors as $error) {
                                                    echo('<span class=\'mx-5 text-danger\'>'.$error.'</span>');
                                                }
                                            }
                                        ?>
                                        <br><br>
                                        <a href="./index.php" class="text-info">Back to site</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ADDING TEAM FORM: End -->

        </div>
    </div>
</body>

</html>