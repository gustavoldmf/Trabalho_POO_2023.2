<?php

class ConsultaAvaliacao {
    private $PacienteAssociado;
    private $DentistaAvaliador;
    private $Data;
    private $Horario;

    public function __construct(Paciente $PacienteAssociado, Dentista $DentistaAvaliador, $Data, $Horario) {
        $this->PacienteAssociado = $PacienteAssociado;
        $this->DentistaAvaliador = $DentistaAvaliador;
        $this->Data = $Data;
        $this->Horario = $Horario;
    }

    public function criaOrcamento(Paciente $PacienteAssociado, Dentista $DentistaAvaliador, $Data) {
    }
}