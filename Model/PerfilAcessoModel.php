<?php
class PerfilAcessoModel{
    protected $idPerfil;
    protected $nomePerfil;
    protected $dataCadastro;
    protected $ativo;

    function __construct($idPerfil,$nomePerfil,$dataCadastro,$ativo){
        $this->idPerfil = $idPerfil;
        $this->nomePerfil = $nomePerfil;
        $this->dataCadastro = $dataCadastro;
        $this->ativo = $ativo;
}

    function cadastraPerfilAcesso(PerfilAcessoModel $perfilAcesso)
    {
        include_once "../../DAO/PerfilAcessoDAO.php";
        $perfilAcesso = new PerfilAcessoDAO();
        $perfilAcesso->cadastraPerfilAcesso($this);
    }
    
    function listarPerfilAcesso()
    {
        include_once "../../DAO/PerfilAcessoDAO.php";
        $perfilAcesso = new PerfilAcessoDAO(null);
        return $perfilAcesso->listarPerfilAcesso();
    }

    function excluirPerfilAcesso($idPerfil)
    {
        include_once "../../DAO/PerfilAcessoDAO.php";
        $perfilAcesso = new PerfilAcessoDAO();
        $perfilAcesso->excluirPerfilAcesso($idPerfil);
    }

    public function resgataPorID($idPerfil)
    {
        include_once "../../DAO/PerfilAcessoDAO.php";
        $dao =new PerfilAcessoDAO(null); 
        return $dao->resgataPorID($idPerfil);
    }

    public function alterarPerfilAcesso($model){
        include_once "../../DAO/PerfilAcessoDAO.php";
        $perfilAcesso = new PerfilAcessoDAO();
        $perfilAcesso->alterarPerfilAcesso($this);
    }
    
    public function getIDPerfil(){
        return $this->idPerfil;
    }

    public function setIDPerfil($idPerfil){
        $this->idPerfil = $idPerfil;
    }

    public function getNomePerfil(){
        return $this->nomePerfil;
    }

    public function setNomePerfil($nomePerfil){
        $this->nomePerfil = $nomePerfil;
    }

    public function getDataCadastro(){
        return $this->dataCadastro;
    }

    public function setDataCadastro($dataCadastro){
        $this->dataCadastro = $dataCadastro;
    }

    public function getAtivo(){
        return $this->ativo;
    }

    public function setAtivo($ativo){
        $this->ativo = $ativo;
    }

}

?>