<?php
class UsuarioModel{
    protected $idUsuario;
    protected $idPerfil;
    protected $nomeUsuario;
    protected $emailUsuario;
    protected $loginUsuario;
    protected $senhaUsuario;
    protected $dataCadastro;
    protected $telefoneCelular;
    protected $ativo;

    function __construct($idUsuario,$idPerfil,$nomeUsuario,$emailUsuario,$loginUsuario,$senhaUsuario,$dataCadastro,$telefoneCelular,$ativo)
    {
        $this->idUsuario = $idUsuario;
        $this->idPerfil = $idPerfil;
        $this->nomeUsuario = $nomeUsuario;
        $this->emailUsuario = $emailUsuario;
        $this->loginUsuario = $loginUsuario;
        $this->senhaUsuario = $senhaUsuario;
        $this->dataCadastro = $dataCadastro;
        $this->telefoneCelular = $telefoneCelular;
        $this->ativo = $ativo;
    }

    function cadastraUsuario(UsuarioModel $usuario)
    {
        include_once "../../DAO/UsuarioDAO.php";
        $usuario = new UsuarioDAO();
        $usuario->cadastraUsuario($this);
    }

    function listarUsuario()
    {
        include_once "../../DAO/UsuarioDAO.php";
        $usuario = new UsuarioDAO(null);
        return $usuario->listarUsuario();
    }

    function excluirUsuario($idUsuario)
    {
        include_once "../../DAO/UsuarioDAO.php";
        $usuario = new UsuarioDAO();
        $usuario->excluirUsuario($idUsuario);
    }

    public function resgataPorID($idUsuario)
{
    include_once "../../DAO/UsuarioDAO.php";
    $dao =new UsuarioDAO(null); 
    return $dao->resgataPorID($idUsuario);
}
 
public function  alterarUsuario($model){
        include_once "../../DAO/UsuarioDAO.php";
        $usuario = new UsuarioDAO();
        $usuario->alterarUsuario($this);    
}

public function resgataPorLogin($loginUsuario)
{
    include_once "DAO/UsuarioDAO.php";
    $dao =new UsuarioDAO(null); 
    return $dao->resgataPorLogin($loginUsuario);
}
 

    


    /**
     * Get the value of idUsuario
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set the value of idUsuario
     */
    public function setIdUsuario($idUsuario): self
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get the value of idPerfil
     */
    public function getIdPerfil()
    {
        return $this->idPerfil;
    }

    /**
     * Set the value of idPerfil
     */
    public function setIdPerfil($idPerfil): self
    {
        $this->idPerfil = $idPerfil;

        return $this;
    }

    /**
     * Get the value of nomeUsuario
     */
    public function getNomeUsuario()
    {
        return $this->nomeUsuario;
    }

    /**
     * Set the value of nomeUsuario
     */
    public function setNomeUsuario($nomeUsuario): self
    {
        $this->nomeUsuario = $nomeUsuario;

        return $this;
    }

    /**
     * Get the value of emailUsuario
     */
    public function getEmailUsuario()
    {
        return $this->emailUsuario;
    }

    /**
     * Set the value of emailUsuario
     */
    public function setEmailUsuario($emailUsuario): self
    {
        $this->emailUsuario = $emailUsuario;

        return $this;
    }

    /**
     * Get the value of loginUsuario
     */
    public function getLoginUsuario()
    {
        return $this->loginUsuario;
    }

    /**
     * Set the value of loginUsuario
     */
    public function setLoginUsuario($loginUsuario): self
    {
        $this->loginUsuario = $loginUsuario;

        return $this;
    }

    /**
     * Get the value of senhaUsuario
     */
    public function getSenhaUsuario()
    {
        return $this->senhaUsuario;
    }

    /**
     * Set the value of senhaUsuario
     */
    public function setSenhaUsuario($senhaUsuario): self
    {
        $this->senhaUsuario = $senhaUsuario;

        return $this;
    }

    /**
     * Get the value of dataCadastro
     */
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * Set the value of dataCadastro
     */
    public function setDataCadastro($dataCadastro): self
    {
        $this->dataCadastro = $dataCadastro;

        return $this;
    }

    /**
     * Get the value of telefoneCelular
     */
    public function getTelefoneCelular()
    {
        return $this->telefoneCelular;
    }

    /**
     * Set the value of telefoneCelular
     */
    public function setTelefoneCelular($telefoneCelular): self
    {
        $this->telefoneCelular = $telefoneCelular;

        return $this;
    }

    /**
     * Get the value of ativo
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set the value of ativo
     */
    public function setAtivo($ativo): self
    {
        $this->ativo = $ativo;

        return $this;
    }
}
?>