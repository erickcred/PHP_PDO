<?php

require_once "../../model/Cliente.php";
require_once "../../db/DB.php";
require_once "../../db/Dao/ClienteDao.php";

$id = $_GET['id'];
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$contato = filter_input(INPUT_POST, 'contato', FILTER_SANITIZE_SPECIAL_CHARS);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_SPECIAL_CHARS);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_SPECIAL_CHARS);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_SPECIAL_CHARS);

$db = new DB();
$cliente = new Cliente();
$clienteDao = new ClienteDao($db->Conn(), $cliente);

$cliente->setId($id)
        ->setNome($nome)
        ->setEmail($email)
        ->setContato($contato)
        ->setTelefone($telefone)
        ->setEndereco($endereco)
        ->setBairro($bairro)
        ->setCidade($cidade)
        ->setEstado($estadi);
$clienteDao->update();

header("Location: /view/clientes.php");

