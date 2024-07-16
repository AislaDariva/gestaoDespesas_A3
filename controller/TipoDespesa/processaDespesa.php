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
    $idCredor = $_REQUEST["idCredor"];
    $idUsuario = $_REQUEST["idUsuario"];
    $nomeDespesa = $_REQUEST["nomeDespesa"];
    $dataCadastro = $_REQUEST["dataCadastro"];
    $ativo = $_REQUEST["ativo"];

    include_once 'DespesaController.php';
    $despesa = new DespesaController();
    $despesa->cadastraDespesa($idCredor,$idUsuario,$nomeDespesa,$dataCadastro,$ativo);

}

function excluir()
{
    $idDespesa = $_REQUEST["idDespesa"];
    include_once 'DespesaController.php';
    $contr = new DespesaController();
    $contr->excluirDespesa($idDespesa);
}

function listar(){
    echo "<script>location.href='../../view/TipoDespesa/formListarDespesa.php';</script>";
}

function alterar(){
    $idCredor = $_REQUEST["idCredor"];
    $idUsuario = $_REQUEST["idUsuario"];
    $nomeDespesa = $_REQUEST["nomeDespesa"];
    $dataCadastro = $_REQUEST["dataCadastro"];
    $ativo = $_REQUEST["ativo"];
    $idDespesa = $_REQUEST["idDespesa"];

    include_once 'DespesaController.php';
    $despesa = new DespesaController();
    $despesa->alterarDespesa($idDespesa,$idCredor,$idUsuario,$nomeDespesa,$dataCadastro,$ativo);  
}



?>