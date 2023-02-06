<?php
    namespace Entities;

    use PDO;

    class Database {
        private $dbName = "crudSimples";
        private $user = "root";
        private $password = "";
        private $host = "localhost";

        public $pdo;
        public string $table;

        public function __construct()
        {
            $pdo = new PDO("mysql:dbname=$this->dbName;host=$this->host", $this->user, $this->password);
        }

        public function setTable($tableName) {
            $this->table = $tableName;
        }

    }
?>