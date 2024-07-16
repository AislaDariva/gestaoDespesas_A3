<?php
    session_start();
    if (!isset($_SESSION['login_Usuario'])) {
        header('Location: ../../index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $operacao = $_REQUEST["op"];
    
    if($operacao=="Alterar"){
        
        include_once ("../../controller/LancamentoDespesa/LancamentoController.php");
        $res = LancamentoController::resgataPorID($_REQUEST["idLancamento"]);
        $row = $res->fetch(PDO::FETCH_OBJ);
        $idLancamento = $row->idLancamento;
        $idBase = $row->idBase;
        $idUsuario = $row->idUsuario;
        $idDespesa = $row->idDespesa;
        $competenciaDespesa = $row->competenciaDespesa;
        $dataVencimento = $row->dataVencimento;
        $valorLiquido = $row->valorLiquido;
        $valorMulta = $row->valorMulta;
        $valorCorrecao = $row->valorCorrecao;
        $dataCadastro = $row->dataCadastro;
        $ativo = $row->ativo;
        $observacao = $row->observacao;
        $idLancamento = $row->idLancamento;
        $valorJuros = $row->valorJuros;
    }
    else
    {
        $operacao = "Incluir";
        $idBase = "";
        $idUsuario="";
        $idDespesa ="";
        $competenciaDespesa ="";
        $dataVencimento ="";
        $valorLiquido ="";
        $valorMulta ="";
        $valorCorrecao ="";
        $dataCadastro ="";
        $ativo ="";
        $observacao ="";
        $idLancamento="";
        $valorJuros="";
    }

    include_once ("../../controller/Base/BaseController.php");
    $listaBases = BaseController::listarBase();
    include_once ("../../controller/Usuario/UsuarioController.php");
    $listaUsuarios = UsuarioController::listarUsuario();
    include_once ("../../controller/TipoDespesa/DespesaController.php");
    $listaDespesas = DespesaController::listarDespesa();


    print '<h1> Formulário de cadastro de Lançamentos</h1><br>';
    print '<form action="../../controller/LancamentoDespesa/processaLancamento.php" method="post">';
    
    print '<label for="idBase">Base: </label>';
    print '<select name="idBase">';
        while ($base = $listaBases->fetch(PDO::FETCH_OBJ)){
        print '<option value='.$base->idBase.'>'.$base->nomeBase.'</option>';
    }
    print '</select><br>';
    
    print '<label for="idUsuario">Usuário: </label>';
    print '<select name="idUsuario">';
    while ($usuario = $listaUsuarios->fetch(PDO::FETCH_OBJ)){
    print '<option value='.$usuario->idUsuario.'>'.$usuario->nomeUsuario.'</option>';
    }
    print '</select><br>';
    
    print '<label for="idDespesa">Despesa: </label>';
    print '<select name="idDespesa">';
        while ($despesa = $listaDespesas->fetch(PDO::FETCH_OBJ)){
        print '<option value='.$despesa->idDespesa.'>'.$despesa->nomeDespesa.'</option>';
    }
    print '</select><br>';

    
    print '    <label for="Competência">Competência Despesa:</label>';
    print '    <input type="text" name="competenciaDespesa" value='.$competenciaDespesa.'><br>';
    
    print '    <label for="dataVencimento">Data de Vencimento:</label>';
    print '    <input type="text" name="dataVencimento" value='.$dataVencimento.'><br>';
    
    print '    <label for="valorLiquido">Valor Líquido:</label>';
    print '    <input type="number" step=".01" name="valorLiquido" value='.$valorLiquido.'><br>';
    
    print '    <label for="valorMulta">Valor Multa:</label>';
    print '    <input type="number" step=".01" name="valorMulta" value='.$valorMulta.'><br>';
    
    print '    <label for="valorCorrecao">Valor Correção:</label>';
    print '    <input type="number" step=".01" name="valorCorrecao" value='.$valorCorrecao.'><br>';

    print '    <label for="valorJuros">Valor Juros:</label>';
    print '    <input type="number" step=".01" name="valorJuros" value='.$valorJuros.'><br>';
    
    print '    <label for="dataCadastro">Data de Cadastro:</label>';
    print '    <input type="text" name="dataCadastro" value='.$dataCadastro.'><br>';
    
    print '    <label for="ativo">Ativo:</label>';
    print '    <input type="text" name="ativo" value='.$ativo.'><br>';
    
    print '    <label for="observacao">Observação:</label>';
    print '    <input type="text" name="observacao" value='.$observacao.'><br>';
    
    print '    <input type="hidden" name="op" value='.$operacao.'>'; 
    print '    <input type="hidden" name="idLancamento" value='.$idLancamento.'>';  
    print '    <input type="submit" value='.$operacao.'>';
    print "<button type='button' onclick='location.href=\"../../view/menuIndex.php\"'>Voltar</button>";
    print '</form>';
    ?>
</body>
</html>