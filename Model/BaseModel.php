<?php
class BaseModel{
    protected $idBase;
    protected $idUsuario;
    protected $nomeBase;
    protected $dataCadastro;
    protected $responsavelBase;
    protected $telefoneBase;
    protected $celularBase;
    protected $emailBase;
    protected $ativo;

    function __construct($idBase,$idUsuario,$nomeBase,$dataCadastro,$responsavelBase,$telefoneBase,$celularBase,$emailBase,$ativo)
    {
        $this->idBase = $idBase;
        $this->idUsuario = $idUsuario;
        $this->nomeBase = $nomeBase;
        $this->dataCadastro = $dataCadastro;
        $this->responsavelBase = $responsavelBase;
        $this->telefoneBase =$telefoneBase;
        $this->celularBase = $celularBase;
        $this->emailBase =$emailBase;
        $this->ativo = $ativo;
    }

    function cadastraBase(BaseModel $base)
    {
        include_once "../../DAO/BaseDAO.php";
        $base = new BaseDAO();
        $base->cadastraBase($this);
    }

    function listarBase()
    {
        include_once "../../DAO/BaseDAO.php";
        $base = new BaseDAO(null);
        return $base->listarBase();
    }

    function excluirBase($idBase)
    {
        include_once "../../DAO/BaseDAO.php";
        $base = new BaseDAO();
        $base->excluirBase($idBase);
    }

    public function resgataPorID($idBase)
{
    include_once "../../DAO/BaseDAO.php";
    $dao =new BaseDAO(null); 
    return $dao->resgataPorID($idBase);
}
 
public function  alterarBase($model){
        include_once "../../DAO/BaseDAO.php";
        $base = new BaseDAO();
        $base->alterarBase($this);    
}


        public function getIdBase()
        {
                return $this->idBase;
        }

        public function getIdUsuario()
        {
                return $this->idUsuario;
        }

        public function getNomeBase()
        {
                return $this->nomeBase;
        }

        public function getDataCadastro()
        {
                return $this->dataCadastro;
        }

        public function getResponsavelBase()
        {
                return $this->responsavelBase;
        }
 
        public function getTelefoneBase()
        {
                return $this->telefoneBase;
        }

        public function getCelularBase()
        {
                return $this->celularBase;
        }

        public function getEmailBase()
        {
                return $this->emailBase;
        }

        public function getAtivo()
        {
                return $this->ativo;
        }


        public function setIdBase($idBase)
        {
                $this->idBase = $idBase;
        }

        public function setIdUsuario($idUsuario)
        {
                $this->idUsuario = $idUsuario;
        }

        public function setNomeBase($nomeBase)
        {
                $this->nomeBase = $nomeBase;
        }

        public function setDataCadastro($dataCadastro)
        {
                $this->dataCadastro = $dataCadastro;
        }

        public function setResponsavelBase($responsavelBase)
        {
                $this->responsavelBase = $responsavelBase;
        }

        public function setTelefoneBase($telefoneBase)
        {
                $this->telefoneBase = $telefoneBase;
        }

        public function setCelularBase($celularBase)
        {
                $this->celularBase = $celularBase;
        }

        public function setEmailBase($emailBase)
        {
                $this->emailBase = $emailBase;
        }

        public function setAtivo($ativo)
        {
                $this->ativo = $ativo;
        }



}
?>