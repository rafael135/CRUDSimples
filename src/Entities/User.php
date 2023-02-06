<?php
    namespace Entities;

    class User {
        protected int $id;
        protected string $name;
        protected string $email;

        public function __construct($id, $name, $email)
        {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }


    }
?>