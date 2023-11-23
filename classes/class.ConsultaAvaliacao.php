<?php

include_once('global.php');

//leticia: adicionei gets e sets
class ConsultaAvaliacao extends persist{
    protected $pacienteAssociado;
    protected $dentistaAvaliador;
    protected $data;
    protected $horario;
    static $local_filename = "consultaAvaliacao.txt";

    private function __construct(Paciente $pacienteAssociado, Dentista $dentistaAvaliador, string $data, string $horario) {
        $this->pacienteAssociado = $pacienteAssociado;
        $this->dentistaAvaliador = $dentistaAvaliador;
        $this->data = $data;
        $this->horario = $horario;
    }

    static public function criaConsultaAvaliacao (Paciente $pacienteAssociado, Dentista $dentistaAvaliador, string $data, string $horario) {
  
      $permissao = Permissoes::verificaPermissao(__FUNCTION__);
  
      if ($permissao === true){
        $consulta = new ConsultaAvaliacao ($pacienteAssociado, $dentistaAvaliador, $data, $horario);
        return $consulta;
      } else {
        echo "Você não tem permissão para realizar " .__FUNCTION__. ".\n";
      }
    }
  
    public function getPacienteAssociado(){
      return $this->pacienteAssociado;
    }

    public function getDentistaAvaliador(){
      return $this->dentistaAvaliador;
    }

    public function getData(){
      return $this->data;
    }
  
    public function getHorario(){
      return $this->horario;
    }

    public function setPacienteAssociado(Paciente $pacienteAssociado){
      $this->pacienteAssociado = $pacienteAssociado;
    }
  
    public function setDentistaAvaliador(Dentista $dentistaAvaliador){
      $this->dentistaAvaliador = $dentistaAvaliador;
    }
  
    public function setData(string $data){
      $this->data = $data;
    }
  
    public function setHorario(string $horario){
      $this->horario = $horario;
    }
  // leticia: finalizei funcao criaOrcamento
    public function criaOrcamento() {
      $permissao = Permissoes::verificaPermissao(__FUNCTION__);
      if ($permissao === true){
      $Orcamento = new Orcamento ($this->pacienteAssociado, $this->dentistaAvaliador, $this->data);
        
      return $Orcamento;
      }
      else {
        echo "Você não tem permissão para realizar " .__FUNCTION__. ".\n";
      }
    }

    static public function getFilename() {
      return get_called_class()::$local_filename;
    }
  
}