<?php

namespace crud;

use conn\Connection;
use models\Teatro;
use PDO;
use PDOException;

require "../Connection.php";


class TeatroCRUD extends Connection
{
    /* private $conn;

    public function __construct($host, $dbname, $username, $password)
    {
        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Erro na conexão com o banco de dados: ' . $e->getMessage();
        }
    }
 */
    public function create(Teatro $teatro)
    {
        try {
            $query = "INSERT INTO teatri ( COD_TEATRO, NOME, INDIRIZZO, CITTA, PROVINCIA, TELEFONO, POSTI)
            VALUES (:COD_TEATRO,:NOME,:INDIRIZZO,:CITTA,:PROVINCIA,:TELEFONO,:POSTI)
           ";
            $stmt = $this->open()->prepare($query);

            $stmt->bindValue(':COD_TEATRO', $teatro->$this->cod_teatro, PDO::PARAM_STR);
            $stmt->bindValue(':NOME', $teatro->$this->nome, PDO::PARAM_STR);
            $stmt->bindValue(':INDIRIZZO', $teatro->$this->indirizzo, PDO::PARAM_STR);
            $stmt->bindValue(':CITTA', $teatro->$this->citta, PDO::PARAM_STR);
            $stmt->bindValue(':PROVINCIA', $teatro->$this->provincia, PDO::PARAM_STR);
            $stmt->bindValue(':TELEFONO', $teatro->$this->telefono, PDO::PARAM_STR);
            $stmt->bindValue(':POSTI', $teatro->$this->posti, PDO::PARAM_INT);

            $stmt->execute();
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            echo 'Erro ao criar registro: ' . $e->getMessage();
        }
    }

    public function read()
    {
        try {
            $stmt = $this->open()->query("SELECT * FROM teatri");
            $teatri = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $teatro = new Teatro($row['COD_TEATRO'], $row['NOME'], $row['INDIRIZZO'], $row['CITTA'], $row['PROVINCIA'], $row['TELEFONO'], $row['POSTI']);
                $teatri[] = $teatro;
            }
            return $teatri;
        } catch (PDOException $e) {
            echo 'Erro ao ler registros: ' . $e->getMessage();
        }
    }

    public function update(Teatro $teatro)
    {
        try {
            $query = "UPDATE teatri SET COD_TEATRO = :COD_TEATRO, NOME = :NOME, INDIRIZZO = :INDIRIZZO, 
            CITTA = :CITTA, PROVINCIA = :PROVINCIA, TELEFONO = :TELEFONO, POSTI = :POSTI WHERE COD_TEATRO = :COD_TEATRO;";
    
        $stmt = $this->open()->prepare($query);
    
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
            $stmt =  $this->open()->prepare($query);
            $stmt->bindValue(':cod_teatro', $cod_teatro, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo 'Erro ao excluir registro: ' . $e->getMessage();
        }
    }
}
