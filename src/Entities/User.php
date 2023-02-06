<?php
    namespace Entities;

    class User {
        protected int $id;
        protected string $name;
        protected string $email;

        public function __construct()
        {
            
        }

        public static function getUsers($where = null, $fields = '*') {
            $db = new Database("usuarios");

            $result = $db->select($where, null, null, $fields);

            if($result != false) {
                return $result;
            } else {
                return false;
            }
        }


    }
?>