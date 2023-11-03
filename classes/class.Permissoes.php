<?php 

include_once('../global.php');

class Tratamento extends Orcamento{

    private $orcamentoAssociado, $tipoPagamento;



    public function __construct() {

        $this->orcamentoAssociado = $orcamentoAssociado;

        $this->tipoPagamento = $tipoPagamento;

    }

    public function verificaPermissao(Usuario $Usuario, $Permissao) {
        $Teste = $Usuario->getPerfil();
        $vetor = $Teste->getPermissoes();
    
        foreach ($vetor as $permissao) {
            if ($permissao == $Permissao) {
                return true; // Encontrou a permissão desejada, retornando verdadeiro
            }
        }
    
        return false; // A permissão não foi encontrada, retornando falso
    }
    

}