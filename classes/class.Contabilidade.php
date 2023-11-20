<?php

include_once('global.php');

class Contabilidade extends persist {
  
  protected $receita;
  protected $despesa;
  protected $dentista;
  protected $pagReceita;
  protected $pagDespesa;
  protected $funcionarios;
  protected $mesAno;   
  protected $lucro;
  
  static $local_filename = "contabilidade.txt";

  public function __construct($mesAno) {
      $this->mesAno = $mesAno;
      $this->pagReceita = Pagamento::getRecordsbyField ("mesAno", $mesAno);
      $this->dentista = DentistaParceiro::getRecords();
      $this->pagDespesa = PagamentoMes::getRecordsByField("mesAno", $mesAno);
      // $this->receita = Contabilidade::calculaPagamento();
      // $this->despesa = Contabilidade::calculaDespesa();
      // $this->lucro = Contabilidade::calculaLucro();
    
  }

  public function calculaPagamento() {
      for ($i = 0; $i < count($pagReceita); $i++) {
        $receita = $receita + $pagReceita[$i]->getValorPago();
      }
      return $receita;
  }

  static public function calculaDespesa(){

    //salário de todos os dentistas parceiros
    for($j = 0; $j < count($dentista); $j++){
    for ($i = 0; $i < count($pagDespesa); $i++) {
      $pagDespesa[$i]->calcPagamento($dentista[$j]);
      $despesa = $despesa + $pagDespesa[$i]->getValorPagamento();

    }
    }
    //salário do unico detista funcionario
    $despesa = $despesa + 5000;
    return $despesa;
  }

  public function calculaLucro(){
    $lucro = $receita - $despesa;
    return $lucro;
  }

  public function getLucro(){
  return $this->lucro;
  }

  static public function getFilename() {
      return get_called_class()::$local_filename;
  }
}
