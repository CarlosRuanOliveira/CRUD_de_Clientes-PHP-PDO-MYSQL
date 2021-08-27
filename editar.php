<?php
require_once __DIR__.'/vendor/autoload.php';

define('TITLE', 'Editar cliente');

use \App\Entity\Cliente;
if (!isset($_GET['clienteId']) or !is_numeric($_GET['clienteId'])) {
    header('location: index.php?status=error');
    exit;
}
//CONSULTA O CLIENTE
$obCliente = Cliente::getCliente($_GET['clienteId']);

//VALIDAÇÃO DA VAGA
if (!$obCliente instanceof Cliente) {
    header('location: index.php?status=error');
    exit;
}
//VALIDAÇÃO DO POST
if(isset($_POST['cpf'], $_POST['nome'], $_POST['fone'])){

    $obCliente->setCpf($_POST['cpf']);
    $obCliente->setNome($_POST['nome']);
    $obCliente->setTelefone($_POST['fone']);
    $obCliente->setEmail($_POST['email']);
    $obCliente->setUf($_POST['uf']);
    $obCliente->setCidade($_POST['cidade']);
    $obCliente->setNascimento($_POST['nasc']);
    $obCliente->setSexo($_POST['sexo']);
    
    $obCliente->atualizar();
    header('location: index.php?status=success'); exit;
}
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';