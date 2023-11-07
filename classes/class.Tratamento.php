<?php 

include_once('../global.php');

class Tratamento extends persist {
    protected $orcamentoAssociado;
    protected $tipoPagamento;
    protected $execucao = [];
    protected $concluidos = [];
    static $local_filename = "tratamento.txt";

    public function __construct(Orcamento $orcamentoAssociado, string $tipoPagamento) {
        $this->orcamentoAssociado = $orcamentoAssociado;
        $this->tipoPagamento = $tipoPagamento;
    }

    public function getOrcamentoAssociado() {
        return $this->orcamentoAssociado;
    }

    public function getTipoPagamento() {
        return $this->tipoPagamento;
    }

    public function setOrcamentoAssociado(Orcamento $orcamentoAssociado) {
        $this->orcamentoAssociado = $orcamentoAssociado;
    }

    public function setTipoPagamento(string $tipoPagamento) {
        $this->tipoPagamento = $tipoPagamento;
    }

  // leticia: temos que verificar um array inteiro de especialidades do dentista com uma unica especialidade de procedimento. portanto, tem que ser um for que passa pelo array
  
    public function verificaEspecialidadeDentista(Dentista $dentista, Procedimento $procedimento) {
        $arrayEspecialidadeDentista = $dentista->getEspecialidadesDentista();
        $especialidadeProcedimento = $procedimento->getEspecialidade();

        foreach($arrayEspecialidadeDentista as $especialidade){
          if ($especialidade->getNomeEspecialidade() === especialidadeProcedimento->getNomeEspecialidade())         {
            return true;
          }
        }
      
        return false;
    }

    public function associaResponsavel(Dentista $DentistaEx, Procedimento $Procedimento) {
       
      if ($this->verificaEspecialidadeDentista($DentistaEx, $Procedimento)) {
            $responsabilidades = new Responsabilidades($DentistaEx, $Procedimento);
            $this->execucao[] = $responsabilidades; 
            return $responsabilidades;
        } else {
            echo "O dentista não possui a especialidade necessária para o procedimento.";
            return false;
        }
    }
// leticia: alterei o metodo marcaConsulta
    public function marcaConsulta(string $data, string $horario, int $duracao, Responsabilidades $responsabilidades) {

      $procedimentoEscolhido = $responsabilidades->getProcedimento();
      $c = new Consulta($this->orcamentoAssociado->getPacienteAssociado(), $data, $horario, $duracao, $procedimentoEscolhido);
        return $c;
    }
// alterei funcao finaliza procedimento
    public function finalizaProcedimento(Responsabilidades $responsabilidades, string $dataConclusao) {
        
        $concluido = new Concluidos($responsabilidades->getDentistaEx(), $responsabilidades->getProcedimento(), $dataConclusao);
        array_push ($this->concluidos, $concluido);

      if($responsabilidades->getDentistaEx() instanceof DentistaParceiro){
        $responsabilidades->DentistaEx->addProcFeitos($concluido);
      }
    }
  
    static public function getFilename() {
      return get_called_class()::$local_filename;
    }
}