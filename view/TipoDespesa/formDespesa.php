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
        include_once ("../../controller/TipoDespesa/DespesaController.php");
        $res = DespesaController::resgataPorID($_REQUEST["idDespesa"]);
        $row = $res->fetch(PDO::FETCH_OBJ);
        $idCredor = $row->idCredor;
        $idUsuario=$row->idUsuario;
        $nomeDespesa =$row->nomeDespesa;
        $dataCadastro =$row->dataCadastro;
        $ativo =$row->ativo;
        $idDespesa = $row->idDespesa;
    }
    else
    {
        $operacao = "Incluir";
        $idCredor = "";
        $idUsuario ="";
        $nomeDespesa ="";
        $dataCadastro ="";
        $ativo ="";
        $idDespesa ="";
    }
    include_once("../../controller/Credor/CredorController.php");
    $listaCredor = CredorController::listarCredor();
    include_once("../../controller/Usuario/UsuarioController.php");
    $listaUsuario = UsuarioController::listarUsuario();


    print '<h1> Formulário de cadastro de Despesas </h1><br>';
    print '<form action="../../controller/TipoDespesa/processaDespesa.php" method="post">';
    print '    <label for="idCredor">Credor:</label>';
    print '    <select name="idCredor">';
        while ($credor = $listaCredor->fetch(PDO::FETCH_OBJ)){
        print '<option value='.$credor->idCredor.'>'.$credor->nomeCredor.'</option>';
    }
    print '</select><br>';
    print '    <label for="idUsuario">Usuario:</label>';
    print '    <select name="idUsuario">';
        while ($usuario = $listaUsuario->fetch(PDO::FETCH_OBJ)){
        print '<option value='.$usuario->idUsuario.'>'.$usuario->nomeUsuario.'</option>';
    }
    print '</select><br>';
    print '    <label for="nomeDespesa">Nome da Despesa:</label>';
    print '    <input type="text" name="nomeDespesa" value="'.$nomeDespesa.'"><br>';
    print '    <label for="dataCadastro">Data de Cadastro:</label>';
    print '    <input type="text" name="dataCadastro" value='.$dataCadastro.'><br>';
    print '    <label for="ativo">Ativo:</label>';
    print '    <input type="text" name="ativo" value='.$ativo.'><br>';
    print '    <input type="hidden" name="op" value='.$operacao.'>';
    print '    <input type="hidden" name="idDespesa" value='.$idDespesa.'>';  
    print '    <input type="submit" value='.$operacao.'>';
    print "<button type='button' onclick='location.href=\"../../view/menuIndex.php\"'>Voltar</button>";
    print '</form>';
    ?>
</body>
</html>