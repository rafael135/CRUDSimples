<?php
    namespace Entities;

    use Entities\User;
    use Entities\Database;

    class UserDAO {
        private Database $db;

        public function __construct()
        {
            $this->db = new Database("usuarios");
        }

        public function insertUser($nome, $email) {
            $fields = ["nome", "email"];
            $values = [$nome, $email];

            $result = $this->db->insert($fields, $values);

            if($result == true) {
                return true;
            } else {
                return false;
            }
        }

        public function getUserId($id) {
            $where = "id = $id";

            $result = $this->db->select($where, null, null, "*");

            if($result != false) {
                $queryUsr = $result[0];
                $user = new User($queryUsr["id"], $queryUsr["nome"], $queryUsr["email"]);

                return $user;
            } else {
                return false;
            }

        }

        public function editUserId($id, $name, $email) {
            $where = "id = $id";
            $fields = ["nome", "email"];
            $values = [$name, $email];

            $result = $this->db->update($fields, $values, $where);

            if($result == true) {
                return true;
            } else {
                return false;
            }

        }

        public function getUsers($where = null, $fields = '*') {

            $result = $this->db->select($where, null, null, $fields);

            if($result != false) {
                $users = [];
                foreach($result as $usr) {
                    $user = new User($usr["id"], $usr["nome"], $usr["email"]);
                    $leng = count($users);
                    $users[$leng] = $user;
                }

                return $users;
            } else {
                return false;
            }
        }
    }
?>