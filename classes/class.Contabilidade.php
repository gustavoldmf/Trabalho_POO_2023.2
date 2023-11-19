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
      $this->pagamentos = Pagamento::getRecordsbyField ("mesAno", $mesAno);
    // pegar tratamento primeiro
      $this->dentista = DentistaParceiro::getRecordsbyField("mesAno", $mesAno);
      // $this->receita = Contabilidade::calculaPagamento();
      // $this->despesa = Contabilidade::calculaDespesa();
      // $this->lucro = Contabilidade::calculaLucro();
    
  }

  static public function calculaPagamento() {
      for ($i = 0; $i < count($pagamentos); $i++) {
        $receita = $receita + $pagamentos[$i]->getValorPago();
      }
      return $receita;
  }

  static public function calculaDespesa(){

    //salário de todos os dentistas parceiros
    for ($i = 0; $i < count($dentista); $i++) {
        $despesa = $despesa + $dentista[$i]->getTotalPagamento();

    }
    //salário do unico detista funcionario
    $despesa = $despesa + 5000;
    return $despesa;
  }

  static public function calculaLucro(){
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
