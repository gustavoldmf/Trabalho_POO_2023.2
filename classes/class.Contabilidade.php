<?php

include_once('global.php');

class Contabilidade extends persist {
  
  protected $receita;
  protected $despesa;
  protected $dentista;
  protected $pagamentos;
  protected $funcionarios;
  protected $mesAno;   
  protected $lucro;
  
  static $local_filename = "contabilidade.txt";

  public function __construct($mesAno) {
      $this->mesAno = $mesAno;
      $this->pagamentos = Pagamentos::getRecordsbyField ("mesAno", $mesAno);
      $this->dentista = DentistaParceiro::getRecordsbyField("mesAno", $mesAno);
      $this->receita = calculaPagamento();
      $this->despesa = calculaDespesa()
      $this->lucro = calculaLucro();
    
  }

  public function calculaPagamento() {

      for (i=0; i<$this->pagamentos.length; i++) {
        $receita = $receita + $this->pagamentos[i]->getValorPago();
      }
      return $receita;
  }

  public function calculaDespesa(){

    //salário de todos os dentistas parceiros
    for (i=0; i<$this->dentista.length; i++) {
        $despesa = $despesa + $this->dentista[i]->getTotalPagamento();

    }
    //salário do unico detista funcionario
    $despesa = $despesa + 5000;
    return $despesa;
  }

  public function calculaLucro(){
    $lucro = $receita - $despesa;
    return $this->lucro;
  }

  public function getLucro(){
  return $this->lucro;
  }

  static public function getFilename() {
      return get_called_class()::$local_filename;
  }
}
