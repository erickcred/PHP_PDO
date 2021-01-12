<?php 
require_once "layout/header.php";

require_once "../model/Cliente.php";
require_once "../db/DB.php";
require_once "../db/Dao/ClienteDao.php";

$db = new DB();
$cliente = new Cliente();
$clienteDao = new ClienteDao($db->Conn(), $cliente);
?>

<main class="container py-5 mt-5">
    <button id="btnModalAdd" class="btn btn-success mb-3">Novo Cliente</button>

    <table class="table table-darck">
        
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Tefone</th>
                <th>Endereço</th>
                <th>Contato</th>
            </tr>
        </thade>

        <tbody>
            <?php foreach ($clienteDao->findAll() as $view) { ?>
            <tr>
                <td><?=$view['nome']?></td>
                <td><?=$view['email']?></td>
                <td><?=$view['telefone']?></td>
                <td><?=$view['endereco']?></td>
                <td><?=$view['contato']?></td>
                <td>
                    <a href="#" class="btn btn-sm btn-info">Info</a>
                </td>
                <td>
                    <a href="/view/clientesEditar.php?id=<?=$view['id']?>" class="btn btn-warning btn-sm text-white">Editar</a>
                </td>
                <td>
                    <a href="../controller/cliente/ClienteDelete.php?id=<?= $view['id']?>" class="btn btn-danger btn-sm text-white">Excluir</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>

    </table>

    <!-- Inicio Modal -->

    <div id="modalAdd" class="modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-body">
                    <h1 class="text-center mb-3">Cadastro Clientes</h1>

                    <form action="../controller/cliente/ClienteAdd.php" method="post">
                        <div class="row">
                            <div class="form-group col-6">
                                <input type="text" class="form-control" name="nome" 
                                placeholder="Nome Empresa" />
                            </div>

                            <div class="form-group col-6">
                                <input type="text" class="form-control" name="email" 
                                placeholder="email" />
                            </div>

                            <div class="form-group col-7">
                                <input type="text" class="form-control" name="contato" 
                                placeholder="Nome Contato" />
                            </div>

                            <div class="form-group col-5">
                                <input type="phone" class="form-control" name="telefone"
                                    placeholder="41 9 9999-9999" />
                            </div>

                            <div class="form-group col-7">
                                <input type="text" class="form-control" name="endereco"
                                    placeholder="Rua nome, 444" />
                            </div>

                            <div class="form-group col-5">
                                <input type="text" class="form-control" name="bairro"
                                    placeholder="Bairro" />
                            </div>

                            <div class="form-group col-4">
                                <input type="text" class="form-control" name="cidade"
                                    placeholder="Cidade" />
                            </div>

                            <div class="form-group col-4">
                                <input type="text" class="form-control" name="estado"
                                    placeholder="Estado" />
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

</main>


<?php 
require_once 'layout/footer.php';
