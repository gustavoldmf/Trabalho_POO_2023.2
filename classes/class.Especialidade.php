<?php

class Especialidade {
    private $nomeEspecialidade;

    public function __construct($nomeEspecialidade) {
        $this->nomeEspecialidade = $nomeEspecialidade;
    }

    public function getNomeEspecialidade() {
        return $this->nomeEspecialidade;
    }

    public function setNomeEspecialidade($nomeEspecialidade) {
        $this->nomeEspecialidade = $nomeEspecialidade;
    }
}