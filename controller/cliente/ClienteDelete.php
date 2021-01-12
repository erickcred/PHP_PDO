<?php

require_once "../../model/Cliente.php";
require_once "../../db/DB.php";
require_once "../../db/Dao/ClienteDao.php";

$id = $_GET['id'];

$db = new DB();
$cliente = new Cliente();
$clienteDao = new ClienteDao($db->Conn(), $cliente);

$cliente->setId($id);

var_dump($clienteDao->delete());

header("Location: /view/clientes.php");

