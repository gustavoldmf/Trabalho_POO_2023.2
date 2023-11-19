<?php

include_once('global.php');

class PagamentoMes extends persist {
  protected $mesAno;
  protected $valorPagamento;
  static $local_filename = "pagamentoMes.txt";
  
  public function __construct(string $mesAno) {
      $this->mesAno = $mesAno;
      $this->valorPagamento = 0;
  }

  public function getMesAno() {
      return $this->mesAno;
  }

  public function setMesAno(string $mesAno) {
      $this->mesAno = $mesAno;
  }

  public function getValorPagamento() {
      return $this->valorPagamento;
  }

  public function setValorPagamento(float $valorPagamento) {
      $this->valorPagamento = $valorPagamento;
  }

  public function calcPagamento(DentistaParceiro $dentista) {
    $valorPagamento = 0;
    $procFeitos = $dentista->getProcFeitos();
    $habilitacoes = $dentista->getHabilitacao();
    
  foreach ($procFeitos as $concluidos) {
    if ($this->mesAno === $concluidos->getMesAno()){
    $proc = $concluidos->getProcedimento();
      
      foreach ($habilitacoes as $habilitacao) {
        
      $especialidadeHabilitacao = $habilitacao->getEspecialidade();
      $especialidadeProc = $proc->getEspecialidade();
      if ($especialidadeHabilitacao === $especialidadeProc){
            $comissao = $habilitacao->getComissao();
            $pagamento = $comissao * $proc->getValorUnitario();
              $valorPagamento += $pagamento;
      }
      }
    }
  }
  $this->valorPagamento = $valorPagamento;
  }
  
  static public function getFilename() {
      return get_called_class()::$local_filename;
  }
}