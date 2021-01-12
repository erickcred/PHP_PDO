<?php 
require_once "layout/header.php";

require_once "../model/Servico.php";
require_once "../db/DB.php";
require_once "../db/Dao/ServicoDao.php";

$db = new DB();
$servico = new Servico();
$servicoDao = new ServicoDao($db->Conn(), $servico);


?>

<main class="container py-5 mt-5">
    <button id="btnModalAdd" class="btn btn-success mb-3">Novo Serviço</button>

    <table class="table table-darck">

        <thead>
            <tr>
                <th>Entrada</th>
                <th>Entrega</th>
                <th>Empresa</th>
                <th>Nº Nota</th>
                <th>Quant</th>
                <th>V. Uni</th>
                <th>Total</th>
            </th>
        </thead>

        <tbody>
        <?php foreach ($servicoDao->findAll() as $view) { ?>
            <tr>
                <td><?=$view['dataEntrada']?></td>
                <td><?=$view['dataEntrega']?></td>
                <td><?=$view['nomeEmpresa']?></td>
                <td><?=$view['numeroNota']?></td>
                <td><?=$view['quantidade']?></td>
                <td><?="R$ ".number_format($view['valorUnitario'], 2, ",", ".")?></td>
                <td><?="R$ ".number_format($view['total'], 2, ",",".")?></td>
                <td>
                    <a href="#?id=<?= $view['id']; ?>" id="btnModalEdit" class="btn btn-sm btn-primary text-white">Info</a>
                </td>
                <td>
                    <a name="" id="" class="btn btn-sm btn-warning text-whit" href="/view/servicosEditar.php?id=<?=$view['id']?>">Editar</a>
                </td>
                <td>
                    <a href="../controller/servico/ServicoDelete.php?id=<?= $view['id']?>" class="btn btn-sm btn-danger">Excluir</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>


    <!-- Inicio Modal Adicionar -->

    <div id="modalAdd" class="modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-body">
                    <h1 class="text-center mb-3">Cadastro Serviços</h1>

                    <form action="../controller/servico/ServicoAdd.php" method="post">
                        <div class="row">
                            <div class="form-group col-lg-4 col-md-4">
                                <input type="text" class="form-control" name="nomeEmpresa"
                                    placeholder="Nome Empresa" />
                            </div>

                            <div class="form-group col-lg-4 col-md-4">
                                <input type="text" class="form-control" name="numeroNota"
                                    placeholder="Nº Nota" />
                            </div>

                            <div class="form-group col-lg-4 col-md-4">
                                <input type="text" class="form-control" name="numeroPedido"
                                    placeholder="Nº Pedido" />
                            </div>

                            <div class="form-group col-lg-4 col-md-4">
                                <input type="number" class="form-control" name="quantidade"
                                    placeholder="Quantidade" required="treu" />
                            </div>

                            <div class="form-group col-lg-4 col-md-4">
                                <input type="text" class="form-control" name="valorUnitario"
                                    placeholder="Val.Uni" required="treu" />
                            </div>

                            <div class="form-group col-lg-4 col-md-4">
                                <lable class="form-control" name="total"></lable>
                            </div>

                            <div class="form-group col-lg-6 col-md-6">
                                <input type="date" class="form-control" name="dataEntrada"
                                    required="treu" />
                            </div>

                            <div class="form-group col-lg-6 col-md-6">
                                <input type="date" class="form-control" name="dataEntrega"
                                    required="treu" />
                            </div>


                            <div class="form-group col-lg-12 col-md-12">
                                <textarea class="form-control" name="descricao" placeholder="Descrição do Servico"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" id="closeAdd" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>


    <!-- Inicio Modal Info -->
    <div id="modalEdit" class="modal" role="dialog">
        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-body">
                    <h1 class="text-center mb-3">Detalhes</h1>

                    <?php $id = $_GET['id']; $view1 =  $servicoDao->findById($id); ?>
                    
                    <label><?= $id ?></label>
                </div>

                <div class="modal-footer">
                    <button type="button" id="closeEdit" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>




</main>


<?php 
require_once 'layout/footer.php';
