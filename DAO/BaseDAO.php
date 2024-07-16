<?php
class BaseDAO{
    protected $conn;

    function cadastraBase(BaseModel $base)
    {
        include_once 'conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql ="INSERT INTO base (idUsuario,nomeBase,dataCadastro,responsavelBase,telefoneBase,celularBase,emailBase,ativo) VALUES (:idUsuario, :nomeBase, :dataCadastro, :responsavelBase, :telefoneBase, :celularBase, :emailBase, :ativo)";
        $stmt = $conex->conn->prepare($sql);
        $stmt->bindValue(':idUsuario',$base->getIdUsuario());
        $stmt->bindValue(':nomeBase',$base->getNomeBase());
        $stmt->bindValue(':dataCadastro',$base->getDataCadastro());
        $stmt->bindValue(':responsavelBase',$base->getResponsavelBase());
        $stmt->bindValue(':telefoneBase',$base->getTelefoneBase());
        $stmt->bindValue(':celularBase',$base->getCelularBase());
        $stmt->bindValue(':emailBase',$base->getEmailBase());
        $stmt->bindValue(':ativo',$base->getAtivo());
        $res = $stmt->execute();
        if ($res) {
            echo "<script>alert('cadastro realizado com sucesso.');</script>";
        }
        else
        {
            echo "<script>alert('Erro: não foi possível realizar o cadastro.');</script>";
        }
        echo "<script>location.href='processaBase.php?op=Listar';</script>";
    }

    function listarBase()
    {
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql="SELECT * FROM base ORDER BY idBase";
        return $conex->conn->query($sql); 
    }

    function excluirBase($idBase){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql="DELETE FROM base WHERE idBase=".$idBase;
        $res = $conex->conn->query($sql);
        if ($res) {
            echo "<script>alert('Exclusão realizada com sucesso!!!');</script>";
        }
        else
        {
            echo "<script>alert('Erro: não foi possível realizar a exclusão!!!');</script>";
        }
        echo "<script>location.href='processaBase.php?op=Listar';</script>";

    }

    function resgataPorID($idBase){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql ="SELECT * FROM base WHERE idBase='$idBase'";
        return $conex->conn->query($sql);
    }

    function alterarBase(BaseModel $base){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql ="UPDATE base SET idUsuario = :idUsuario, nomeBase = :nomeBase, dataCadastro = :dataCadastro, responsavelBase = :responsavelBase, telefoneBase = :telefoneBase , celularBase = :celularBase , emailBase = :emailBase , ativo = :ativo WHERE idBase = :idBase"; 
        $stmt = $conex->conn->prepare($sql);
        $stmt->bindValue(':idBase',$base->getIdBase());
        $stmt->bindValue(':idUsuario',$base->getIdUsuario());
        $stmt->bindValue(':nomeBase',$base->getNomeBase());
        $stmt->bindValue(':dataCadastro',$base->getDataCadastro());
        $stmt->bindValue(':responsavelBase',$base->getResponsavelBase());
        $stmt->bindValue(':telefoneBase',$base->getTelefoneBase());
        $stmt->bindValue(':celularBase',$base->getCelularBase());
        $stmt->bindValue(':emailBase',$base->getEmailBase());
        $stmt->bindValue(':ativo',$base->getAtivo()); 
        $res = $stmt->execute();
        if ($res) {
            echo "<script>alert('Alteração realizada com sucesso.');</script>";
        }
        else
        {
            echo "<script>alert('Erro: não foi possível realizar a alteração.');</script>";
        }
        
        echo "<script>location.href='processaBase.php?op=Listar';</script>";
    }

}
?>