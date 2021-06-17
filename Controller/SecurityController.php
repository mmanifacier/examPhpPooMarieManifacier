<?php
class SecurityController
{
    private $userManager; 

    public function __construct()
    {
        $this->userManager = new userManager();
    }

    public function login()
    {
        $errors = [];
        $lastSaisie = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['username'])) {
                $errors[] = 'Veuillez entrer un nom d\'utilisateur.';
            } else {
                $lastSaisie['username'] = $_POST['username'];
            }
            if (empty($_POST['password'])) {
                $errors[] = 'Veuillez entrer un mot de passe.';
            } else {
                $lastSaisie['password'] = $_POST['password'];
            }

            if (count($errors) == 0) { 
                $loggedUser = $this->userManager->login($_POST['username'], $_POST['password']);
                if ($loggedUser) {
                    $_SESSION['user'] = serialize($loggedUser);
                    header('Location: ./index.php?controller=MotoController&action=homePage');
                } else {
                    $errors[] = 'Identifiants incorrects.';
                }
            }
        }
        require './View/loginPage.php';
    }

    public function logout()
    {
        $_SESSION['user'] = '';
        session_destroy();
        header('Location: ./index.php');
    }
}

?>
