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
    <title>Formulário Listar Perfis de Acesso</title>
</head>
<body>
    <?php
     include_once("../../controller/PerfilAcesso/PerfilAcessoController.php");
     $res = PerfilAcessoController::listarPerfilAcesso();
     $qtd = $res->rowCount();
    if($qtd>0){
        print "<table border='1'>";
        print "<tr>";
            print "<th>#</th>";
            print "<th>Perfil</th>";
            print "<th>Data de Cadastro</th>";
            print "<th>Ativo</th>"; 
            print "<th colspan='2'>Ações</th>"; 
        print "</tr>";
        while($row = $res->fetch(PDO::FETCH_OBJ)){
            print "<tr>";
                print "<td>".$row->idPerfil."</td>";
                print "<td>".$row->nomePerfil."</td>";
                print "<td>".$row->dataCadastro."</td>";
                print "<td>".$row->ativo."</td>";
                print "<td><button onclick=\"location.href='formPerfilAcesso.php?op=Alterar&idPerfil=".$row->idPerfil."';\">Alterar</button></td>";
                print "<td><button onclick=\"if(confirm('Tem certeza que deseja excluir?')){
                    location.href='../../controller/PerfilAcesso/processaPerfilAcesso.php?op=Excluir&idPerfil=".$row->idPerfil."';
                }
                else{
                    false;
                }\">Excluir</button></td>";
            print "</tr>";
        }
        print "</table>";
    }
    else{
        echo "<p>Nenhum registro encontrado!!!!</p>";
    }
    print "<button type='button' onclick='location.href=\"../../view/menuIndex.php\"'>Voltar</button>";

?>
</body>
</html>