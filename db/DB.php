<?php

class DB
{
    private $db;

    public function Conn()
    {
        try {
            $this->db = new \PDO("mysql:host=localhost;dbname=confeccoestridade", "root", "root");
            return $this->db;
        } catch (PDOException $e) {
            echo "Não foi possível conectar ao Banco de Dados".$e.getMessage();
        }
    }
}