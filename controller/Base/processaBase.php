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
    $nomeBase = $_REQUEST["nomeBase"];
    $dataCadastro = $_REQUEST["dataCadastro"];
    $responsavelBase = $_REQUEST["responsavelBase"];
    $telefoneBase = $_REQUEST["telefoneBase"];
    $celularBase = $_REQUEST["celularBase"];
    $emailBase = $_REQUEST["emailBase"];
    $ativo = $_REQUEST["ativo"];

    include_once 'BaseController.php';
    $base = new BaseController();
    $base->cadastraBase($idUsuario,$nomeBase,$dataCadastro,$responsavelBase,$telefoneBase,$celularBase,$emailBase,$ativo);

}

function excluir()
{
    $idBase = $_REQUEST["idBase"];
    include_once 'BaseController.php';
    $contr = new BaseController();
    $contr->excluirBase($idBase);
}

function listar(){
    echo "<script>location.href='../../view/Base/formListarBase.php';</script>";
}

function alterar(){
    $idUsuario = $_REQUEST["idUsuario"];
    $nomeBase = $_REQUEST["nomeBase"];
    $dataCadastro = $_REQUEST["dataCadastro"];
    $responsavelBase = $_REQUEST["responsavelBase"];
    $telefoneBase = $_REQUEST["telefoneBase"];
    $celularBase = $_REQUEST["celularBase"];
    $emailBase = $_REQUEST["emailBase"];
    $ativo = $_REQUEST["ativo"];
    $idBase = $_REQUEST["idBase"];

    include_once 'BaseController.php';
    $base = new BaseController();
    $base->alterarBase($idBase,$idUsuario,$nomeBase,$dataCadastro,$responsavelBase,$telefoneBase,$celularBase,$emailBase,$ativo);  
}



?>