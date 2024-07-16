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
    <title>Formulário de cadastro de Credor</title>
</head>
<body>
    <?php
    $operacao = $_REQUEST["op"];
    
    if($operacao=="Alterar"){
        // resgatar dados do banco
        include_once ("../../controller/Credor/CredorController.php");
        $res = CredorController::resgataPorIdCredor($_REQUEST["idCredor"]);
        $row = $res->fetch(PDO::FETCH_OBJ);
        $idUsuario = $row->idUsuario;
        $nomeCredor = $row->nomeCredor;
        $dataCadastro=$row->dataCadastro;
        $responsavelCredor =$row->responsavelCredor;
        $telefoneCredor =$row->telefoneCredor;
        $celularCredor =$row->celularCredor;
        $ativo =$row->ativo;
        $idCredor = $row->idCredor;
    }
    else
    {
        $operacao = "Incluir";
        $idUsuario = "";
        $nomeCredor = "";
        $dataCadastro="";
        $responsavelCredor ="";
        $telefoneCredor ="";
        $celularCredor ="";
        $ativo ="";
        $idCredor="";
    }

    include_once ("../../controller/Usuario/UsuarioController.php");
    $listaUsuarios = UsuarioController::listarUsuario();



    print '<h1> Formulário de cadastro de Credor</h1><br>';
    print '<form action="../../controller/Credor/ProcessaCredor.php" method="post">';
    print '    <label for="idUsuario">Usuario:</label>';
    print '<select name="idUsuario">';
        while ($usuario = $listaUsuarios->fetch(PDO::FETCH_OBJ)){
        print '<option value='.$usuario->idUsuario.'>'.$usuario->nomeUsuario.'</option>';
}
    print '</select><br>';
    print '    <label for="nomeCredor">Nome do Credor:</label>';
    print '    <input type="text" name="nomeCredor" value="'.$nomeCredor.'"><br>';
    print '    <label for="dataCadastro">Data de Cadastro:</label>';
    print '    <input type="text" name="dataCadastro" value='.$dataCadastro.'><br>';
    print '    <label for="responsavelCredor">Responsável:</label>';
    print '    <input type="text" name="responsavelCredor" value="'.$responsavelCredor.'"><br>';
    print '    <label for="telefoneCredor">Telefone:</label>';
    print '    <input type="text" name="telefoneCredor" value='.$telefoneCredor.'><br>';
    print '    <label for="celularCredor">Celular:</label>';
    print '    <input type="text" name="celularCredor" value='.$celularCredor.'><br>';
    print '    <label for="ativo">Ativo:</label>';
    print '    <input type="text" name="ativo" value='.$ativo.'><br>';
    print '    <input type="hidden" name="op" value='.$operacao.'>'; 
    print '    <input type="hidden" name="idCredor" value='.$idCredor.'>';  
    print '    <input type="submit" value='.$operacao.'>';
    print "<button type='button' onclick='location.href=\"../../view/menuIndex.php\"'>Voltar</button>";
    print '</form>';
    ?>
</body>
</html>