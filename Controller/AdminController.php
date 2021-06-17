<?php
class AdminController
{
    public function home()
    {
        if (!empty($_SESSION['user'])) {
            require './View/adminHomePage.php';
        } else {
            header('Location: index.php');
        }
    }

}
?>