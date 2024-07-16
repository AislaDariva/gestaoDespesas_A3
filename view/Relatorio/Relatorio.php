<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório com filtros</title>
</head>
<body>

<b>Filtrar Despesas Por:</b> <br />

<form method="post" action="../../controller/LancamentoDespesa/processaLancamento.php" method="post">
    <?php
        print '<label for="filtro_TipoDespesa">Tipo de Despesa:</label>';
        print '<select name="filtro_TipoDespesa">';
        print '<option value=0>Selecione</option>';
        include_once ("../../controller/TipoDespesa/DespesaController.php");
        $listarTipoDespesas = DespesaController::listarDespesa();
        while ($filtroTipoDespesa = $listarTipoDespesas->fetch(PDO::FETCH_OBJ)){
            print '<option value='.$filtroTipoDespesa->idDespesa.'>'.$filtroTipoDespesa->nomeDespesa.'</option>';
        }
        print '</select><br>';

        include_once ("../../controller/Base/BaseController.php");
        $listarBases = BaseController::listarBase();
        print '<label for="filtro_Base">Base Física::</label>';
        print '<select name="filtro_Base">';
        print '<option value=0>Selecione</option>';
        while ($filtroBase = $listarBases->fetch(PDO::FETCH_OBJ)){
            print '<option value='.$filtroBase->idBase.'>'.$filtroBase->nomeBase.'</option>';
        }
        print '</select><br>';
        print '<label>Cadastrado em: </label>';
        print '<input name="filtro_data_inicio" type="date"></input>';
        print '<label> até </label>';
        print '<input name="filtro_data_fim" type="date"></input>';
        print '<input type="hidden" name="op" value="ListarFiltros">'; 
        print '<hr /><button type="submit">Filtrar</button>';
?>
</form>



<button onclick="location.href='Relatorio.php?downloadcsv=true'">Exportar CSV</button>

<?php
include_once ("../../controller/LancamentoDespesa/LancamentoController.php");
$res = LancamentoController::listarLancamento();

if (isset($_REQUEST['credor'])) {
    $filtroCredor = $_REQUEST["credor"];
    $filtroTipoDespesa = $_REQUEST["tipoDespesa"];
    $filtroBase = $_REQUEST["base"];
    $filtroDataInicio = null;
    $filtroDataFim = null;
    if (isset($_REQUEST["dataI"]) && isset($_REQUEST["dataF"])) {
        
        $filtroDataInicio = $_REQUEST["dataI"];
        $filtroDataFim = $_REQUEST["dataF"];
    }

    $res = LancamentoController::listarComFiltros($filtroCredor, $filtroTipoDespesa, $filtroBase, $filtroDataInicio, $filtroDataFim);
}

print "<table border='1'>";
  print "<tr>";
      print "<th>Núm</th>";
      print "<th>Mês</th>";
      print "<th>Credor</th>"; 
      print "<th>Base</th>";   
      print "<th>Tipo Despesa</th>";
      print "<th>Vencimento</th>";
      print "<th>Multa</th>"; 
      print "<th>Juros</th>";
      print "<th>Correção</th>"; 
      print "<th>ValorLiquido</th>"; 
      print "<th>Valor Total</th>"; 
  print "</tr>";

while($row = $res->fetch(PDO::FETCH_OBJ)){

    print "<tr>";
    print "<td>".$row->idLancamento."</td>";
    print "<td>".date('F', strtotime($row->dataCadastro))."</td>";
    print "<td>CEEE</td>";
    $listarBases = BaseController::listarBase();
    while($base = $listarBases->fetch(PDO::FETCH_OBJ)){
        if($base->idBase == $row->idBase){
            print "<td>".$base->nomeBase."</td>";
            break;
        }
    }
    $listarDespesas = DespesaController::listarDespesa();
    while($despesa = $listarDespesas->fetch(PDO::FETCH_OBJ)){
        if($despesa->idDespesa == $row->idDespesa){
            print "<td>".$despesa->nomeDespesa."</td>";
            break;
        }
    }
    print "<td>".$row->dataVencimento."</td>";
    print "<td>".$row->valorMulta."</td>";
    print "<td>".$row->valorJuros."</td>";
    print "<td>".$row->valorCorrecao."</td>";
    print "<td>".$row->valorLiquido."</td>";
    print "<td>".$row->valorLiquido + $row->valorMulta + $row->valorCorrecao + $row->valorJuros."</td>";
    print "</tr>";

}
print "</table>";

function array2csv(array &$array)
{
    if (count($array) == 0) {
      return null;
    }
    ob_start();
    $df = fopen("php://output", 'w');
    fputcsv($df, array_keys(reset($array)));
    foreach ($array as $row) {
       fputcsv($df, $row);
    }
    fclose($df);
    return ob_get_clean();
}

function download_send_headers($filename) {
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");
    
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    
    header("Content-Disposition: attachment;filename={$filename}");
    header("Content-Transfer-Encoding: binary");
}

function download($array) 
    {
        download_send_headers("data_export_" . date("Y-m-d") . ".csv");
        echo array2csv($array);
        die();
    }

    if (isset($_GET['downloadcsv'])) {
        include_once("../../controller/LancamentoDespesa/LancamentoController.php");
        $res = LancamentoController::listarLancamento();
        $lancamentoArray = [];
        while($row = $res->fetch(PDO::FETCH_OBJ)){
            $lancamento = [$row->idLancamento, $row->idBase, $row->idUsuario, $row->idDespesa, $row->competenciaDespesa, $row->dataVencimento, $row->valorLiquido, $row->valorMulta, $row->valorCorrecao, $row->dataCadastro, $row->ativo, $row->observacao];
            array_push($lancamentoArray, $lancamento);
        }
        download($lancamentoArray);
    }
    print "<button type='button' onclick='location.href=\"../../view/menuIndex.php\"'>Voltar</button>";
    

?>
</body>
</html>