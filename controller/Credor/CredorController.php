<?php
class CredorController{

public function cadastraCredor($idUsuario,$nomeCredor,$dataCadastro,$responsavelCredor,$telefoneCredor,$celularCredor,$ativo){
    include_once "../../model/CredorModel.php";
    $credor = new CredorModel(null,$idUsuario,$nomeCredor,$dataCadastro,$responsavelCredor,$telefoneCredor,$celularCredor,$ativo);
    $credor->cadastraCredor($credor);
} 

public static function listarCredor()
{
    include_once ("../../Model/CredorModel.php");
    $model =new CredorModel(null,null,null,null,null,null,null,null); 
    return $model->listarCredor();
}



public function excluirCredor($idCredor) 
{
    include_once "../../model/CredorModel.php";
    $model =new CredorModel(null,null,null,null,null,null,null,null); 
    $model->excluirCredor($idCredor);
}

public static function resgataPorIdCredor($idCredor)
{
    include_once "../../model/CredorModel.php";
    $model =new CredorModel(null,null,null,null,null,null,null,null); 
    return $model->resgataPorIdCredor($idCredor);
}

function alterarCredor($idCredor,$idUsuario,$nomeCredor,$dataCadastro,$responsavelCredor,$telefoneCredor,$celularCredor,$ativo){
    include_once "../../model/CredorModel.php";
    $model = new CredorModel($idCredor,$idUsuario,$nomeCredor,$dataCadastro,$responsavelCredor,$telefoneCredor,$celularCredor,$ativo); 
    $model->alterarCredor($model);
}

}
?>