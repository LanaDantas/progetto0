<?php

namespace models;

class Cliente
{
    private $cod_cliente;
    private $nome;
	private $cognome;
	private $telefono;
	private $email;

    public function __construct($cod_cliente, $nome, $cognome, $telefono, $email)
    {
        $this->cod_cliente = $cod_cliente;
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->telefono = $telefono;
        $this->email = $email;
    }

    // Getters e Setters

    public function getCod_cliente()
    {
        return $this->cod_cliente;
    }

    public function setCod_cliente($cod_cliente)
    {
        $this->cod_cliente = $cod_cliente;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getCognome()
    {
        return $this->cognome;
    }

    public function setCognome($cognome)
    {
        $this->cognome = $cognome;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
}