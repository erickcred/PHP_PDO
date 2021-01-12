<?php

class ClienteDao extends DB
{
    private $db;
    private $cliente;
    
    public function __construct(\PDO $db, Cliente $cliente)
    {
        $this->db = $db;
        $this->cliente = $cliente;
    }

    public function insert() 
    {
        $query = "INSERT INTO {$this->cliente->getTable()}
        (nome, email, contato, telefone, endereco, bairro, cidade, estado) 
        VALUE(:nome, :email, :contato, :telefone, :endereco, :bairro, :cidade, :estado)";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->cliente->getNome());
        $stmt->bindValue(':email', $this->cliente->getEmail());
        $stmt->bindValue(':contato', $this->cliente->getContato());
        $stmt->bindValue(':telefone', $this->cliente->getTelefone());
        $stmt->bindValue(':endereco', $this->cliente->getEndereco());
        $stmt->bindValue(':bairro', $this->cliente->getBairro());
        $stmt->bindValue(':cidade', $this->cliente->getCidade());
        $stmt->bindValue(':estado', $this->cliente->getEstado());

        
        $stmt->execute();
    }

    public function update()
    {
        $query = "UPDATE {$this->cliente->getTable()} SET
        nome = :nome, email = :email, contato = :contato, telefone = :telefone, 
        endereco = :endereco, bairro = :bairro, cidade = :cidade, estado = :estado WHERE id=:id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->cliente->getId());
        $stmt->bindValue(':nome', $this->cliente->getNome());
        $stmt->bindValue(':email', $this->cliente->getEmail());
        $stmt->bindValue(':contato', $this->cliente->getContato());
        $stmt->bindValue(':telefone', $this->cliente->getTelefone());
        $stmt->bindValue(':endereco', $this->cliente->getEndereco());
        $stmt->bindValue(':bairro', $this->cliente->getBairro());
        $stmt->bindValue(':cidade', $this->cliente->getCidade());
        $stmt->bindValue(':estado', $this->cliente->getEstado());

        $stmt->execute();
    }
    
    public function findById($id)
    {
        $query = "SELECT * FROM {$this->cliente->getTable()} WHERE id=:id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);

        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function findAll()
    {
        $query = "SELECT * FROM {$this->cliente->getTable()}";

        $stmt = $this->db->query($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function delete()
    {
        $query = "DELETE FROM {$this->cliente->getTable()} WHERE id=:id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->cliente->getId());
        $stmt->execute();
    }
}