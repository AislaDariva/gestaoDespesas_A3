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
    <title>Formulário Listar Usuários</title>
</head>
<body>
    <?php
     include_once("../../controller/Usuario/UsuarioController.php");
     $res = UsuarioController::listarUsuario();
     $qtd = $res->rowCount();
     include_once("../../controller/PerfilAcesso/PerfilAcessoController.php");
     $listaPerfis = PerfilAcessoController::listarPerfilAcesso()->fetchAll(PDO::FETCH_ASSOC);
    if($qtd>0){
        print "<table border='1'>";
        print "<tr>";
            print "<th>#</th>";
            print "<th>Perfil</th>";
            print "<th>Nome</th>";
            print "<th>Email</th>"; 
            print "<th>Login</th>";    
            print "<th>Data de Cadastro</th>";   
            print "<th>Telefone/Celular</th>";
            print "<th>Ativo</th>";  
            print "<th colspan='2'>Ações</th>";   
        print "</tr>";
        
        while($row = $res->fetch(PDO::FETCH_OBJ)){
            print "<tr>";
                print "<td>".$row->idUsuario."</td>";
                foreach($listaPerfis as $perfil){
                    if($perfil['idPerfil'] == $row->idPerfil){
                        print "<td>".$perfil['nomePerfil']."</td>";
                        break;
                    }
                }
                print "<td>".$row->nomeUsuario."</td>";
                print "<td>".$row->emailUsuario."</td>";
                print "<td>".$row->loginUsuario."</td>";
                print "<td>".$row->dataCadastro."</td>";
                print "<td>".$row->telefoneCelular."</td>";
                print "<td>".$row->ativo."</td>";
                print "<td><button onclick=\"location.href='formUsuario.php?op=Alterar&idUsuario=".$row->idUsuario."';\">Alterar</button></td>";
                print "<td><button onclick=\"if(confirm('Tem certeza que deseja excluir?')){
                    location.href='../../controller/Usuario/processaUsuario.php?op=Excluir&idUsuario=".$row->idUsuario."';
                }
                else{
                    false;
                }\">Excluir</button></td>";
            print "</tr>";
        }
        print "</table>";
    }
    
    else{
        echo "<p>Nenhum registro encontrado.</p>";
    }
    print "<button type='button' onclick='location.href=\"../../view/menuIndex.php\"'>Voltar</button>";

?>
</body>
</html>