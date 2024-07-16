<?php
class LancamentoDAO{
    protected $conn;

    function cadastraLancamento(LancamentoModel $lancamento)
    {
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql ="INSERT INTO lancamento (idBase,idUsuario,idDespesa,competenciaDespesa,dataVencimento,valorLiquido,valorMulta,valorCorrecao,dataCadastro,ativo,observacao,valorJuros) VALUES (:idBase, :idUsuario, :idDespesa, :competenciaDespesa, :dataVencimento, :valorLiquido, :valorMulta, :valorCorrecao, :dataCadastro, :ativo, :observacao, :valorJuros)";
        $stmt = $conex->conn->prepare($sql);
        $stmt->bindValue(':idBase',$lancamento->getIdBase());
        $stmt->bindValue(':idUsuario',$lancamento->getIdUsuario());
        $stmt->bindValue(':idDespesa',$lancamento->getIdDespesa());
        $stmt->bindValue(':competenciaDespesa',$lancamento->getCompetenciaDespesa());
        $stmt->bindValue(':dataVencimento',$lancamento->getDataVencimento());
        $stmt->bindValue(':valorLiquido',$lancamento->getValorLiquido());
        $stmt->bindValue(':valorMulta',$lancamento->getValorMulta());
        $stmt->bindValue(':valorCorrecao',$lancamento->getValorCorrecao());
        $stmt->bindValue(':dataCadastro',$lancamento->getDataCadastro());
        $stmt->bindValue(':ativo',$lancamento->getAtivo());
        $stmt->bindValue(':observacao',$lancamento->getObservacao());
        $stmt->bindValue(':valorJuros',$lancamento->getvalorJuros());
        $res = $stmt->execute();
        if ($res) {
            echo "<script>alert('cadastro realizado com sucesso.');</script>";
        }
        else
        {
            echo "<script>alert('Erro: não foi possível realizar o cadastro.');</script>";
        }
        echo "<script>location.href='processaLancamento.php?op=Listar';</script>";
    }

    function listarLancamento()
    {
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql="SELECT * FROM lancamento ORDER BY idLancamento";
        return $conex->conn->query($sql); 
    }

    function listarComFiltros($filtroCredor, $filtroTipoDespesa, $filtroBase, $filtroDataInicio, $filtroDataFim)
    {  
        $sql = "SELECT * FROM lancamento";
        $sql .= " WHERE (1=1)";
        if($filtroTipoDespesa > 0){
            $sql .=" AND idDespesa =".$filtroTipoDespesa;
        }
        if($filtroBase > 0){
            $sql .=" AND idBase =".$filtroBase;
        }
        if($filtroDataInicio != "" && $filtroDataFim != ""){
            $sql .=" AND dataCadastro >= '".$filtroDataInicio."' AND dataCadastro <= '".$filtroDataFim."'";
        }
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        return $conex->conn->query($sql);
    }

    function excluirLancamento($idLancamento){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql="DELETE FROM lancamento WHERE idLancamento=".$idLancamento;
        $res = $conex->conn->query($sql);
        if ($res) {
            echo "<script>alert('Exclusão realizada com sucesso.');</script>";
        }
        else
        {
            echo "<script>alert('Erro: não foi possível realizar a exclusão.');</script>";
        }
        echo "<script>location.href='processaLancamento.php?op=Listar';</script>";

    }

    function resgataPorID($idLancamento){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql ="SELECT * FROM lancamento WHERE idLancamento='$idLancamento'";
        return $conex->conn->query($sql);
    }

    function alterarLancamento(LancamentoModel $lancamento){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql ="UPDATE lancamento SET idBase = :idBase, idUsuario = :idUsuario, idDespesa =  :idDespesa, competenciaDespesa = :competenciaDespesa, dataVencimento = :dataVencimento, valorLiquido = :valorLiquido, valorMulta = :valorMulta, valorCorrecao = :valorCorrecao, dataCadastro = :dataCadastro, ativo = :ativo, observacao = :observacao, valorJuros = :valorJuros WHERE idLancamento = :idLancamento"; 
        $stmt = $conex->conn->prepare($sql);
        $stmt->bindValue(':idLancamento',$lancamento->getIdLancamento());
        $stmt->bindValue(':idBase',$lancamento->getIdBase());
        $stmt->bindValue(':idUsuario',$lancamento->getIdUsuario());
        $stmt->bindValue(':idDespesa',$lancamento->getIdDespesa());
        $stmt->bindValue(':competenciaDespesa',$lancamento->getCompetenciaDespesa());
        $stmt->bindValue(':dataVencimento',$lancamento->getDataVencimento());
        $stmt->bindValue(':valorLiquido',$lancamento->getValorLiquido());
        $stmt->bindValue(':valorMulta',$lancamento->getValorMulta());
        $stmt->bindValue(':valorCorrecao',$lancamento->getValorCorrecao());
        $stmt->bindValue(':dataCadastro',$lancamento->getDataCadastro());
        $stmt->bindValue(':ativo',$lancamento->getAtivo());
        $stmt->bindValue(':observacao',$lancamento->getObservacao());
        $stmt->bindValue(':valorJuros',$lancamento->getValorJuros());
        $res = $stmt->execute();
        if ($res) {
            echo "<script>alert('Alteração realizada com sucesso.');</script>";
        }
        else
        {
            echo "<script>alert('Erro: não foi possível realizar a alteração.');</script>";
        }
        echo "<script>location.href='processaLancamento.php?op=Listar';</script>";

    }


}
?>