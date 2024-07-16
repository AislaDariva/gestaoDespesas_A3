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
        
        include_once ("../../controller/Base/BaseController.php");
        $res = BaseController::resgataPorID($_REQUEST["idBase"]);
        $row = $res->fetch(PDO::FETCH_OBJ);
        $idUsuario = $row->idUsuario;
        $nomeBase = $row->nomeBase;
        $dataCadastro = $row->dataCadastro;
        $responsavelBase = $row->responsavelBase;
        $telefoneBase = $row->telefoneBase;
        $celularBase = $row->celularBase;
        $emailBase = $row->emailBase;
        $ativo = $row->ativo;
        $idBase = $row->idBase;
    }
    else
    {
        $operacao = "Incluir";
        $idUsuario = "";
        $nomeBase="";
        $dataCadastro ="";
        $responsavelBase ="";
        $telefoneBase ="";
        $celularBase ="";
        $emailBase ="";
        $ativo ="";
        $idBase ="";
    }

    include_once("../../controller/Usuario/UsuarioController.php");
    $listaUsuarios = UsuarioController::listarUsuario();


    print '<h1> Formulário de cadastro de Base Física</h1><br>';
    print '<form action="../../controller/Base/processaBase.php" method="post">';
    print '    <label for="idUsuario">Usuario:</label>';
    print '<select name="idUsuario">';
        while ($usuario = $listaUsuarios->fetch(PDO::FETCH_OBJ)){
        print '<option value='.$usuario->idUsuario.'>'.$usuario->nomeUsuario.'</option>';
    }
    print '</select><br>';
    print '    <label for="nomeBase">Nome da Base:</label>';
    print '    <input type="text" name="nomeBase" value="'.$nomeBase.'"><br>';
    print '    <label for="dataCadastro">Data de Cadastro:</label>';
    print '    <input type="text" name="dataCadastro" value='.$dataCadastro.'><br>';
    print '    <label for="responsavelBase">Responsável:</label>';
    print '    <input type="text" name="responsavelBase" value="'.$responsavelBase.'"><br>';
    print '    <label for="telefoneBase">Telefone:</label>';
    print '    <input type="text" name="telefoneBase" value='.$telefoneBase.'><br>';
    print '    <label for="celularBase">Celular:</label>';
    print '    <input type="text" name="celularBase" value='.$celularBase.'><br>';
    print '    <label for="emailBase">Email:</label>';
    print '    <input type="text" name="emailBase" value='.$emailBase.'><br>';    
    print '    <label for="ativo">Ativo:</label>';
    print '    <input type="text" name="ativo" value='.$ativo.'><br>';
    print '    <input type="hidden" name="op" value='.$operacao.'>'; 
    print '    <input type="hidden" name="idBase" value='.$idBase.'>';  
    print '    <input type="submit" value='.$operacao.'>';
    print "<button type='button' onclick='location.href=\"../../view/menuIndex.php\"'>Voltar</button>";
    print '</form>';
    ?>
</body>
</html>