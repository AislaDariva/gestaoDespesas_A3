<?php
class LancamentoController{

public function cadastraLancamento($idBase,$idUsuario,$idDespesa,$competenciaDespesa,$dataVencimento,$valorLiquido,$valorMulta,$valorCorrecao,$dataCadastro,$ativo,$observacao,$valorJuros){
    include_once "../../Model/LancamentoModel.php";;
    $lancamento = new LancamentoModel(null,$idBase,$idUsuario,$idDespesa,$competenciaDespesa,$dataVencimento,$valorLiquido,$valorMulta,$valorCorrecao,$dataCadastro,$ativo,$observacao, $valorJuros);
    $lancamento->cadastraLancamento($lancamento);
} 

public static function listarLancamento()
{
    include_once "../../Model/LancamentoModel.php";
    $model =new LancamentoModel(null,null,null,null,null,null, null,null,null,null,null,null,null); 
    return $model->listarLancamento();
}

public function excluirLancamento($idLancamento)
{
    include_once "../../Model/LancamentoModel.php";;
    $model =new LancamentoModel(null,null,null,null,null,null,null,null,null,null,null,null,null); 
    $model->excluirLancamento($idLancamento);
}

public static function resgataPorID($idLancamento)
{
    include_once "../../Model/LancamentoModel.php";;
    $model =new LancamentoModel(null,null,null,null,null,null,null,null,null,null,null,null,null); 
    return $model->resgataPorID($idLancamento);
}

public function alterarLancamento($idLancamento,$idBase,$idUsuario,$idDespesa,$competenciaDespesa,$dataVencimento,$valorLiquido,$valorMulta,$valorCorrecao,$dataCadastro,$ativo,$observacao,$valorJuros){
    include_once "../../Model/LancamentoModel.php";;
    $model = new LancamentoModel($idLancamento,$idBase,$idUsuario,$idDespesa,$competenciaDespesa,$dataVencimento,$valorLiquido,$valorMulta,$valorCorrecao,$dataCadastro,$ativo,$observacao,$valorJuros); 
    $model->alterarLancamento($model);
}

public static function listarComFiltros($filtroCredor, $filtroTipoDespesa, $filtroBase, $filtroDataInicio, $filtroDataFim)
{
    include_once "../../Model/LancamentoModel.php";
    $model =new LancamentoModel(null,null,null,null,null,null, null,null,null,null,null,null, null); 
    return $model->listarComFiltros($filtroCredor, $filtroTipoDespesa, $filtroBase, $filtroDataInicio, $filtroDataFim);

}

}
?>