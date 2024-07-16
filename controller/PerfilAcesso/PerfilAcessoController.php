<?php
class PerfilAcessoController{

public function cadastraPerfilAcesso($nomePerfil,$dataCadastro,$ativo){
    include_once "../../model/perfilAcessoModel.php";
    $perfilAcesso = new PerfilAcessoModel(null,$nomePerfil,$dataCadastro,$ativo);
    $perfilAcesso->cadastraPerfilAcesso($perfilAcesso);
} 

public static function listarPerfilAcesso()
{
    include_once "../../model/PerfilAcessoModel.php";
    $model = new PerfilAcessoModel(null,null,null,null); 
    return $model->listarPerfilAcesso();
}

public function excluirPerfilAcesso($idPerfil)
{
    include_once "../../model/PerfilAcessoModel.php";
    $model =new PerfilAcessoModel(null,null,null,null); 
    $model->excluirPerfilAcesso($idPerfil);
}

public static function resgataPorID($idPerfil)
{
    include_once "../../model/perfilAcessoModel.php";
    $model =new perfilAcessoModel(null,null,null,null); 
    return $model->resgataPorID($idPerfil);
}

function alterarPerfilAcesso($idPerfil,$nomePerfil,$dataCadastro,$ativo){
    include_once "../../model/PerfilAcessoModel.php";
    $model = new PerfilAcessoModel($idPerfil,$nomePerfil,$dataCadastro,$ativo); 
    $model->alterarPerfilAcesso($model);
}

}
?>