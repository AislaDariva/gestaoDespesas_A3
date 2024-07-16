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
    $idUsuario = $_REQUEST["idUsuario"];
    $nomeCredor = $_REQUEST["nomeCredor"];
    $dataCadastro = $_REQUEST["dataCadastro"];
    $responsavelCredor = $_REQUEST["responsavelCredor"];
    $telefoneCredor = $_REQUEST["telefoneCredor"];
    $celularCredor = $_REQUEST["celularCredor"];
    $ativo = $_REQUEST["ativo"];

    include_once 'CredorController.php';
    $credor = new CredorController();
    $credor->cadastraCredor($idUsuario,$nomeCredor,$dataCadastro,$responsavelCredor,$telefoneCredor,$celularCredor,$ativo);

}

function excluir()
{
    $idCredor = $_REQUEST["idCredor"];
    include_once 'CredorController.php';
    $contr = new CredorController();
    $contr->excluirCredor($idCredor);
}

function listar(){
    echo "<script>location.href='../../view/Credor/FormListarCredor.php';</script>";
}

function alterar(){
    $idUsuario = $_REQUEST["idUsuario"];
    $nomeCredor = $_REQUEST["nomeCredor"];
    $dataCadastro = $_REQUEST["dataCadastro"];
    $responsavelCredor = $_REQUEST["responsavelCredor"];
    $telefoneCredor = $_REQUEST["telefoneCredor"];
    $celularCredor = $_REQUEST["celularCredor"];
    $ativo = $_REQUEST["ativo"];
    $idCredor = $_REQUEST["idCredor"];

    include_once 'CredorController.php';
    $credor = new CredorController();
    $credor->alterarCredor($idCredor,$idUsuario,$nomeCredor,$dataCadastro,$responsavelCredor,$telefoneCredor,$celularCredor,$ativo);  
}



?>