    <?php 

include_once('../global.php');

class Dentista extends Pessoa {

    protected $CRO;
    static $local_filename = "Dentistas.txt";
  
    public function __construct($nome, $RG, $email, $telefone, $CRO) 
    {
        $this->nome=$nome;
        $this->RG=$RG;
        $this->email=$email;
        $this->telefone=$telefone;
        $this->CRO=$CRO;
    }

    public function getCRO ()
    {
      return $this->CRO;
    }

    public function setCRO ($CRO)
    {
      $this->CRO = $CRO;
    }
    
    static public function getFilename() {
      return get_called_class()::$local_filename;
    }
}
