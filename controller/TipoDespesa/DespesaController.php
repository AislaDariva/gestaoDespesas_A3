<?php
class DespesaController{

public function cadastraDespesa($idCredor, $idUsuario, $nomeDespesa, $dataCadastro, $ativo){
    include_once "../../model/DespesaModel.php";
    $despesa = new DespesaModel(null,$idCredor,$idUsuario,$nomeDespesa,$dataCadastro,$ativo);
    $despesa->cadastraDespesa($despesa);
}

public static function listarDespesa(){
    include_once "../../model/DespesaModel.php";
    $model = new DespesaModel(null,null,null,null,null,null);
    return $model->listarDespesa();
}

public function excluirDespesa($idDespesa){
    include_once "../../model/DespesaModel.php";
    $model = new DespesaModel(null,null,null,null,null,null,);
    $model->excluirDespesa($idDespesa);
}

public static function resgataPorID($idDespesa){
    include_once "../../model/DespesaModel.php";
    $model =new DespesaModel(null, null,null,null,null,null); 
    return $model->resgataPorID($idDespesa);
}

function alterarDespesa($idDespesa,$idCredor,$idUsuario,$nomeDespesa,$dataCadastro,$ativo){
    include_once "../../model/DespesaModel.php";
    $model = new DespesaModel($idDespesa,$idCredor,$idUsuario,$nomeDespesa,$dataCadastro,$ativo); 
    $model->alterarDespesa($model);
}
}
?>