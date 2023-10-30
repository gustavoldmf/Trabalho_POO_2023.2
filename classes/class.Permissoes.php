<?php 

include_once('../global.php');

class Tratamento extends Orcamento{

     //protected $orcamentoAssociado, $tipoPagamento;



    public function __construct() {

        $this->orcamentoAssociado = $orcamentoAssociado;

        $this->tipoPagamento = $tipoPagamento;

    }

    public function verificaPermissao (Usuario $Usuario, $Permissao){

        
        $Teste = $Usuario->getPerfil() 
        $vetor = $Teste->getPermissoes();

          $Permissao = $vetor [i];
          return true;
          return false;


     // rascunho
     // public function verificaPermissao (Usuario $Usuario, $Permissao){     
    }

}