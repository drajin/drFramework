<?php

    namespace app\core;

    use PDO;

    class Database {

        //public \PDO $pdo;
        public string $statement;
        private $dbh;
        //private $stmt;
        private $error;

        private $host;
        private $user;
        private $pass;
        private $dbname;

        public function __construct(array $config)
        {

            $this->host = $config['host'] ?? '';
            $this->dbname = $config['dbname'] ?? '';
            $this->user = $config['user'] ?? '';
            $this->pass = $config['pass'] ?? '';
            // Set DSN
//            $dsn = 'mysql:host=' . $host. ';dbname=' . $dbname;
//
//
//
//            $this->pdo = new \PDO($dsn, $user, $password);
//            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);



            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            // Create PDO instance
            try{
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            } catch(PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }

        }

        // Prepare statement with query
        public function query($sql)
        {
            $this->stmt = $this->dbh->prepare($sql);
        }

        // Bind values
        public function bind($param, $value, $type = null)
        {
            if(is_null($type)){
                switch(true){
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
            }

            $this->stmt->bindValue($param, $value, $type);
        }

        // Execute the prepared statement
        public function execute()
        {
            return $this->stmt->execute();
        }

        // Get result set as array of objects
        public function resultSet()
        {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        // Get single record as object
        public function single()
        {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        // Get row count
        public function rowCount(){
            return $this->stmt->rowCount();
        }



    }