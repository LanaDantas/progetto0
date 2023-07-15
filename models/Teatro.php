<?php

namespace models;

class Teatro
{
    private $cod_teatro;
    private $nome;
	private $indirizzo;
	private $citta;
	private $provincia;
	private $telefono;
	private $posti;

    public function __construct($cod_teatro, $nome, $indirizzo, $citta, $provincia, $telefono, $posti)
    {
        $this->cod_teatro = $cod_teatro;
        $this->nome = $nome;
        $this->indirizzo = $indirizzo;
        $this->citta = $citta;
        $this->provincia = $provincia;
        $this->telefono = $telefono;
        $this->posti = $posti;
    }

    // Getters e Setters

    public function getCod_teatro()
    {
        return $this->cod_teatro;
    }

    public function setCod_teatro($cod_teatro)
    {
        $this->cod_teatro = $cod_teatro;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getIndirizzo()
    {
        return $this->indirizzo;
    }

    public function setIndirizzo($indirizzo)
    {
        $this->indirizzo = $indirizzo;
    }

    public function getCitta()
    {
        return $this->citta;
    }

    public function setCitta($citta)
    {
        $this->citta = $citta;
    }

    public function getProvincia()
    {
        return $this->provincia;
    }

    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getPosti()
    {
        return $this->posti;
    }

    public function setPosti($posti)
    {
        $this->posti = $posti;
    }
}