<?php

class Habilitacao{

    private $especialidade;
    private $comissao;

    public function __construct(Especialidade $especialidade, $comissao) {
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

    public function setComissao($comissao) {
        $this->comissao = $comissao;
    }
}






