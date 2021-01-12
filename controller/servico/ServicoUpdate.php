<?php
require_once "../../model/Servico.php";
require_once "../../db/DB.php";
require_once "../../db/Dao/ServicoDao.php";

$db = new DB();
$servico = new Servico();
$servicoDao = new ServicoDao($db->Conn(), $servico);


$id = $_GET['id'];
$dataEntrada = filter_input(INPUT_POST, 'dataEntrada', FILTER_DEFAULT);
$dataEntrega = filter_input(INPUT_POST, 'dataEntrada', FILTER_DEFAULT);
$nomeEmpresa = filter_input(INPUT_POST, 'nomeEmpresa', FILTER_SANITIZE_STRING);
$numeroNota = filter_input(INPUT_POST, 'numeroNota', FILTER_SANITIZE_STRING);
$numeroPedido = filter_input(INPUT_POST, 'numeroPedido', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
$valorUnitario = filter_input(INPUT_POST, 'valorUnitario', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$total = filter_input(INPUT_POST, 'total', FILTER_SANITIZE_NUMBER_FLOAT);

echo $total;
$servico->setId($id)
        ->setDataEntrada($dataEntrada)
        ->setDataEntrega($dataEntrega)
        ->setNomeEmpresa($nomeEmpresa)
        ->setNumeroNota($numeroNota)
        ->setNumeroPedido($numeroPedido)
        ->setDescricao($descricao)
        ->setQuantidade($quantidade)
        ->setValorUnitario($valorUnitario)
        ->setTotal($total);
$servicoDao->update();

header("Location: /view/servicos.php");
