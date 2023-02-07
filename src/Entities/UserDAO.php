<?php
    namespace Entities;

    use Entities\User;

    interface UserDAO {
        public function insertUser(User $usr);
        public function getUserById($id);
        public function editUserById(User $user);
        public function getAllUsers($where, $fields);
        public function deleteUserById($id);
    }
?>