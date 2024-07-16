<?php
class UsuarioController{

public function cadastraUsuario($idPerfil,$nomeUsuario,$emailUsuario,$loginUsuario,$senhaUsuario,$dataCadastro,$telefoneCelular,$ativo){
    include_once "../../model/UsuarioModel.php";
    $usuario = new UsuarioModel(null,$idPerfil,$nomeUsuario,$emailUsuario,$loginUsuario,$senhaUsuario,$dataCadastro,$telefoneCelular,$ativo);
    $usuario->cadastraUsuario($usuario);
} 

public static function listarUsuario()
{
    include_once "../../model/UsuarioModel.php";
    $model =new UsuarioModel(null,null,null, null,null,null,null,null,null); 
    return $model->listarUsuario();
}

public function excluirUsuario($idusuario)
{
    include_once "../../model/UsuarioModel.php";
    $model =new UsuarioModel(null,null,null, null,null,null,null,null,null); 
    $model->excluirUsuario($idusuario);
}

public static function resgataPorID($idUsuario)
{
    include_once "../../model/UsuarioModel.php";
    $model =new UsuarioModel(null,null,null,null,null,null,null,null,null); 
    return $model->resgataPorID($idUsuario);
}

function alterarUsuario($idUsuario,$idPerfil,$nomeUsuario,$emailUsuario,$loginUsuario,$senhaUsuario,$dataCadastro,$telefoneCelular,$ativo){
    include_once "../../model/UsuarioModel.php";
    $model = new UsuarioModel($idUsuario,$idPerfil,$nomeUsuario,$emailUsuario,$loginUsuario,$senhaUsuario,$dataCadastro,$telefoneCelular,$ativo); 
    $model->alterarUsuario($model);
}

public static function resgataPorLogin($loginUsuario)
{
    include_once "Model/UsuarioModel.php";
    $model = new UsuarioModel(null,null,null,null,null,null,null,null,null);
    return $model->resgataPorLogin($loginUsuario);
}

}
?>