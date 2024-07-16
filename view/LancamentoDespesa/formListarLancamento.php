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
    <title>Formulário Listar Lançamentos</title>
</head>
<body>
    <?php
     include_once("../../controller/LancamentoDespesa/LancamentoController.php");
     $res = LancamentoController::listarLancamento();
     $qtd = $res->rowCount();
     include_once("../../controller/Base/BaseController.php");
     $listaBases = BaseController::listarBase()->fetchAll(PDO::FETCH_ASSOC);
     include_once("../../controller/Usuario/UsuarioController.php");
     $listaUsuarios = UsuarioController::listarUsuario()->fetchAll(PDO::FETCH_ASSOC);
     include_once("../../controller/TipoDespesa/DespesaController.php");
     $listaDespesas = DespesaController::listarDespesa()->fetchAll(PDO::FETCH_ASSOC);
    if($qtd>0){
        print "<table border='1'>";
        print "<tr>";
            print "<th>#</th>";
            print "<th>Base Física</th>";
            print "<th>Usuário</th>";
            print "<th>Despesa</th>"; 
            print "<th>Competência Despesa</th>";   
            print "<th>Data Vencimento</th>"; 
            print "<th>Valor Líquido</th>";   
            print "<th>Valor Multa</th>";   
            print "<th>Valor Correção</th>";   
            print "<th>Valor Juros</th>";   
            print "<th>Data de Cadastro</th>";   
            print "<th>Ativo</th>";   
            print "<th>Observação</th>";   
            print "<th colspan='2'>Ações</th>";   
        print "</tr>";
        while($row = $res->fetch(PDO::FETCH_OBJ)){
            print "<tr>";
                print "<td>".$row->idLancamento."</td>";
                foreach($listaBases as $base){
                    if($base['idBase'] == $row->idBase){
                        print "<td>".$base['nomeBase']."</td>";
                        break;
                    }
                }
                foreach($listaUsuarios as $usuario){
                    if($usuario['idUsuario'] == $row->idUsuario){
                        print "<td>".$usuario['nomeUsuario']."</td>";
                        break;
                    }
                }
                foreach($listaDespesas as $despesa){
                    if($despesa['idDespesa'] == $row->idDespesa){
                        print "<td>".$despesa['nomeDespesa']."</td>";
                        break;
                    }
                }
                print "<td>".$row->competenciaDespesa."</td>";
                print "<td>".$row->dataVencimento."</td>";
                print "<td>".$row->valorLiquido."</td>";
                print "<td>".$row->valorMulta."</td>";
                print "<td>".$row->valorCorrecao."</td>";
                print "<td>".$row->valorJuros."</td>";
                print "<td>".$row->dataCadastro."</td>";
                print "<td>".$row->ativo."</td>";
                print "<td>".$row->observacao."</td>";
                print "<td><button onclick=\"location.href='formLancamento.php?op=Alterar&idLancamento=".$row->idLancamento."';\">Alterar</button></td>";
                print "<td><button onclick=\"if(confirm('Tem certeza que deseja excluir?')){
                    location.href='../../controller/LancamentoDespesa/processaLancamento.php?op=Excluir&idLancamento=".$row->idLancamento."';
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