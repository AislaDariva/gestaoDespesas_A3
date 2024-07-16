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
        include_once ("../../controller/PerfilAcesso/perfilAcessoController.php");
        $res = perfilAcessoController::resgataPorID($_REQUEST["idPerfil"]);
        $row = $res->fetch(PDO::FETCH_OBJ);
        $nomePerfil = $row->nomePerfil;
        $dataCadastro=$row->dataCadastro;
        $ativo=$row->ativo;
        $idPerfil=$row->idPerfil;
    }
    else
    {
        $operacao = "Incluir";
        $nomePerfil = "";
        $dataCadastro="";
        $ativo ="";
        $idPerfil ="";
    }
    print '<h1> Formulário de cadastro de Perfis de Acesso</h1><br>';
    print '<form action="../../controller/PerfilAcesso/ProcessaPerfilAcesso.php" method="post">';
    print '    <label for="nomePerfil">Nome Perfil:</label>';
    print '    <input type="text" name="nomePerfil" value="'.$nomePerfil.'"><br>';
    print '    <label for="dataCadastro">Data de Cadastro:</label>';
    print '    <input type="text" name="dataCadastro" value='.$dataCadastro.'><br>';
    print '    <label for="ativo">Ativo:</label>';
    print '    <input type="text" name="ativo" value='.$ativo.'><br>';
    print '    <input type="hidden" name="op" value='.$operacao.'>'; 
    print '    <input type="hidden" name="idPerfil" value='.$idPerfil.'>';  
    print '    <input type="submit" value='.$operacao.'>';
    print "<button type='button' onclick='location.href=\"../../view/menuIndex.php\"'>Voltar</button>";
    print '</form>';
    ?>
</body>
</html>