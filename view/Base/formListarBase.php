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
    <title>Formulário Listar Bases Físicas</title>
</head>
<body>
    <?php
     include_once("../../controller/Base/BaseController.php");
     $res = BaseController::listarBase();
     $qtd = $res->rowCount();
     include_once("../../controller/Usuario/UsuarioController.php");
     $listaUsuarios = UsuarioController::listarUsuario()->fetchAll(PDO::FETCH_ASSOC);
    if($qtd>0){
        print "<table border='1'>";
        print "<tr>";
            print "<th>#</th>";
            print "<th>Usuário</th>";
            print "<th>Base</th>";
            print "<th>Data de Cadastro</th>"; 
            print "<th>Responsável</th>";   
            print "<th>Telefone</th>";
            print "<th>Celular</th>"; 
            print "<th>Email</th>";   
            print "<th>Ativo</th>"; 
            print "<th colspan='2'>Ações</th>";  
        print "</tr>";
        while($row = $res->fetch(PDO::FETCH_OBJ)){
            print "<tr>";
                print "<td>".$row->idBase."</td>";
                foreach($listaUsuarios as $usuario){
                    if($usuario['idUsuario'] == $row->idUsuario){
                        print "<td>".$usuario['nomeUsuario']."</td>";
                        break;
                    }
                }
                print "<td>".$row->nomeBase."</td>";
                print "<td>".$row->dataCadastro."</td>";
                print "<td>".$row->responsavelBase."</td>";
                print "<td>".$row->telefoneBase."</td>";
                print "<td>".$row->celularBase."</td>";
                print "<td>".$row->emailBase."</td>";
                print "<td>".$row->ativo."</td>";
                print "<td><button onclick=\"location.href='formBase.php?op=Alterar&idBase=".$row->idBase."';\">Alterar</button></td>";
                print "<td><button onclick=\"if(confirm('Tem certeza que deseja excluir?')){
                    location.href='../../controller/Base/processaBase.php?op=Excluir&idBase=".$row->idBase."';
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