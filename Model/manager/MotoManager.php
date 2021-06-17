<?php
    class MotoManager extends DbConnection
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function getAll()
        {
            $tableMotos = [];

            $query = $this->bdd->prepare('SELECT * FROM moto');
            $query->execute();
            $results = $query->fetchAll();

            foreach ($results as $res) {
                $tableMotos[] = new Moto($res['brand'], $res['model'], $res['type'], $res['image'], $res['id']);
            }
            return $tableMotos;
        }

        public function getAllOrdered()
        {
            $tableMotos = [];

            $query = $this->bdd->prepare('SELECT * FROM moto ORDER BY type');
            $query->execute();
            $results = $query->fetchAll();

            foreach ($results as $res) {
                $tableMotos[] = new Moto($res['brand'], $res['model'], $res['type'], $res['image'], $res['id']);
            }
            return $tableMotos;
        }

        public function getOne($id)
        {
            $moto = null;
            $query = $this->bdd->prepare('SELECT * FROM moto WHERE id = :id');
            $query->execute([
                'id' => $id,
            ]);
            $res = $query->fetch();
            if ($res) {
                $moto = new Moto($res['brand'], $res['model'], $res['type'],  $res['image'], $res['id']);
            }
            return $moto;
        }

        public function create(Moto $moto)
        {
            $query = $this->bdd->prepare('INSERT INTO moto (brand, model, type, image) VALUES (:brand, :model, :type, :image);');
            $query->execute([
                'brand'=> $moto->getBrand(),
                'model'=> $moto->getModel(),
                'type'=> $moto->getType(),
                'image'=> $moto->getImage(),
            ]);
        }

        public function delete(Moto $moto)
        {
            $query = $this->bdd->prepare('DELETE FROM moto WHERE id = :id;');
            $query->execute([
                'id'=> $moto->getId(),
            ]);
        }
    }
    
?>