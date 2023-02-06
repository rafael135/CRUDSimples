<?php
    namespace Entities;

    interface UserDAO {
        public function insertUser($nome, $email);
        public function getUserById($id);
        public function editUserById($id, $name, $email);
        public function getAllUsers($where, $fields);
        public function deleteUserById($id);
    }
?>