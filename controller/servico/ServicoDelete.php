<?php

require_once "../../model/Servico.php";
require_once "../../db/DB.php";
require_once "../../db/Dao/ServicoDao.php";

$id = $_GET['id'];

$db = new DB();
$servico = new Servico();
$servicoDao = new ServicoDao($db->Conn(), $servico);


echo $id;

$servico->setId($id);
$servicoDao->delete();

header("Location: /view/servicos.php");