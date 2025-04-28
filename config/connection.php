<?php

    class DataBase {
        private $user = 'irlanbarros';
        private $pass = 'senhapostgrestemp';
        private $host = 'localhost';
        private $db_name = 'todolist';
        public $connect;
    
        public function getConnection() {
            $this->connect = null;
            try {
                $this->connect = new PDO("pgsql:host=$this->host;dbname=$this->db_name", $this->user, $this->pass);
                $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                // echo "Ok!";
            } catch (PDOException $e) {
                die("Erro na conexão: " . $e->getMessage());
            }
            return $this->connect;
        }
    }
