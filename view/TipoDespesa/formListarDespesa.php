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
    <title>Formulário Listar Despesas</title>
</head>
<body>
    <?php
     include_once("../../controller/TipoDespesa/DespesaController.php");
     $res = DespesaController::listarDespesa();
     $qtd = $res->rowCount();
     include_once("../../controller/Credor/CredorController.php");
     $listaCredores = CredorController::listarCredor()->fetchAll(PDO::FETCH_ASSOC);
     include_once("../../controller/Usuario/UsuarioController.php");
     $listaUsuarios = UsuarioController::listarUsuario()->fetchAll(PDO::FETCH_ASSOC);

    if($qtd>0){
        print "<table border='1'>";
        print "<tr>";
            print "<th>#</th>";
            print "<th>Credor</th>";
            print "<th>Usuario</th>";
            print "<th>Tipo de despesa</th>"; 
            print "<th>Data de Cadastro</th>";   
            print "<th>Ativo</th>";
            print "<th colspan='2'>Ações</th>";
        print "</tr>";
        while($row = $res->fetch(PDO::FETCH_OBJ)){
            print "<tr>";                
                print "<td>".$row->idDespesa."</td>";
                foreach($listaCredores as $credor){
                    if($credor['idCredor'] == $row->idCredor){
                        print "<td>".$credor['nomeCredor']."</td>";
                        break;
                    }
                }
                foreach($listaUsuarios as $usuario){
                    if($usuario['idUsuario'] == $row->idUsuario){
                        print "<td>".$usuario['nomeUsuario']."</td>";
                        break;
                    }
                }
                print "<td>".$row->nomeDespesa."</td>";
                print "<td>".$row->dataCadastro."</td>";
                print "<td>".$row->ativo."</td>";
                print "<td><button onclick=\"location.href='formDespesa.php?op=Alterar&idDespesa=".$row->idDespesa."';\">Alterar</button></td>";
                print "<td><button onclick=\"if(confirm('Tem certeza que deseja excluir?')){
                    location.href='../../controller/TipoDespesa/processaDespesa.php?op=Excluir&idDespesa=".$row->idDespesa."';
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