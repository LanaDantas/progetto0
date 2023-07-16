<?php

namespace crud;

use Exception;
use models\Teatro;
use PDO;
use PDOException;

require "../Connection.php";

class TeatroCRUD
{
    public function create(Teatro $teatro)
    {
        try {
            $query = "INSERT INTO teatri ( COD_TEATRO, NOME, INDIRIZZO, CITTA, PROVINCIA, TELEFONO, POSTI)
            VALUES (:COD_TEATRO,:NOME,:INDIRIZZO,:CITTA,:PROVINCIA,:TELEFONO,:POSTI)";

            $conn = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
            $stmt = $conn->prepare($query);
            $stmt->bindValue(':COD_TEATRO', $teatro->$this->cod_teatro, PDO::PARAM_STR);
            $stmt->bindValue(':NOME', $teatro->$this->nome, PDO::PARAM_STR);
            $stmt->bindValue(':INDIRIZZO', $teatro->$this->indirizzo, PDO::PARAM_STR);
            $stmt->bindValue(':CITTA', $teatro->$this->citta, PDO::PARAM_STR);
            $stmt->bindValue(':PROVINCIA', $teatro->$this->provincia, PDO::PARAM_STR);
            $stmt->bindValue(':TELEFONO', $teatro->$this->telefono, PDO::PARAM_STR);
            $stmt->bindValue(':POSTI', $teatro->$this->posti, PDO::PARAM_INT);

            $stmt->execute();
            return $conn->lastInsertId();
        } catch (PDOException $e) {
            echo 'Erro ao criar registro: ' . $e->getMessage();
        }
    }

    public function read($cod_teatro)
    {
        try {

            if (!is_null($cod_teatro)) {
                $query = "SELECT * FROM teatri WHERE COD_TEATRO = :COD_TEATRO;";

                $conn = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
                $stmt = $conn->prepare($query);
                
                $stmt->bindValue(':COD_TEATRO', $cod_teatro, PDO::PARAM_INT);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_CLASS, Task::class);

                if (count($result) == 1) {
                    return $result[0];
                }
                if (count($result) > 1) {
                    throw new Exception("Chiave primaria duplicata", 1);
                }
                if (count($result) === 0) {
                    return false;
                }
            } else {
                $query = "SELECT * FROM teatri;";

                $conn = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
                $stmt = $conn->prepare($query);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_CLASS, Teatro::class);
                if (count($result) === 0) {
                    return false;
                }
                return $result;
            }
        } catch (PDOException $e) {
            echo 'Erro ao criar registro: ' . $e->getMessage();
        }
    }

    public function update(Teatro $teatro)
    {
        try {
            $query = "UPDATE teatri SET COD_TEATRO = :COD_TEATRO, NOME = :NOME, INDIRIZZO = :INDIRIZZO, 
            CITTA = :CITTA, PROVINCIA = :PROVINCIA, TELEFONO = :TELEFONO, POSTI = :POSTI WHERE COD_TEATRO = :COD_TEATRO;";

            $conn = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
            $stmt = $conn->prepare($query);

            $stmt->bindValue(':COD_TEATRO', $teatro->$this->cod_teatro, PDO::PARAM_STR);
            $stmt->bindValue(':NOME', $teatro->$this->nome, PDO::PARAM_STR);
            $stmt->bindValue(':INDIRIZZO', $teatro->$this->indirizzo, PDO::PARAM_STR);
            $stmt->bindValue(':CITTA', $teatro->$this->citta, PDO::PARAM_STR);
            $stmt->bindValue(':PROVINCIA', $teatro->$this->provincia, PDO::PARAM_STR);
            $stmt->bindValue(':TELEFONO', $teatro->$this->telefono, PDO::PARAM_STR);
            $stmt->bindValue(':POSTI', $teatro->$this->posti, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo 'Erro ao atualizar registro: ' . $e->getMessage();
        }
    }

    public function delete($cod_teatro)
    {
        try {
            $query = "DELETE FROM teatri where COD_TEATRO = :COD_TEATRO";

            $conn = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
            $stmt = $conn->prepare($query);

            $stmt->bindValue(':COD_TEATRO', $cod_teatro, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo 'Erro ao excluir registro: ' . $e->getMessage();
        }
    }
}
