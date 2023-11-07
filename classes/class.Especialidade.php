<?php

include_once('../global.php');

class Especialidade extends persist {
    protected $nomeEspecialidade;
    static $local_filename = "especialidade.txt";
  

    public function __construct(string $nomeEspecialidade) {
        $this->nomeEspecialidade = $nomeEspecialidade;
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