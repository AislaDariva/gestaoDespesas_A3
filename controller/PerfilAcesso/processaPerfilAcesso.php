<?php
switch($_REQUEST["op"])
{
    case "Incluir": incluir();
        break;
    case "Excluir": excluir();
        break;
    case "Listar": listar();
        break;
    case "Alterar": alterar();
        break;
}

function incluir()
{
    $nomePerfil = $_REQUEST["nomePerfil"];
    $dataCadastro = $_REQUEST["dataCadastro"];
    $ativo = $_REQUEST["ativo"];

    include_once 'PerfilAcessoController.php';
    $perfilAcesso = new PerfilAcessoController();
    $perfilAcesso->cadastraPerfilAcesso($nomePerfil,$dataCadastro,$ativo);

}

function excluir()
{
    $idPerfil = $_REQUEST["idPerfil"];
    include_once 'PerfilAcessoController.php';
    $contr = new PerfilAcessoController();
    $contr->excluirPerfilAcesso($idPerfil);
}

function listar(){
    //include_once '../view/formListarPerfilAcesso.php';
    echo "<script>location.href='../../view/PerfilAcesso/formListarPerfilAcesso.php';</script>";
}

function alterar(){
    $nomePerfil = $_REQUEST["nomePerfil"];
    $dataCadastro = $_REQUEST["dataCadastro"];
    $ativo = $_REQUEST["ativo"];
    $idPerfil = $_REQUEST["idPerfil"];

    include_once 'PerfilAcessoController.php';
    $perfilAcesso = new PerfilAcessoController();
    $perfilAcesso->alterarPerfilAcesso($idPerfil,$nomePerfil,$dataCadastro,$ativo);  
}



?>