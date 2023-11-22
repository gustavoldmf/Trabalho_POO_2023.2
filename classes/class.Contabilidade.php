<?php

include_once('global.php');

class Contabilidade extends persist {
  
  protected $receita;
  protected $despesa;
  protected $dentista = array();
  protected $pagReceita = array();
  protected $pagDespesa = array ();
  protected $funcionarios;
  protected $metodo;
  protected $taxa;
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
      $login1 = Login::getRecordsbyField("logado", 1);
      $permissao = Permissoes::verificaPermissao($login1[0], __FUNCTION__);
  
    if ($permissao === true){
      for ($i = 0; $i < sizeof($this->pagReceita); $i++) {

        $this->metodo = $this->pagReceita[$i]->getMetodoPagamento();
        $this->taxa = 1 - $this->metodo->getTaxa();
        $this->receita = $this->receita + $this->pagReceita[$i]->getValorPago() * ($this->taxa);
      }
        return $this->receita;
    } else {
      echo "Voce nao tem permissao para realizar esta acao";
    }
  }

  public function calculaDespesa(){
    $login1 = Login::getRecordsbyField("logado", 1);
    $permissao = Permissoes::verificaPermissao($login1[0], __FUNCTION__);

    if ($permissao === true){
    //salário de todos os dentistas parceiros
    for($j = 0; $j < sizeof($this->dentista); $j++){
    for ($i = 0; $i < sizeof($this->pagDespesa); $i++) {
      $this->pagDespesa[$i]->calcPagamento($this->dentista[$j]);
      $this->despesa = $this->despesa + $this->pagDespesa[$i]->getValorPagamento();

    }
    }
   //salário do unico dentista funcionario
    $this->despesa = $this->despesa + 5000;
    return $this->despesa;
    } else {
      echo "Voce nao tem permissao para realizar esta acao";
    }
  }
  public function calculaLucro(){
    $login1 = Login::getRecordsbyField("logado", 1);
    $permissao = Permissoes::verificaPermissao($login1[0], __FUNCTION__);

    if ($permissao === true){
    $this->lucro = $this->receita - $this->despesa;
    return $this->lucro;
    } else {
      echo "Voce nao tem permissao para realizar esta acao";
    }
  }

  public function getLucro(){
  return $this->lucro;
  }

  static public function getFilename() {
      return get_called_class()::$local_filename;
  }
}
