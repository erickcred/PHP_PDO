<?php

class Servico
{
    private $id;
    private $dataEntrada;
    private $dataEntrega;
    private $nomeEmpresa;
    private $numeroNota;
    private $numeroPedido;
    private $descricao;
    private $quantidade;
    private $valorUnitario;
    private $total;

    private $table = "servico";

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getDataEntrada()
    {
        return $this->dataEntrada;
    }

    public function setDataEntrada($dataEntrada)
    {
        $this->dataEntrada = $dataEntrada;
        return $this;
    }

    public function getDataEntrega()
    {
        return $this->dataEntrega;
    }

    public function setDataEntrega($dataEntrega)
    {
        $this->dataEntrega = $dataEntrega;
        return $this;
    }

    public function getNomeEmpresa()
    {
        return $this->nomeEmpresa;
    }

    public function setNomeEmpresa($nomeEmpresa)
    {
        $this->nomeEmpresa = $nomeEmpresa;
        return $this;
    }

    public function getNumeroNota()
    {
        return $this->numeroNota;
    }

    public function setNumeroNota($numeroNota)
    {
        $this->numeroNota = $numeroNota;
        return $this;
    }

    public function getNumeroPedido()
    {
        return $this->numeroPedido;
    }

    public function setNumeroPedido($numeroPedido)
    {
        $this->numeroPedido = $numeroPedido;
        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
        return $this;
    }

    public function getValorUnitario()
    {
        return $this->valorUnitario;
    }

    public function setValorUnitario($valorUnitario)
    {
        $this->valorUnitario = $valorUnitario;
        return $this;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total)
    {
        $this->total = $total += ($this->quantidade * $this->valorUnitario);
        return $this;
    }

    public function getTable()
    {
        return $this->table;
    }

}