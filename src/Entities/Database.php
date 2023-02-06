<?php
    namespace Entities;

    use PDO;

    class Database {
        private $dbName = "crudSimples";
        private $user = "root";
        private $password = "";
        private $host = "localhost";

        protected PDO $pdo;
        protected string $table;

        public function __construct($tableName)
        {
            $this->pdo = new PDO("mysql:dbname=$this->dbName;host=$this->host", $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->table = $tableName;
        }

        public function setTable($tableName) {
            $this->table = $tableName;
        }

        public function select($where = null, $order = null, $limit = null, $fields = null) {
            $where = strlen($where) ? " WHERE " . $where : '';


            $queryStr = "";
            if(is_array($fields) == true){
                $queryStr = "SELECT " . implode(",", $fields) . " FROM " . $this->table . " " . $where;
            } else {
                $queryStr = "SELECT $fields FROM " . $this->table . $where;
            }

            $sql = $this->pdo->query($queryStr);

            if($sql->rowCount() > 0) {
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return false;
            }
        }

        public function insert($fields = null, $values = null) {
            $queryStr = "";

            if(is_array($fields) == true && is_array($values) == true) {
                $queryStr = "INSERT INTO " . $this->table . " (" . implode(",", $fields) . ") VALUES (" . implode(",", $values) . ")";
            } else {
                $queryStr = "INSERT INTO " . $this->table . "($fields) VALUES ($values)";
            }

            $sql = $this->pdo->prepare($queryStr);
            $sql->execute();

            
        }

    }
?>