<?php
    require_once '../../config/connection.php';

    class UserModel {

        private $pdo;
        private $stmt;
        
        public function __construct($pdo) {
            $this->pdo = $pdo;
        }

        public function create(array $data) {
            if ($data) {
                $columns = implode(', ', array_keys($data));
                $values = ':' . implode(', :', array_keys($data));
                $query = "INSERT INTO Usuario ($columns) VALUES ($values)";

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

        public function update(int $id, array $data) {
            if ($data) {
                $columns = implode(', ', array_keys($data));
                $values = ':' . implode(', :', array_keys($data));

                $query = "UPDATE Usuario SET $columns = $values WHERE id = :id";
            }
        }

        public function delete(int $id) {
            $query = 'DELETE FROM usuario WHERE id = :id';
        
            try {
                $this->stmt = $this->pdo->prepare($query);
                $this->stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $this->stmt->execute();
        
                return $this->stmt->rowCount() > 0;
            } catch (PDOException $e) {
                echo "Erro ao excluir usuário: " . $e->getMessage();
                return false;
            }
        }

        public function getAll() {
            $query = 'SELECT * FROM Usuario';

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
    }