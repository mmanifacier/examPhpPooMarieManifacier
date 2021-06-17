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

            <!-- LOGIN FORM: Start -->
            <div id="login">
                <div class="container">
                    <div id="login-row" class="row justify-content-center align-items-center">
                        <div id="login-column" class="col-md-6">
                            <div id="login-box" class="col-md-12">
                                <form id="login-form" class="form" method="post">
                                    <h3 class="text-center text-info">Login</h3>
                                    <div class="form-group">
                                        <label for="username" class="text-info">Username:</label><br>
                                        <input type="text" name="username" id="username" class="form-control" 
                                        value="<?php echo((!empty($lastSaisie['username']))?$lastSaisie['username']:''); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="text-info">Password:</label><br>
                                        <input type="text" name="password" id="password" class="form-control"
                                        value="<?php echo((!empty($lastSaisie['password']))?$lastSaisie['password']:''); ?>">
                                    </div>
                                    <div class="form-group">
                                        <br>
                                        <input type="submit" class="btn btn-info btn-md" value="Log In">
                                        <?php
                                            if (count($errors) != 0) {
                                                foreach ($errors as $error) {
                                                    echo('<span class=\'mx-5 text-danger\'>'.$error.'</span>');
                                                }
                                            }
                                        ?>
                                        <br><br>
                                        <a href="./index.php" class="text-info">Back to site</a>
                                        <br><br>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- LOGIN FORM: End -->

            

        </div>
    </div>
</body>

</html>