<?php 

include_once('global.php');

class Tratamento extends persist {
    protected $orcamentoAssociado;
    protected $tipoPagamento;
    protected $execucao = [];
    protected $concluidos = [];
    protected $registrosPagamento = [];
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
  
    public function verificaEspecialidadeDentista(Dentista $dentista, Procedimentos $procedimento) {
        $arrayEspecialidadeDentista = $dentista->getEspecialidadesDentista();
 
        $especialidadeProcedimento = $procedimento->getEspecialidade();


      
        foreach($arrayEspecialidadeDentista as $especialidade){

          
          if ($especialidade->getNomeEspecialidade() === $especialidadeProcedimento->getNomeEspecialidade())         {

            
            return true;
          }
        }
      
        return false;
    }

    public function associaResponsavel(Dentista $DentistaEx, Procedimentos $Procedimento) {
       $permissao = Permissoes::verificaPermissao(__FUNCTION__);

       if ($permissao === true){

      if ($this->verificaEspecialidadeDentista($DentistaEx, $Procedimento)) {

            $responsabilidades = new Responsabilidades($DentistaEx, $Procedimento);
            array_push($this->execucao,$responsabilidades);

            return $responsabilidades;
        } else {
            echo "\nO dentista não possui a especialidade necessária para o procedimento.\n";
            return false;
        }
       } else {
        echo "Você não tem permissão para realizar " .__FUNCTION__. ".\n";
      }
    }

    public function marcaConsulta(string $data, string $horario, string $duracao, Responsabilidades $responsabilidades) {
       $permissao = Permissoes::verificaPermissao(__FUNCTION__);

       if ($permissao === true){

      $procedimentoEscolhido = $responsabilidades->getProcedimento();
      $dentistaExecutor = $responsabilidades->getDentistaEx();
      $c = new Consulta($this->orcamentoAssociado->getPacienteAssociado(), $dentistaExecutor, $data, $horario, $duracao, $procedimentoEscolhido);
      return $c;
       } else {
        echo "Você não tem permissão para realizar " .__FUNCTION__. ".\n";
      }
    }

    public function finalizaProcedimento(Responsabilidades $responsabilidades, string $dataConclusao) {
       $permissao = Permissoes::verificaPermissao(__FUNCTION__);

       if ($permissao === true){
        
        $concluidos = new Concluidos($responsabilidades->getDentistaEx(), $responsabilidades->getProcedimento(), $dataConclusao);
        array_push ($this->concluidos, $concluidos);
         
      if($responsabilidades->getDentistaEx() instanceof DentistaParceiro){
          $dentistaEx = $responsabilidades->getDentistaEx();
          $dentistaEx->addProcFeitos($concluidos);
        }
        return $concluidos;
      } else {
        echo "Você não tem permissão para realizar " .__FUNCTION__. ".\n";
      }
    }

  public function pagar(float $valorPago, string $dataPagamento, MetodoPagamento $metodoPagamento){

      $pagamento = new Pagamento($valorPago, $dataPagamento, $metodoPagamento);
      array_push($this->registrosPagamento, $pagamento);

      return $pagamento;
  }
  
    static public function getFilename() {
      return get_called_class()::$local_filename;
    }
}
