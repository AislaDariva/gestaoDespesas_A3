<?php
class DespesaModel{
    protected $idDespesa;
    protected $idCredor;
    protected $idUsuario;
    protected $nomeDespesa;
    protected $dataCadastro;
    protected $ativo;

    function __construct($idDespesa,$idCredor,$idUsuario,$nomeDespesa,$dataCadastro,$ativo)
    {
        $this->idDespesa = $idDespesa;
        $this->idCredor = $idCredor;
        $this->idUsuario = $idUsuario;
        $this->nomeDespesa = $nomeDespesa;
        $this->dataCadastro = $dataCadastro;
        $this->ativo =$ativo;
    }

    function cadastraDespesa(DespesaModel $despesa)
    {
        include_once "../../DAO/DespesaDAO.php";
        $despesa = new DespesaDAO();
        $despesa->cadastraDespesa($this);
    }

    function listarDespesa()
    {
        include_once "../../DAO/DespesaDAO.php";
        $despesa = new DespesaDAO(null);
        return $despesa->listarDespesa();
    }

    function excluirDespesa($idDespesa)
    {
        include_once "../../DAO/DespesaDAO.php";
        $despesa = new DespesaDAO();
        $despesa->excluirDespesa($idDespesa);
    }

    public function resgataPorID($idDespesa)
{
    include_once "../../DAO/DespesaDAO.php";
    $dao =new DespesaDAO(null); 
    return $dao->resgataPorID($idDespesa);
}
 
public function  alterarDespesa($model){
        include_once "../../DAO/DespesaDAO.php";
        $despesa = new DespesaDAO();
        $despesa->alterarDespesa($this);    
}


        public function getIdDespesa()
        {
                return $this->idDespesa;
        }

        public function getIdCredor()
        {
                return $this->idCredor;
        }

        public function getIdUsuario()
        {
                return $this->idUsuario;
        }

        public function getNomeDespesa()
        {
                return $this->nomeDespesa;
        }

        public function getDataCadastro()
        {
                return $this->dataCadastro;
        }
 
        public function getAtivo()
        {
                return $this->ativo;
        }

        public function setIdDespesa($idDespesa)
        {
                $this->idDespesa = $idDespesa;
        }

        public function setIdCredor($idCredor)
        {
                $this->idCredor = $idCredor;
        }

        public function setIdUsuario($idUsuario)
        {
                $this->idUsuario = $idUsuario;
        }

        public function setNomeDespesa($nomeDespesa)
        {
                $this->nomeDespesa = $nomeDespesa;
        }

        public function setDataCadastro($dataCadastro)
        {
                $this->dataCadastro = $dataCadastro;
        }

        public function setAtivo($ativo)
        {
                $this->ativo = $ativo;
        }
}
?>