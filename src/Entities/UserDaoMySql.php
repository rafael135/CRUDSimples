<?php
    namespace Entities;

    use Entities\User;
    use Entities\Database;
    use Entities\UserDAO;

    class UserDaoMySql implements UserDAO {
        private Database $db;

        public function __construct()
        {
            $this->db = new Database("usuarios");
        }

        public function getTableName() {
            return $this->db->getTable();
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

        public function getUserById($id) {
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

        public function editUserById($id, $name, $email) {
            $where = $this->db->getTable() . ".id = $id";
            $fields = ["nome", "email"];
            $values = [$name, $email];

            $result = $this->db->update($fields, $values, $where);

            if($result == true) {
                return true;
            } else {
                return false;
            }

        }

        public function deleteUserById($id) {
            $where = "id = $id";
            $result = $this->db->delete($where);

            return $result;
        }

        public function getAllUsers($where = null, $fields = '*') {

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