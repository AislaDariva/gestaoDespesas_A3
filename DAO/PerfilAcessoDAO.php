<?php
class PerfilAcessoDAO{
    protected $conn;

    function cadastraPerfilAcesso(PerfilAcessoModel $perfilAcesso){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql ="INSERT INTO Perfil (idPerfil,nomePerfil,dataCadastro,ativo) VALUES (:idPerfil, :nomePerfil, :dataCadastro, :ativo)";
        $stmt = $conex->conn->prepare($sql);
        $stmt->bindValue(':idPerfil',$perfilAcesso->getIDPerfil());
        $stmt->bindValue(':nomePerfil',$perfilAcesso->getNomePerfil());
        $stmt->bindValue(':dataCadastro',$perfilAcesso->getdataCadastro());
        $stmt->bindValue(':ativo',$perfilAcesso->getAtivo());
        $res = $stmt->execute();
        if($res){
            echo "<script>alert('Cadastro realizado com sucesso.');</script>";
        }
        else{
            echo "<script>alert('Erro: não foi possível realizar o cadastro.');</script>";
        }
        echo "<script>location.href='processaPerfilAcesso.php?op=Listar';</script>";
    }

    function listarPerfilAcesso(){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql="SELECT * FROM perfil ORDER BY idPerfil";
        return $conex->conn->query($sql);
    }
    function excluirPerfilAcesso($idPerfil){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql="DELETE FROM perfil WHERE idPerfil=".$idPerfil;
        $res = $conex->conn->query($sql);
        if ($res){
            echo "<script>alert('Exclusão realizada com sucesso.');</script>";
        }
        else{
            echo "<script>alert('Erro: não foi possível realizar a exclusão.');</script>";
        }
        echo "<script>location.href='processaPerfilAcesso.php?op=Listar';</script>";
    }

    function resgataPorID($idPerfil){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql ="SELECT * FROM perfil WHERE idPerfil='$idPerfil'";
        return $conex->conn->query($sql);
    }

    function alterarPerfilAcesso(PerfilAcessoModel $perfilAcesso){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql ="UPDATE perfil SET nomePerfil = :nomePerfil, dataCadastro = :dataCadastro, ativo = :ativo WHERE idPerfil = :idPerfil"; 
        $stmt = $conex->conn->prepare($sql);
        $stmt->bindValue(':idPerfil',$perfilAcesso->getIDPerfil());
        $stmt->bindValue(':nomePerfil',$perfilAcesso->getNomePerfil());
        $stmt->bindValue(':dataCadastro',$perfilAcesso->getDataCadastro());
        $stmt->bindValue(':ativo',$perfilAcesso->getAtivo());
        $res = $stmt->execute();
        if ($res){
            echo "<script>alert('Alteração realizada com sucesso.');</script>";
        }
        else{
            echo "<script>alert('Erro: não foi possível realizar a alteração.');</script>";
        }
        echo "<script>location.href='processaPerfilAcesso.php?op=Listar';</script>";
    }

}
?>