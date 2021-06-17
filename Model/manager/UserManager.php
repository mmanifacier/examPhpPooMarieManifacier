<?php
    class UserManager extends DbConnection
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function login($username, $password)
        {
            $user = null;
            $res = $this->findUserByUsername($username);
            if ($res) {
                if (password_verify($password, $res->getPassword())) {
                    $user = $res;
                }
            }
            return $user;
        }

        public function findUserByUsername($username)
        {
            $user = null;

            $query = $this->bdd->prepare('SELECT * FROM user WHERE username = :username');
            $query->execute([
                'username' => $username,
            ]);
            $userFromBdd = $query->fetch();

            if ($userFromBdd) {
                $user = new User($userFromBdd['username'], $userFromBdd['password'], $userFromBdd['id']);
            }

            return $user;
        }

        public function testExistsUsername($username)
        {
            $user = $this->findUserByUsername($username);

            $user?$bool =  true : $bool = false;
            
            return $bool;
        }
    }
    
?>