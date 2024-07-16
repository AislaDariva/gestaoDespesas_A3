<?php
class BaseController{

public function cadastraBase($idUsuario,$nomeBase,$dataCadastro,$responsavelBase,$telefoneBase,$celularBase,$emailBase,$ativo){
    include_once "../../model/BaseModel.php";
    $base = new BaseModel(null,$idUsuario,$nomeBase,$dataCadastro,$responsavelBase,$telefoneBase,$celularBase,$emailBase,$ativo);
    $base->cadastraBase($base);
} 

public static function listarBase()
{
    include_once "../../model/BaseModel.php";
    $model =new BaseModel(null,null,null,null,null,null,null,null,null); 
    return $model->listarBase();
}

public function excluirBase($idBase)
{
    include_once "../../model/BaseModel.php";
    $model =new BaseModel(null, null,null,null,null,null,null,null,null); 
    $model->excluirBase($idBase);
}

public static function resgataPorID($idBase)
{
    include_once "../../model/BaseModel.php";
    $model =new BaseModel(null, null,null,null,null,null,null,null,null); 
    return $model->resgataPorID($idBase);
}

function alterarBase($idBase,$idUsuario,$nomeBase,$dataCadastro,$responsavelBase,$telefoneBase,$celularBase,$emailBase,$ativo){
    include_once "../../model/BaseModel.php";
    $model = new BaseModel($idBase,$idUsuario,$nomeBase,$dataCadastro,$responsavelBase,$telefoneBase,$celularBase,$emailBase,$ativo); 
    $model->alterarBase($model);
}

}
?>