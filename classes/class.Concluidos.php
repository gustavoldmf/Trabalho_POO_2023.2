<?php 
include_once('global.php');
class Concluidos extends Responsabilidades {
    
    protected $data;
    static $local_filename = "concluidos.txt";

    public function __construct(Dentista $dentistaEx, Procedimentos $procedimento, string $data) {
    
      $this->dentistaEx = $dentistaEx;
      $this->procedimento = $procedimento;
      $this->data = $data;
    }

    public function getdata() {
        return $this->data;
    }

    public function setData(string $data) {
        $this->data = $data;
    }

    static public function getFilename() {
        return get_called_class()::$local_filename;
    }
}