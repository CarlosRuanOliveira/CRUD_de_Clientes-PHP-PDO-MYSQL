<?php
require_once __DIR__.'/vendor/autoload.php';

use \App\Entity\Cliente;
if (!isset($_GET['clienteId']) or !is_numeric($_GET['clienteId'])) {
    header('location: index.php?status=error');
    exit;
}
//CONSULTA O CLIENTE
$obCliente = Cliente::getCliente($_GET['clienteId']);

//VALIDAÇÃO DO CLIENTE
if (!$obCliente instanceof Cliente) {
    header('location: index.php?status=error');
    exit;
}
//VALIDAÇÃO DO POST
if(isset($_POST['excluir'])){
    $obCliente->excluir();
    header('location: index.php?status=success'); exit;
}
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar-exclusao.php';
include __DIR__.'/includes/footer.php';