<?php
require_once __DIR__.'/vendor/autoload.php';

define('TITLE', 'Cadastro');

use \App\Entity\Cliente;
//VALIDAÇÃO DO POST
if(isset($_POST['cpf'], $_POST['nome'], $_POST['fone'])){

    $obCliente = new Cliente;
    $obCliente->setCpf($_POST['cpf']);
    $obCliente->setNome($_POST['nome']);
    $obCliente->setTelefone($_POST['fone']);
    $obCliente->setEmail($_POST['email']);
    $obCliente->setUf($_POST['uf']);
    $obCliente->setCidade($_POST['cidade']);
    $obCliente->setNascimento($_POST['nasc']);
    $obCliente->setSexo($_POST['sexo']);
    
    $obCliente->cadastrar();
    header('location: index.php?status=success'); exit;
}
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';