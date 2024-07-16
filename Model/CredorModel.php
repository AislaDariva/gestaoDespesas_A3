<?php
class CredorModel{
    protected $idCredor;
    protected $idUsuario;
    protected $nomeCredor;
    protected $dataCadastro;
    protected $responsavelCredor;
    protected $telefoneCredor;
    protected $celularCredor;
    protected $ativo;

    function __construct($idCredor,$idUsuario,$nomeCredor,$dataCadastro,$responsavelCredor,$telefoneCredor,$celularCredor,$ativo)
    {
        $this->idCredor = $idCredor;
        $this->idUsuario = $idUsuario;
        $this->nomeCredor = $nomeCredor;
        $this->dataCadastro = $dataCadastro;
        $this->responsavelCredor = $responsavelCredor;
        $this->telefoneCredor =$telefoneCredor;
        $this->celularCredor = $celularCredor;
        $this->ativo = $ativo;
    }

    function cadastraCredor(CredorModel $credor)
    {
        include_once "../../DAO/CredorDAO.php";
        $credor = new CredorDAO();
        $credor->cadastraCredor($this);
    }

    function listarCredor()
    {
        include_once "../../DAO/CredorDAO.php";
        $credor = new CredorDAO(null);
        return $credor->listarCredor();
    }

    function excluirCredor($idCredor)
    {
        include_once "../../DAO/CredorDAO.php";
        $credor = new CredorDAO();
        $credor->excluirCredor($idCredor);
    }

    public function resgataPorIdCredor($idCredor)
{
    include_once "../../DAO/CredorDAO.php";
    $dao =new CredorDAO(null); 
    return $dao->resgataPorIdCredor($idCredor);
}
 
public function  alterarCredor($model){
        include_once "../../DAO/CredorDAO.php";
        $credor = new CredorDAO();
        $credor->alterarCredor($this);    
}


        public function getIdCredor()
        {
                return $this->idCredor;
        }

        public function getIdUsuario()
        {
                return $this->idUsuario;
        }

        public function getNomeCredor()
        {
                return $this->nomeCredor;
        }

        public function getDataCadastro()
        {
                return $this->dataCadastro;
        }

        public function getResponsavelCredor()
        {
                return $this->responsavelCredor;
        }
 
        public function getTelefoneCredor()
        {
                return $this->telefoneCredor;
        }

        public function getCelularCredor()
        {
                return $this->celularCredor;
        }
        
        public function getAtivo()
        {
                return $this->ativo;
        }

        public function setIdCredor($idCredor)
        {
                $this->idCredor = $idCredor;
        }

        public function setIdUsuario($idUsuario)
        {
                $this->idUsuario = $idUsuario;
        }

        public function setNomeCredor($nomeCredor)
        {
                $this->nomeCredor = $nomeCredor;
        }

        public function setDataCadastro($dataCadastro)
        {
                $this->dataCadastro = $dataCadastro;
        }

        public function setResponsavelCredor($responsavelCredor)
        {
                $this->responsavelCredor = $responsavelCredor;
        }

        public function setTelefoneCredor($telefoneCredor)
        {
                $this->telefoneCredor = $telefoneCredor;
        }

        public function setCelularCredor($celularCredor)
        {
                $this->celularCredor = $celularCredor;
        }

        public function setAtivo($ativo)
        {
                $this->ativo = $ativo;
        }


}
?>