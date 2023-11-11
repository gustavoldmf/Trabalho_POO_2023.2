<?php

include_once('global.php');

class Habilitacao extends persist {

    protected $especialidade;
    protected $comissao;
    static $local_filename = "habilitacao.txt";
  

    public function __construct(Especialidade $especialidade, float $comissao) {
        $this->especialidade = $especialidade;
        $this->comissao = $comissao;
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






