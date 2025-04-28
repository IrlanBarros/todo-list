<?php

    class Model {

        protected $pdo;
        private $stmt;
        
        public function __construct() {
            $this->pdo = new DataBase()->getConnection();
        }

        public function create(string $table, array $data) {
            if ($data) {
                $columns = implode(', ', array_keys($data));
                $values = ':' . implode(', :', array_keys($data));
                $query = "INSERT INTO $table ($columns) VALUES ($values)";

                try {
                    $this->stmt = $this->pdo->prepare($query);
                    $this->stmt->execute($data);

                    return true;
                } catch(PDOException $e) {
                    echo "Erro ao criar usuário: " . $e->getMessage();
                    return false;
                }
            }
            echo "Nenhum dado fornecido!";
            return false;
        }

        public function update(string $table, int $id, array $data) {
            if ($data) {
                $columns = implode(', ', array_keys($data));
                $values = ':' . implode(', :', array_keys($data));

                $query = "UPDATE $table SET $columns = $values WHERE id = :id";

                try {
                    $this->stmt = $this->pdo->prepare($query);
                    $this->stmt->bindParam(':id', $id, PDO::PARAM_INT);
                    $this->stmt->execute();

                    return true;
                } catch(PDOException $e) {
                    echo "Erro ao atualizar valor: " . $e->getMessage();
                    
                    return false;
                }
            }
        }

        public function delete(string $table, int $id) {
            $query = "DELETE FROM $table WHERE id = :id";
        
            try {
                $this->stmt = $this->pdo->prepare($query);
                $this->stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $this->stmt->execute();
        
                return true;
            } catch (PDOException $e) {
                echo "Erro ao excluir usuário: " . $e->getMessage();
                return false;
            }
        }

        public function getAll(string $table) {
            $query = "SELECT * FROM $table";

            try {
                $this->stmt = $this->pdo->prepare($query);
                $this->stmt->execute();
                $result = $this->stmt->fetchAll();

                return $result;
            } catch(PDOException $e) {
                echo "Erro na consulta: " . $e->getMessage();
                return null;
            }
        }

        public function getById(string $table, int $id) {
            $query = "SELECT * FROM $table WHERE id = $id";

            try {
                $this->stmt = $this->pdo->prepare($query);
                $this->stmt->execute();
                $result = $this->stmt->fetchAll();

                return $result;
            } catch(PDOException $e) {
                echo "Erro na consulta com filtro por id: " . $e->getMessage();
                return null;
            }
        }
    }