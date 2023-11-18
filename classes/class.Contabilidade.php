<?php

include_once('global.php');

class Contabilidade extends persist {
  
  protected $receita;
  protected $despesa;
  protected $dentistas;
  protected $pagamentos;
  protected $funcionarios;
  protected $mesAno;
  
  static $local_filename = "contabilidade.txt";

  public function __construct($mesAno) {
      $this->mesAno = $mesAno;
      $this->pagamentos = Pagamentos::getRecordsbyField ("dataPagamento", $mesAno);

    
  }

  public function calculaPagamento() {

      for (i=0; i<$this->pagamentos.length; i++) {
        $receita = $receita + $this->pagamentos[i]->getValorPago();
      }
      return $receita;
  }

  static public function getFilename() {
      return get_called_class()::$local_filename;
  }
}