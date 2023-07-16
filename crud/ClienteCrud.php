<?php

namespace crud;

use Exception;
use models\Cliente;
use PDO;
use PDOException;

class ClienteCRUD
{
    public function create(Cliente $cliente)
    {
        $query = "INSERT INTO clienti ( COD_CLIENTE, NOME, COGNOME, TELEFONO, EMAIL)
            VALUES (:COD_CLIENTE,:NOME,:COGNOME,:TELEFONO,:EMAIL)";

        $conn = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $stmt = $conn->prepare($query);

        $stmt->bindValue(':COD_CLIENTE', $cliente->$this->cod_cliente, PDO::PARAM_INT);
        $stmt->bindValue(':NOME', $cliente->$this->nome, PDO::PARAM_STR);
        $stmt->bindValue(':INDIRIZZO', $cliente->$this->cognome, PDO::PARAM_STR);
        $stmt->bindValue(':TELEFONO', $cliente->$this->telefono, PDO::PARAM_STR);
        $stmt->bindValue(':POSTI', $cliente->$this->email, PDO::PARAM_STR);

        $stmt->execute();
        return $conn->lastInsertId();
    }

    public function read(int $cod_cliente = null)
    {
        $conn = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

        if (!is_null($cod_cliente)) {
            $query = "SELECT * FROM clienti WHERE COD_CLIENTE = :COD_CLIENTE;";
            $stm =  $conn->prepare($query);
            $stm->bindValue(':COD_CLIENTE', $cod_cliente, PDO::PARAM_INT);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_CLASS, Task::class);

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
            $query = "SELECT * FROM clienti;";
            $stm =  $conn->prepare($query);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_CLASS, Cliente::class);
            if (count($result) === 0) {
                return false;
            }
            return $result;
        }
    }

    public function update(Cliente $cliente)
    {
        $query = "UPDATE cliente SET COD_CLIENTE = :COD_CLIENTE, NOME = :NOME, COGNOME = :COGNOME, 
            TELEFONO = :TELEFONO, EMAIL = :EMAIL WHERE COD_CLIENTE = :COD_CLIENTE;";

        $conn = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $stmt = $conn->prepare($query);

        $stmt->bindValue(':COD_CLIENTE', $cliente->$this->cod_cliente, PDO::PARAM_INT);
        $stmt->bindValue(':NOME', $cliente->$this->nome, PDO::PARAM_STR);
        $stmt->bindValue(':INDIRIZZO', $cliente->$this->cognome, PDO::PARAM_STR);
        $stmt->bindValue(':TELEFONO', $cliente->$this->telefono, PDO::PARAM_STR);
        $stmt->bindValue(':POSTI', $cliente->$this->email, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->rowCount();
    }

    public function delete($cod_cliente)
    {
        $query = "DELETE FROM clienti where COD_CLIENTE = :COD_CLIENTE";

        $conn = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $stmt =  $conn->prepare($query);

        $stmt->bindValue(':COD_CLIENTE', $cod_cliente, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount();
    }
}
