<?php
class MotoController
{
    private $motoManager;
    private $typeManager;

    public function __construct()
    {
        $this->motoManager = new MotoManager();
        $this->typeManager = new TypeManager();
    }

    public function homePage()
    {
        $motos = $this->motoManager->getAll();
        $types = $this->typeManager->getAll();
        require './View/homePage.php';
    }

    public function orderByType()
    {
        $motos = $this->motoManager->getAllOrdered();
        $types = $this->typeManager->getAll();
        require './View/orderPage.php';

    }
    
    public function detailMoto()
    {
        $type = $this->typeManager->getOne($_GET['type']);
        $moto = $this->motoManager->getOne($_GET['id']);
        require './View/detailMotoPage.php';
    }

    public function addMoto()
    {
        if (!empty($_SESSION['user'])) {
            $types = $this->typeManager->getAll();

            $errors = [];
            $authorizedFiles = ['image/png', 'image/jpeg'];
            $newId = uniqid();
            $imageLink = '';
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (empty($_POST['brand'])) {
                    $errors[] = 'Veuillez entrer une marque.';
                } else {
                    $lastSaisie['brand'] = $_POST['brand'];
                }
                if (empty($_POST['model'])) {
                    $errors[] = 'Veuillez entrer un modèle.';
                } else {
                    $lastSaisie['model'] = $_POST['model'];
                }
                if (empty($_POST['type'])) {
                    $errors[] = 'Veuillez entrer un type.';
                }
                if (!empty($_FILES['image']) && $_FILES['image']['size'] != 0) {
                    if (in_array($_FILES['image']['type'], $authorizedFiles)) {
                        if ($_FILES['image']['size'] <= 300000) {
                            $imageLink = './View/uploads/'.$newId.$_FILES['image']['name'];
                            move_uploaded_file($_FILES['image']['tmp_name'], $imageLink);
                        } else {
                            $errors[] = 'Le fichier est trop volumineux.';
                        }
                    } else {
                        $errors[] = 'Le type du fichier n\'est pas supporté.';
                    }
                } else {
                    $errors[] = 'Veuillez insérer une image.';
                }
                
                if (count($errors) == 0) {
                    $moto = new Moto($_POST['brand'], $_POST['model'], $_POST['type'], $imageLink);
                    
                    $this->motoManager->create($moto);
                    
                    header("Location: ./index.php");
                }
            }
            require './View/newMoto.php';
        } else {
            header('Location: ./index.php');
        }
    }

    public function delete(){
        if (!empty($_SESSION['user'])) {
            $moto = $this->motoManager->getOne($_GET['id']);
    
            if($moto != null) {
                $this->motoManager->delete($moto);
                    header("Location: ./index.php");
            } else {
                throw new Exception("Error Processing Request", 1);
            }
        }
    }

}
?>
