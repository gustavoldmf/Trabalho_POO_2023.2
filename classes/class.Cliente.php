    <?php 

include_once('../global.php');

class Cliente extends Pessoa {

    private $cpf;
    static $local_filename = "Clientes.txt";

    public function __construct($nome, $RG, $email, $telefone, $cpf) 
    {
        $this->nome=$nome;
        $this->RG=$RG;
        $this->email=$email;
        $this->telefone=$telefone;
        $this->cpf=$cpf;
    }

    public function getCpf ()
    {
      return $this->cpf;
    }

    public function setCpf ($cpf)
    {
      $this->cpf = $cpf;
    }  

    static public function getFilename() {
      return get_called_class()::$local_filename;
    }
}
