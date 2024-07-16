<?php
class CredorDAO{
    protected $conn;

    function cadastraCredor(CredorModel $credor)
    {
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql ="INSERT INTO credor (idUsuario,nomeCredor,dataCadastro,responsavelCredor,telefoneCredor,celularCredor,ativo) VALUES (:idUsuario,:nomeCredor,:dataCadastro,:responsavelCredor,:telefoneCredor,:celularCredor,:ativo)"; 
        $stmt = $conex->conn->prepare($sql);
        $stmt->bindValue(':idUsuario',$credor->getIdUsuario());
        $stmt->bindValue(':nomeCredor',$credor->getNomeCredor());
        $stmt->bindValue(':dataCadastro',$credor->getDataCadastro());
        $stmt->bindValue(':responsavelCredor',$credor->getResponsavelCredor());
        $stmt->bindValue(':telefoneCredor',$credor->getTelefoneCredor());
        $stmt->bindValue(':celularCredor',$credor->getCelularCredor());
        $stmt->bindValue(':ativo',$credor->getAtivo()); 
        $res = $stmt->execute();
        if ($res) {
            echo "<script>alert('cadastro realizado com sucesso!!!');</script>";
        }
        else
        {
            echo "<script>alert('Erro: não foi possível realizar o cadastro!!!');</script>";
        }
        echo "<script>location.href='ProcessaCredor.php?op=Listar';</script>";
    }

    function listarCredor()
    {
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql="SELECT * FROM credor ORDER BY idCredor";
        return $conex->conn->query($sql); 
    }


    function excluirCredor($idCredor){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql="DELETE FROM credor WHERE idCredor=".$idCredor;
        $res = $conex->conn->query($sql);
        if ($res) {
            echo "<script>alert('Exclusão realizada com sucesso!!!');</script>";
        }
        else
        {
            echo "<script>alert('Erro: não foi possível realizar a exclusão!!!');</script>";
        }
        echo "<script>location.href='ProcessaCredor.php?op=Listar';</script>";

    }

    function resgataPorIdCredor($idCredor){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql ="SELECT * FROM credor WHERE idCredor='$idCredor'";
        return $conex->conn->query($sql);
    }

    function alterarCredor(CredorModel $credor){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql ="UPDATE credor SET idUsuario = :idUsuario,  nomeCredor = :nomeCredor, dataCadastro = :dataCadastro, responsavelCredor = :responsavelCredor, telefoneCredor = :telefoneCredor, celularCredor = :celularCredor, ativo = :ativo WHERE idCredor = :idCredor"; 
        $stmt = $conex->conn->prepare($sql);
        $stmt->bindValue(':idCredor',$credor->getIdCredor());
        $stmt->bindValue(':idUsuario',$credor->getIdUsuario());
        $stmt->bindValue(':nomeCredor',$credor->getNomeCredor());
        $stmt->bindValue(':dataCadastro',$credor->getDataCadastro());
        $stmt->bindValue(':responsavelCredor',$credor->getResponsavelCredor());
        $stmt->bindValue(':telefoneCredor',$credor->getTelefoneCredor());
        $stmt->bindValue(':celularCredor',$credor->getCelularCredor());
        $stmt->bindValue(':ativo',$credor->getAtivo()); 
        $res = $stmt->execute();
        if ($res) {
            echo "<script>alert('Alteração realizada com sucesso!!!');</script>";
        }
        else
        {
            echo "<script>alert('Erro: não foi possível realizar a alteração!!!');</script>";
        }
        echo "<script>location.href='ProcessaCredor.php?op=Listar';</script>";

    }


}
?>