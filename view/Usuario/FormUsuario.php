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
        
        include_once ("../../controller/Usuario/UsuarioController.php");
        $res = UsuarioController::resgataPorID($_REQUEST["idUsuario"]);
        $row = $res->fetch(PDO::FETCH_OBJ);
        $idPerfil = $row->idPerfil;
        $nomeUsuario = $row->nomeUsuario;
        $emailUsuario = $row->emailUsuario;
        $loginUsuario = $row->loginUsuario;
        $senhaUsuario = $row->senhaUsuario;
        $dataCadastro = $row->dataCadastro;
        $telefoneCelular = $row->telefoneCelular;
        $ativo = $row->ativo;
        $idUsuario = $row->idUsuario;
    }
    else
    {
        $operacao = "Incluir";
        $idPerfil = "";
        $nomeUsuario="";
        $emailUsuario ="";
        $loginUsuario ="";
        $senhaUsuario ="";
        $dataCadastro ="";
        $telefoneCelular ="";
        $ativo ="";
        $idUsuario ="";
    }
    
    include_once ("../../controller/PerfilAcesso/PerfilAcessoController.php");
    $listaPerfis = PerfilAcessoController::listarPerfilAcesso();
    



    print '<h1> Formulário de cadastro de Usuários</h1><br>';
    print '<form action="../../controller/Usuario/processaUsuario.php" method="post">';
    print '    <label for="idPerfil">Perfil:</label>';
    print '<select name="idPerfil">';
        while ($perfil = $listaPerfis->fetch(PDO::FETCH_OBJ)){
        print '<option value='.$perfil->idPerfil.'>'.$perfil->nomePerfil.'</option>';
    }
    print '</select><br>';
    print '    <label for="nomeUsuario">Nome:</label>';
    print '    <input type="text" name="nomeUsuario" value="'.$nomeUsuario.'"><br>';
    print '    <label for="emailUsuario">Email:</label>';
    print '    <input type="text" name="emailUsuario" value='.$emailUsuario.'><br>';
    print '    <label for="loginUsuario">Login:</label>';
    print '    <input type="text" name="loginUsuario" value='.$loginUsuario.'><br>';
    print '    <label for="senhaUsuario">Senha:</label>';
    print '    <input type="password" name="senhaUsuario" value='.$senhaUsuario.'><br>';
    print '    <label for="dataCadastro">Data Cadastro:</label>';
    print '    <input type="text" name="dataCadastro" value='.$dataCadastro.'><br>';
    print '    <label for="telefoneCelular">Telefone/Celular:</label>';
    print '    <input type="text" name="telefoneCelular" value='.$telefoneCelular.'><br>';    
    print '    <label for="ativo">Ativo:</label>';
    print '    <input type="text" name="ativo" value='.$ativo.'><br>';
    print '    <input type="hidden" name="op" value='.$operacao.'>'; 
    print '    <input type="hidden" name="idUsuario" value='.$idUsuario.'>';  
    print '    <input type="submit" value='.$operacao.'>';
    print "<button type='button' onclick='location.href=\"../../view/menuIndex.php\"'>Voltar</button>";
    print '</form>';
    ?>
</body>
</html>