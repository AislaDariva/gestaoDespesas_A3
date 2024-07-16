<?php
class UsuarioDAO{
    protected $conn;

    function cadastraUsuario(UsuarioModel $usuario)
    {
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql ="INSERT INTO usuario (idPerfil,nomeUsuario,emailUsuario,loginUsuario,senhaUsuario,dataCadastro,telefoneCelular,ativo) VALUES (:idPerfil, :nomeUsuario, :emailUsuario, :loginUsuario, :senhaUsuario, :dataCadastro, :telefoneCelular, :ativo)";
        $stmt = $conex->conn->prepare($sql);
        $stmt->bindValue(':idPerfil',$usuario->getIdPerfil());
        $stmt->bindValue(':nomeUsuario',$usuario->getNomeUsuario());
        $stmt->bindValue(':emailUsuario',$usuario->getEmailUsuario());
        $stmt->bindValue(':loginUsuario',$usuario->getloginUsuario());
        $stmt->bindValue(':senhaUsuario',$usuario->getSenhaUsuario());
        $stmt->bindValue(':dataCadastro',$usuario->getDataCadastro());
        $stmt->bindValue(':telefoneCelular',$usuario->getTelefoneCelular());
        $stmt->bindValue(':ativo',$usuario->getAtivo()); 
        $res = $stmt->execute();
        if ($res) {
            echo "<script>alert('cadastro realizado com sucesso.');</script>";
        }
        else
        {
            echo "<script>alert('Erro: não foi possível realizar o cadastro.');</script>";
        }
        echo "<script>location.href='processaUsuario.php?op=Listar';</script>";
    }

    function listarUsuario()
    {
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql="SELECT * FROM usuario ORDER BY idUsuario";
        return $conex->conn->query($sql); 
    }

    function excluirUsuario($idUsuario){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql="DELETE FROM usuario WHERE idUsuario=".$idUsuario;
        $res = $conex->conn->query($sql);
        if ($res) {
            echo "<script>alert('Exclusão realizada com sucesso.');</script>";
        }
        else
        {
            echo "<script>alert('Erro: não foi possível realizar a exclusão.');</script>";
        }
        echo "<script>location.href='processaUsuario.php?op=Listar';</script>";

    }

    function resgataPorID($idUsuario){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql ="SELECT * FROM usuario WHERE idUsuario='$idUsuario'";
        return $conex->conn->query($sql);
    }

    function resgataPorLogin($loginUsuario){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql ="SELECT * FROM usuario WHERE loginUsuario='$loginUsuario'";
        return $conex->conn->query($sql);
    }


    function alterarUsuario(UsuarioModel $usuario){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        
        $sql ="UPDATE usuario 
        SET idPerfil = :idPerfil, 
        nomeUsuario = :nomeUsuario, 
        emailUsuario = :emailUsuario, 
        loginUsuario = :loginUsuario, 
        senhaUsuario = :senhaUsuario, 
        dataCadastro = :dataCadastro, 
        telefoneCelular = :telefoneCelular, 
        ativo = :ativo 
        WHERE idUsuario = :idUsuario"; 
        
        $stmt = $conex->conn->prepare($sql);
        $stmt->bindValue(':idUsuario',$usuario->getIdUsuario());
        $stmt->bindValue(':idPerfil',$usuario->getIdPerfil());
        $stmt->bindValue(':nomeUsuario',$usuario->getNomeUsuario());
        $stmt->bindValue(':emailUsuario',$usuario->getEmailUsuario());
        $stmt->bindValue(':loginUsuario',$usuario->getLoginUsuario());
        $stmt->bindValue(':senhaUsuario',$usuario->getSenhaUsuario());
        $stmt->bindValue(':dataCadastro',$usuario->getDataCadastro());
        $stmt->bindValue(':telefoneCelular',$usuario->getTelefoneCelular());
        $stmt->bindValue(':ativo',$usuario->getAtivo());
        
        $res = $stmt->execute();
        if ($res) {
            echo "<script>alert('Alteração realizada com sucesso.');</script>";
        }
        else
        {
            echo "<script>alert('Erro: não foi possível realizar a alteração.');</script>";
        }
        echo "<script>location.href='processaUsuario.php?op=Listar';</script>";

    }


}
?>