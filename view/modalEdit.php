<?php

require_once "layout/header.php";

require_once "../model/Servico.php";
require_once "../db/DB.php";
require_once "../db/Dao/ServicoDao.php";

$db = new DB();
$servico = new Servico();
$servicoDao = new ServicoDao($db->Conn(), $servico);

?>

<!-- Inicio Modal Info -->
<div id="modalEdit" class="modal" role="dialog">
        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-body">
                    <h1 class="text-center mb-3">Detalhes</h1>

                    <?php $id = $_GET['id'];
$view1 = $servicoDao->findById($id);?>

                    <label><?=$id?></label>
                </div>

                <div class="modal-footer">
                    <button type="button" id="closeEdit" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>