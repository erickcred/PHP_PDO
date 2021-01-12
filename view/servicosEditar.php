<?php 
require_once "layout/header.php";

require_once "../model/Servico.php";
require_once "../db/DB.php";
require_once "../db/Dao/ServicoDao.php";

$id = $_GET['id'];

$db = new DB();
$servico = new Servico();
$servicoDao = new ServicoDao($db->Conn(), $servico);

$view = $servicoDao->findById($id);
?>

<main class="container py-5 mt-5">
<form action="../controller/servico/ServicoUpdate.php?id=<?=$view['id']; ?>" method="post">
    <div class="row">
        <div class="form-group col-lg-4 col-md-4">
            <label>Nome Empresa</label>
            <input type="text" class="form-control" name="nomeEmpresa"
                placeholder="Nome Empresa" value="<?= $view['nomeEmpresa']; ?>" />
        </div>

        <div class="form-group col-lg-4 col-md-4">
            <label>Nº Nota</label>
            <input type="text" class="form-control" name="numeroNota"
                placeholder="Nº Nota" value="<?= $view['numeroNota']; ?>" />
        </div>

        <div class="form-group col-lg-4 col-md-4">
            <label>Nº Pedido</label>
            <input type="text" class="form-control" name="numeroPedido"
                placeholder="Nº Pedido" value="<?= $view['numeroPedido']; ?>" />
        </div>

        <div class="form-group col-lg-4 col-md-4">
            <label>Quantidade</label>
            <input type="number" class="form-control" name="quantidade"
                placeholder="Quantidade" value="<?= $view['quantidade']; ?>" />
        </div>

        <div class="form-group col-lg-4 col-md-4">
            <label>Valor Unitario</label>
            <input type="text" class="form-control" name="valorUnitario"
                placeholder="Val.Uni" value="<?= $view['valorUnitario']; ?>" />
        </div>

        <div class="form-group col-lg-4 col-md-4">
            <label>Total</label>
            <lable class="form-control" name="total"><?= $view['total']; ?></lable>
        </div>

        <div class="form-group col-lg-6 col-md-6">
            <label>Data Entrada</label>
            <input type="date" class="form-control" name="dataEntrada"
                value="<?= $view['dataEntrada']; ?>" />
        </div>

        <div class="form-group col-lg-6 col-md-6">
            <label>Data Entrega</label>
            <input type="date" class="form-control" name="dataEntrega"
                value="<?= $view['dataEntrega']; ?>" />
        </div>


        <div class="form-group col-lg-12 col-md-12">
            <textarea class="form-control" name="descricao" placeholder="Descrição do Servico"></textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Cadastrar</button>
    <a href="/view/servicos.php" class="btn btn-primary ml-3">Voltar</a>
    </form>
</main>

<script>

const total = document.getElementsByName("total")[0]
const quantidade = document.getElementsByName("quantidade")[0]
const valorUnitario = document.getElementsByName("valorUnitario")[0]


document.getElementsByName("dataEntrada")[0].onfocus = function () {
    var v = valorUnitario
    valorUnitario.value = v.value.toString().replace(",",".")
    const valor = quantidade.value * v.value

    total.innerText = valor.toFixed(2)
}
</script>


<?php
require_once "layout/footer.php";