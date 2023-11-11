    <?php 

include_once('global.php');

class Cliente extends Pessoa {

    protected $cpf;
    static $local_filename = "clientes.txt";

    public function __construct(string $nome, string $RG, string $email, string $telefone, string $cpf) 
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

    public function setCpf (string $cpf)
    {
      $this->cpf = $cpf;
    }  

    static public function getFilename() {
      return get_called_class()::$local_filename;
    }
}
