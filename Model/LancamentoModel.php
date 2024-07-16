<?php
class LancamentoModel
{
    protected $idLancamento;
    protected $idBase;
    protected $idUsuario;
    protected $idDespesa;
    protected $competenciaDespesa;
    protected $dataVencimento;
    protected $valorLiquido;
    protected $valorMulta;
    protected $valorCorrecao;
    protected $dataCadastro;
    protected $ativo;
    protected $observacao;
    protected $valorJuros;

    function __construct($idLancamento, $idBase, $idUsuario, $idDespesa, $competenciaDespesa, $dataVencimento, $valorLiquido, $valorMulta, $valorCorrecao, $dataCadastro, $ativo, $observacao,$valorJuros)
    {
        $this->idLancamento = $idLancamento;
        $this->idBase = $idBase;
        $this->idUsuario = $idUsuario;
        $this->idDespesa = $idDespesa;
        $this->competenciaDespesa = $competenciaDespesa;
        $this->dataVencimento = $dataVencimento;
        $this->valorLiquido = $valorLiquido;
        $this->valorMulta = $valorMulta;
        $this->valorCorrecao = $valorCorrecao;
        $this->dataCadastro = $dataCadastro;
        $this->ativo = $ativo;
        $this->observacao = $observacao;
        $this->valorJuros = $valorJuros;
    }

    function cadastraLancamento(LancamentoModel $lancamento)
    {
        include_once "../../DAO/LancamentoDAO.php";
        $lancamento = new LancamentoDAO();
        $lancamento->cadastraLancamento($this);
    }

    function listarLancamento()
    {
        include_once "../../DAO/LancamentoDAO.php";
        $lancamento = new LancamentoDAO(null);
        return $lancamento->listarLancamento();
    }

    function excluirLancamento($idLancamento)
    {
        include_once "../../DAO/LancamentoDAO.php";
        $lancamento = new LancamentoDAO();
        $lancamento->excluirLancamento($idLancamento);
    }

    public function resgataPorID($idLancamento)
    {
        include_once "../../DAO/LancamentoDAO.php";
        $dao = new LancamentoDAO(null);
        return $dao->resgataPorID($idLancamento);
    }

    public function  alterarLancamento($model)
    {
        include_once "../../DAO/LancamentoDAO.php";
        $lancamento = new LancamentoDAO();
        $lancamento->alterarLancamento($this);
    }

    public function listarComFiltros($filtroCredor, $filtroTipoDespesa, $filtroBase, $filtroDataInicio, $filtroDataFim)
    {
        include_once "../../DAO/LancamentoDAO.php";
        $lancamento = new LancamentoDAO(null);
        return $lancamento->listarComFiltros($filtroCredor, $filtroTipoDespesa, $filtroBase, $filtroDataInicio, $filtroDataFim);
    }

    public function getIdLancamento()
    {
        return $this->idLancamento;
    }

    public function setIdLancamento($idLancamento)
    {
        $this->idLancamento = $idLancamento;

        return $this;
    }

    public function getIdBase()
    {
        return $this->idBase;
    }

    public function setIdBase($idBase)
    {
        $this->idBase = $idBase;

        return $this;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    public function getIdDespesa()
    {
        return $this->idDespesa;
    }

    public function setIdDespesa($idDespesa)
    {
        $this->idDespesa = $idDespesa;

        return $this;
    }

    public function getCompetenciaDespesa()
    {
        return $this->competenciaDespesa;
    }

    public function setCompetenciaDespesa($competenciaDespesa)
    {
        $this->competenciaDespesa = $competenciaDespesa;

        return $this;
    }

    public function getDataVencimento()
    {
        return $this->dataVencimento;
    }

    public function setDataVencimento($dataVencimento)
    {
        $this->dataVencimento = $dataVencimento;

        return $this;
    }

    public function getValorLiquido()
    {
        return $this->valorLiquido;
    }

    public function setValorLiquido($valorLiquido)
    {
        $this->valorLiquido = $valorLiquido;

        return $this;
    }

    public function getValorMulta()
    {
        return $this->valorMulta;
    }

    public function setValorMulta($valorMulta)
    {
        $this->valorMulta = $valorMulta;

        return $this;
    }

    public function getValorCorrecao()
    {
        return $this->valorCorrecao;
    }

    public function setValorCorrecao($valorCorrecao)
    {
        $this->valorCorrecao = $valorCorrecao;

        return $this;
    }

    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;

        return $this;
    }

    public function getAtivo()
    {
        return $this->ativo;
    }

    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    public function getObservacao()
    {
        return $this->observacao;
    }

    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;

        return $this;
    }

    public function getValorJuros()
    {
        return $this->valorJuros;
    }

    public function setValorJuros($valorJuros)
    {
        $this->valorJuros = $valorJuros;

        return $this;
    }
}
