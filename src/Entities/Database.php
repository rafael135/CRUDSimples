<?php
    namespace Entities;

    use PDO;
    use PDOException;

    class Database {
        private $dbName = "crudSimples";
        private $user = "root";
        private $password = "";
        private $host = "localhost";

        private PDO $pdo;
        private string $table;

        public function __construct($tableName)
        {
            $this->pdo = new PDO("mysql:dbname=$this->dbName;host=$this->host", $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->table = $tableName;
        }

        public function getTable() {
            return $this->table;
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
                $queryStr = "INSERT INTO " . $this->table . " (" . implode(",", $fields) . ") VALUES ('" . implode("','", $values) . "')";
            } else {
                $queryStr = "INSERT INTO " . $this->table . "($fields) VALUES ($values)";
            }
            try {
                $sql = $this->pdo->prepare($queryStr);
                $result = $sql->execute();

                return $result;
            }
            catch(PDOException $e) {
                return $e;
            }
        }

        public function update($fields = null,$values = null, $where = null) {

            $queryStr = "UPDATE $this->table SET ";

            $where = strlen($where) ? " WHERE " . $where : '';

            if(is_array($fields)) {
                
                for($i = 0; $i < count($fields); $i++) {
                    $queryStr .= $fields[$i] . " = '" . $values[$i] . "'";
                    if(($i + 1) < count($fields)) {
                        $queryStr .= ", ";
                    }
                    
                }
                
            } else {
                $queryStr .= "$fields = '$values'";
            }

            $queryStr .= $where;

            try {
                $sql = $this->pdo->prepare($queryStr);
                $result = $sql->execute();
                
                return $result;
            }
            catch(PDOException $e) {
                return $e;
            }


            
        }

        public function delete($where) {
            $where = strlen($where) ? " WHERE " . $where : "";

            if($where === "") {
                return false;
            }

            $queryStr = "DELETE FROM $this->table" . $where;

            try {
                $sql = $this->pdo->prepare($queryStr);
                $result = $sql->execute();
                return $result;
            }
            catch(PDOException $e) {
                return $e;
            }
            
        }

    }
?>