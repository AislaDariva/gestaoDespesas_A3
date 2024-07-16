<?php
class DespesaDAO{
    protected $conn;

    function cadastraDespesa(DespesaModel $despesa){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql ="INSERT INTO despesa (idCredor,idUsuario,nomeDespesa,dataCadastro,ativo) VALUES (:idCredor, :idUsuario, :nomeDespesa, :dataCadastro, :ativo)";
        $stmt = $conex->conn->prepare($sql);
        $stmt->bindValue(':idCredor',$despesa->getIdCredor());
        $stmt->bindValue(':idUsuario',$despesa->getIdUsuario());
        $stmt->bindValue(':nomeDespesa',$despesa->getNomeDespesa());
        $stmt->bindValue(':dataCadastro',$despesa->getDataCadastro());
        $stmt->bindValue(':ativo',$despesa->getAtivo());
        $res = $stmt->execute();
        if ($res) {
            echo "<script>alert('cadastro realizado com sucesso.');</script>";
        }
        else
        {
            echo "<script>alert('Erro: não foi possível realizar o cadastro.');</script>";
        }
        echo "<script>location.href='processaDespesa.php?op=Listar';</script>";
    }

    function listarDespesa()
    {
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql="SELECT * FROM despesa ORDER BY idDespesa";
        return $conex->conn->query($sql); 
    }

    function excluirDespesa($idDespesa){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql="DELETE FROM despesa WHERE idDespesa=".$idDespesa;
        $res = $conex->conn->query($sql);
        if ($res) {
            echo "<script>alert('Exclusão realizada com sucesso.');</script>";
        }
        else
        {
            echo "<script>alert('Erro: não foi possível realizar a exclusão.');</script>";
        }
        echo "<script>location.href='processaDespesa.php?op=Listar';</script>";

    }

    function resgataPorID($idDespesa){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql ="SELECT * FROM despesa WHERE idDespesa='$idDespesa'";
        return $conex->conn->query($sql);
    }

    function alterarDespesa(DespesaModel $despesa){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql ="UPDATE despesa SET idCredor = :idCredor, idUsuario = :idUsuario, nomeDespesa = :nomeDespesa, dataCadastro = :dataCadastro, ativo = :ativo WHERE idDespesa = :idDespesa"; 
        $stmt = $conex->conn->prepare($sql);
        $stmt->bindValue(':idDespesa',$despesa->getIdDespesa());
        $stmt->bindValue(':idCredor',$despesa->getIdCredor());
        $stmt->bindValue(':idUsuario',$despesa->getIdUsuario());
        $stmt->bindValue(':nomeDespesa',$despesa->getNomeDespesa());
        $stmt->bindValue(':dataCadastro',$despesa->getDataCadastro());
        $stmt->bindValue(':ativo',$despesa->getAtivo()); 
        $res = $stmt->execute();
        if ($res) {
            echo "<script>alert('Alteração realizada com sucesso.');</script>";
        }
        else
        {
            echo "<script>alert('Erro: não foi possível realizar a alteração.');</script>";
        }
        echo "<script>location.href='processaDespesa.php?op=Listar';</script>";

    }


}
?>