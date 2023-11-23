<?php

include_once('global.php');

class Contabilidade extends persist {
  
  protected $receita;
  protected $despesa;
  protected $dentista = array();
  protected $dentistaF = array();
  protected $pagReceita = array();
  protected $pagDespesa = array ();
  protected $funcionarios;  
  protected $metodo;
  protected $taxa;
  protected $mesAno;   
  protected $lucro;
  
  static $local_filename = "contabilidade.txt";

  private function __construct(string $mesAno) {
      $this->mesAno = $mesAno;
      $this->pagReceita = Pagamento::getRecordsbyField ("mesAno", $mesAno);
      $this->dentista = DentistaParceiro::getRecords();
      $this->dentistaF = DentistaFuncionario::getRecords();
      $this->pagDespesa = PagamentoMes::getRecordsByField("mesAno", $mesAno);
  }

  static public function iniciaContabilidade (string $mesAno) {

    $permissao = Permissoes::verificaPermissao(__FUNCTION__);

    if ($permissao === true){
      $contabilidade = new Contabilidade ($mesAno);
      return $contabilidade;
    } else {
      echo "Você não tem permissão para realizar a função " .__FUNCTION__.  ".\n";
    }
  }

  public function calculaPagamento() {
      $permissao = Permissoes::verificaPermissao(__FUNCTION__);
    $this->receita = 0;
    if ($permissao === true){
      for ($i = 0; $i < sizeof($this->pagReceita); $i++) {

        $this->metodo = $this->pagReceita[$i]->getMetodoPagamento();
        $this->taxa = 1 - $this->metodo->getTaxa();
        $this->receita = $this->receita + $this->pagReceita[$i]->getValorPago() * ($this->taxa - 0.2);
      }
        return $this->receita;
    } else {
      echo "Você não tem permissão para realizar a função " .__FUNCTION__.  ".\n";
    }
  }

  public function calculaDespesa(){
    $permissao = Permissoes::verificaPermissao(__FUNCTION__);
    $this->despesa = 0;
    if ($permissao === true){
    // Pagamento dos dentistas parceiros
    for($j = 0; $j < sizeof($this->dentista); $j++){
      for ($i = 0; $i < sizeof($this->pagDespesa); $i++) {
        $this->pagDespesa[$i]->calcPagamento($this->dentista[$j]);
        $this->despesa = $this->despesa + $this->pagDespesa[$i]->getValorPagamento();

      }
    }
    // Despesas somadas aos valores dos salários dos dentistas funcionários
      for($j = 0; $j < sizeof($this->dentistaF); $j++){
        $this->despesa = $this->despesa + $this->dentistaF[$j]->getSalario();
      }
      return $this->despesa;
    } else {
        echo "Você não tem permissão para realizar a função " .__FUNCTION__.  ".\n";
    }
  }
  public function calculaLucro(){
    $permissao = Permissoes::verificaPermissao(__FUNCTION__);

    if ($permissao === true){
    $this->lucro = $this->calculaPagamento() - $this->calculaDespesa();
    return $this->lucro;
    } else {
      echo "Você não tem permissão para realizar a função " .__FUNCTION__.  ".\n";
    }
  }

  public function getLucro(){
  return $this->lucro;
  }

  static public function getFilename() {
      return get_called_class()::$local_filename;
  }
}
