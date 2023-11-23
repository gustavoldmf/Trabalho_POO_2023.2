<?php

include_once('global.php');

class Especialidade extends persist {
    protected $nomeEspecialidade;
    static $local_filename = "especialidade.txt";
  

    private function __construct(string $nomeEspecialidade) {
        $this->nomeEspecialidade = $nomeEspecialidade;
    }

    static public function criaEspecialidade(string $nomeEspecialidade) {

      $permissao = Permissoes::verificaPermissao(__FUNCTION__);

      if ($permissao === true){
        $especialidade = new Especialidade ($nomeEspecialidade);
        return $especialidade;

      } else {
        echo "Você não tem permissão para realizar " .__FUNCTION__. ".\n";
      }
    }

    public function getNomeEspecialidade() {
        return $this->nomeEspecialidade;
    }

    public function setNomeEspecialidade(string $nomeEspecialidade) {
        $this->nomeEspecialidade = $nomeEspecialidade;
    }

    static public function getFilename() {
        return get_called_class()::$local_filename;
    }
}