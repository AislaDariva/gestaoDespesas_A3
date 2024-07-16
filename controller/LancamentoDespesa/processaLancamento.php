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
    case "ListarFiltros": listarComFiltros();
}

function incluir()
{
    $idBase = $_REQUEST["idBase"];
    $idUsuario = $_REQUEST["idUsuario"];
    $idDespesa = $_REQUEST["idDespesa"];
    $competenciaDespesa = $_REQUEST["competenciaDespesa"];
    $dataVencimento = $_REQUEST["dataVencimento"];
    $valorLiquido = $_REQUEST["valorLiquido"];
    $valorMulta = $_REQUEST["valorMulta"];
    $valorCorrecao = $_REQUEST["valorCorrecao"];
    $dataCadastro = $_REQUEST["dataCadastro"];
    $ativo = $_REQUEST["ativo"];
    $observacao = $_REQUEST["observacao"];
    $valorJuros = $_REQUEST["valorJuros"];

    include_once 'LancamentoController.php';
    $lancamento = new LancamentoController();
    $lancamento->cadastraLancamento($idBase,$idUsuario,$idDespesa,$competenciaDespesa,$dataVencimento,$valorLiquido,$valorMulta,$valorCorrecao,$dataCadastro,$ativo,$observacao, $valorJuros);

}

function excluir()
{
    $idLancamento = $_REQUEST["idLancamento"];
    include_once 'LancamentoController.php';
    $contr = new LancamentoController();
    $contr->excluirLancamento($idLancamento);
}

function listar(){
    echo "<script>location.href='../../view/LancamentoDespesa/formListarLancamento.php';</script>";
}

function alterar(){
    $idLancamento = $_REQUEST["idLancamento"];
    $idBase = $_REQUEST["idBase"];
    $idUsuario = $_REQUEST["idUsuario"];
    $idDespesa = $_REQUEST["idDespesa"];
    $competenciaDespesa = $_REQUEST["competenciaDespesa"];
    $dataVencimento = $_REQUEST["dataVencimento"];
    $valorLiquido = $_REQUEST["valorLiquido"];
    $valorMulta = $_REQUEST["valorMulta"];
    $valorCorrecao = $_REQUEST["valorCorrecao"];
    $dataCadastro = $_REQUEST["dataCadastro"];
    $ativo = $_REQUEST["ativo"];
    $observacao = $_REQUEST["observacao"];
    $valorJuros = $_REQUEST["valorJuros"];
    include_once 'LancamentoController.php';
    $lancamento = new LancamentoController();
    $lancamento->alterarLancamento($idLancamento,$idBase,$idUsuario,$idDespesa,$competenciaDespesa,$dataVencimento,$valorLiquido,$valorMulta,$valorCorrecao,$dataCadastro,$ativo,$observacao,$valorJuros);  
}

function listarComFiltros(){
    $filtroCredor = "";
    $filtroTipoDespesa = $_REQUEST["filtro_TipoDespesa"];
    $filtroBase = $_REQUEST["filtro_Base"];
    $filtroDataInicio = $_REQUEST["filtro_data_inicio"];
    $filtroDataFim = $_REQUEST["filtro_data_fim"];
    
    echo "<script>location.href='../../view/Relatorio/Relatorio.php?credor=".$filtroCredor."&tipoDespesa=".$filtroTipoDespesa."&base=".$filtroBase."&dataI=".$filtroDataInicio."&dataF=".$filtroDataFim."';</script>";
}

?>