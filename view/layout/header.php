<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/view/utils/css/bootstrap.css" />
    <title>Confecções Trindade</title>
</head>
<body>

<?php

$active = $_SERVER['REQUEST_URI'];

?>


<nav class="nav bg-dark fixed-top py-3">

    <li class="nav-item ml-2 <?= $active == '/' ? 'active' : '' ?>">
        <a class="nav-link btn btn-outline-info font-weight-bold" href="/">Home</a>
    </li>
    <li class="nav-item ml-2 <?= $active == '/view/clientes.php' ? 'active' : '' ?>">
        <a class="nav-link btn btn-outline-info font-weight-bold" href="/view/clientes.php">Clientes</a>
    </li>
    <li class="nav-item ml-2 <?= $active == '/view/servicos.php' ? 'active' : '' ?>">
        <a class="nav-link btn btn-outline-info font-weight-bold " href="/view/servicos.php">Serviços</a>
    </li>

</nav>

<nav class="nav">
    <li class="nav-item">
        <a class="nav-link active" href="#">Item 1</a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Item 2</a>
    </li>
</nav>


    
