<?php

include_once('global.php');

class Habilitacao extends persist {

    protected $especialidade;
    protected $comissao;
    static $local_filename = "habilitacao.txt";
  

    private function __construct(Especialidade $especialidade, float $comissao) {
        $this->especialidade = $especialidade;
        $this->comissao = $comissao;
    }

    static public function criaHabilitacao (Especialidade $especialidade, float $comissao) {
  
      $permissao = Permissoes::verificaPermissao(__FUNCTION__);
  
      if ($permissao === true){
        $habilitacao = new Habilitacao ( $especialidade, $comissao);
        return $habilitacao;
      } else {
        echo "Você não tem permissão para realizar " .__FUNCTION__. ".\n";
      }
    }

    public function getEspecialidade() {
        return $this->especialidade;
    }

    public function setEspecialidade(Especialidade $especialidade) {
        $this->especialidade = $especialidade;
    }

    public function getComissao() {
        return $this->comissao;
    }

    public function setComissao(float $comissao) {
        $this->comissao = $comissao;
    }

    static public function getFilename() {
        return get_called_class()::$local_filename;
    }
}






