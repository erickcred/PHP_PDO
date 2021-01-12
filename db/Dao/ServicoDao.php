<?php

class ServicoDao extends DB
{
    private $db;
    private $servico;

    public function __construct(\PDO $db, Servico $servico)
    {
        $this->db = $db;
        $this->servico = $servico;
    }

    public function insert()
    {
        $query = "INSERT INTO {$this->servico->getTable()}
        (dataEntrada, dataEntrega, nomeEmpresa, numeroNota, numeroPedido, descricao, quantidade, valorUnitario, total) 
        VALUE
        (:dataEntrada, :dataEntrega, :nomeEmpresa, :numeroNota, :numeroPedido, :descricao, :quantidade, :valorUnitario, :total)";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':dataEntrada', $this->servico->getDataEntrada());
        $stmt->bindValue(':dataEntrega', $this->servico->getDataEntrega());
        $stmt->bindValue(':nomeEmpresa', $this->servico->getNomeEmpresa());
        $stmt->bindValue(':numeroNota', $this->servico->getNumeroNota());
        $stmt->bindValue(':numeroPedido', $this->servico->getNumeroPedido());
        $stmt->bindValue(':descricao', $this->servico->getDescricao());
        $stmt->bindValue(':quantidade', $this->servico->getQuantidade());
        $stmt->bindValue(':valorUnitario', $this->servico->getValorUnitario());
        $stmt->bindValue(':total', $this->servico->getTotal());
        
        $stmt->execute();
    }

    public function update()
    {
        $query = "UPDATE {$this->servico->getTable()} SET
        dataEntrada = :dataEntrada, dataEntrega = :dataEntrega, nomeEmpresa = :nomeEmpresa, numeroNota = :numeroNota, 
        numeroPedido = :numeroPedido, descricao = :descricao, quantidade = :quantidade, valorUnitario = :valorUnitario, 
        total = :total WHERE id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->servico->getId());
        $stmt->bindValue(':dataEntrada', $this->servico->getDataEntrada());
        $stmt->bindValue(':dataEntrega', $this->servico->getDataEntrega());
        $stmt->bindValue(':nomeEmpresa', $this->servico->getNomeEmpresa());
        $stmt->bindValue(':numeroNota', $this->servico->getNumeroNota());
        $stmt->bindValue(':numeroPedido', $this->servico->getNumeroPedido());
        $stmt->bindValue(':descricao', $this->servico->getDescricao());
        $stmt->bindValue(':quantidade', $this->servico->getQuantidade());
        $stmt->bindValue(':valorUnitario', $this->servico->getValorUnitario());
        $stmt->bindValue(':total', $this->servico->getTotal());

        if ($stmt->execute()) {
            return true;
        }
    }

    public function findById($id)
    {
        $query = "SELECT * FROM {$this->servico->getTable()} WHERE id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function findByDateEntred($date)
    {
        $query = "SELECT * FROM {$this->servico->getTable()} WHERE dataEntrada = :dataEntrada";

        $stmt = $this->db->query($query);
        $stmt->bindValue(':dataEntrada', $date);
        $stmt->execute();
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findByDateOut($date)
    {
        $query = "SELECT * FROM {$this->servico->getTable()} WHERE dataEntrega = :dataEntrega";

        $stmt = $this->db->query($query);
        $stmt->bindValue(':dataEntrega', $date);
        $stmt->execute();
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findByPeriodEntred($date1, $date2)
    {
        $query = "SELECT * FROM {$this->servico->getTable()} WHERE dataEntrada BETWEEN :dataEntrada AND :dataEtrada";

        $stmt = $this->db->query($query);
        $stmt->bindValue(':dataEntrega', $date);
        $stmt->bindValue(':dataEntrega', $date);
        $stmt->execute();
    }

    public function findAll()
    {
        $query = "SELECT * FROM {$this->servico->getTable()}";

        $stmt = $this->db->query($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function delete()
    {
        $query = "DELETE FROM {$this->servico->getTable()} WHERE id=:id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->servico->getId());
        var_dump($stmt);
        $stmt->execute();
    }
}