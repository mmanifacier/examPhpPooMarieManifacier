<?php
    class TypeManager extends DbConnection
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function getAll()
        {
            $tableTypes = [];

            $query = $this->bdd->prepare('SELECT * FROM type');
            $query->execute();
            $results = $query->fetchAll();

            foreach ($results as $res) {
                $tableTypes[] = new Type($res['name'], $res['id']);
            }
            return $tableTypes;
        }

        public function getOne($id)
        {
            $type = null;
            $query = $this->bdd->prepare('SELECT * FROM type WHERE id = :id');
            $query->execute([
                'id' => $id,
            ]);
            $res = $query->fetch();
            if ($res) {
                $type = new Type($res['name'], $res['id']);
            }
            return $type;
        }
    }
    
?>