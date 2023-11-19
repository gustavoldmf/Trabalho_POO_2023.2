<?php 
include_once('global.php');
class Concluidos extends Responsabilidades {
    
    protected $data;
    protected $mesAno;
    static $local_filename = "concluidos.txt";

    public function __construct(Dentista $dentistaEx, Procedimentos $procedimento, string $data) {
    
      $this->dentistaEx = $dentistaEx;
      $this->procedimento = $procedimento;
      $this->data = $data;
      $this->mesAno = Concluidos::defineMesAno($data);
    }

    public function getData() {
        return $this->data;
    }

    public function defineMesAno (string $data)

    {
      $partes = explode("-", $data);
      $mes = $partes[1];
      $ano = $partes[2];
      $dataReduzida = $mes . "-" . $ano;
      $mesAno = $dataReduzida;
      return $dataReduzida;
    }  
  
    public function setData(string $data) {
        $this->data = $data;
    }

    public function getMesAno(){
      return $this->mesAno;
    }

    static public function getFilename() {
        return get_called_class()::$local_filename;
    }
}

