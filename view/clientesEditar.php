<?php 
require_once "layout/header.php";

require_once "../model/Cliente.php";
require_once "../db/DB.php";
require_once "../db/Dao/ClienteDao.php";

$id = $_GET['id'];

$db = new DB();
$cliente = new Cliente();
$clienteDao = new ClienteDao($db->Conn(), $cliente);

$view = $clienteDao->findById($id);
?>

<main class="container py-5 mt-5">
    <form action="../controller/cliente/ClienteUpdate.php?id=<?= $view['id']; ?>" method="post">
        <div class="row">
            <div class="form-group col-6">
                <label>Nome Empresa</label>
                <input type="text" class="form-control" name="nome" 
                    value=" <?=$view['nome']; ?>" />
            </div>

            <div class="form-group col-6">
                <label>Email</label>
                <input type="text" class="form-control" name="email" 
                    value=" <?=$view['email']; ?>" />
            </div>

            <div class="form-group col-7">
                <label>Contato</label>
                <input type="text" class="form-control" name="contato" 
                    value=" <?=$view['contato']; ?>" />
            </div>

            <div class="form-group col-5">
                <label>Telefone</label>
                <input type="phone" class="form-control" name="telefone"
                    value=" <?=$view['telefone']; ?>" />
            </div>

            <div class="form-group col-7">
                <label>Endereço</label>
                <input type="text" class="form-control" name="endereco"
                    value=" <?=$view['endereco']; ?>" />
            </div>

            <div class="form-group col-5">
                <label>Bairro</label>
                <input type="text" class="form-control" name="bairro"
                    value=" <?=$view['bairro']; ?>" />
            </div>

            <div class="form-group col-4">
                <label>Cidade</label>
                <input type="text" class="form-control" name="cidade"
                    value=" <?=$view['cidade']; ?>" />
            </div>

            <div class="form-group col-4">
            <label>Estado</label>
                <input type="text" class="form-control" name="estado"
                    value=" <?=$view['estado']; ?>" />
            </div>
        </div>
        <button type="submit" class="btn btn-success">Cadastrar</button>
        <a href="/view/clientes.php" class="btn btn-primary">Voltar</a>
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