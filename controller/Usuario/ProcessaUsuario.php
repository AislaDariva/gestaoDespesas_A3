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
    $idPerfil = $_REQUEST["idPerfil"];
    $nomeUsuario = $_REQUEST["nomeUsuario"];
    $emailUsuario = $_REQUEST["emailUsuario"];
    $loginUsuario = $_REQUEST["loginUsuario"];
    $senhaUsuario = $_REQUEST["senhaUsuario"];
    $dataCadastro = $_REQUEST["dataCadastro"];
    $telefoneCelular = $_REQUEST["telefoneCelular"];
    $ativo = $_REQUEST["ativo"];
    $senhaUsuarioCriptografada = password_hash($senhaUsuario, PASSWORD_BCRYPT);

    include_once 'UsuarioController.php';
    $usuario = new UsuarioController();
    $usuario->cadastraUsuario($idPerfil,$nomeUsuario,$emailUsuario,$loginUsuario,$senhaUsuarioCriptografada,$dataCadastro,$telefoneCelular,$ativo);

}

function excluir()
{
    $idUsuario = $_REQUEST["idUsuario"];
    include_once 'UsuarioController.php';
    $contr = new UsuarioController();
    $contr->excluirUsuario($idUsuario);
}

function listar(){
    //include_once '../view/formListarUsuario.php';
    echo "<script>location.href='../../view/Usuario/formListarUsuario.php';</script>";

}

function alterar(){
    $idPerfil = $_REQUEST["idPerfil"];
    $nomeUsuario = $_REQUEST["nomeUsuario"];
    $emailUsuario = $_REQUEST["emailUsuario"];
    $loginUsuario = $_REQUEST["loginUsuario"];
    $senhaUsuario = $_REQUEST["senhaUsuario"];
    $dataCadastro = $_REQUEST["dataCadastro"];
    $telefoneCelular = $_REQUEST["telefoneCelular"];
    $ativo = $_REQUEST["ativo"];
    $idUsuario = $_REQUEST["idUsuario"];

    include_once 'UsuarioController.php';
    $usuario = new UsuarioController();
    $usuario->alterarUsuario($idUsuario,$idPerfil,$nomeUsuario,$emailUsuario,$loginUsuario,$senhaUsuario,$dataCadastro,$telefoneCelular,$ativo);  
}



?>