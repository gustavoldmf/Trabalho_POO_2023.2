    <?php 

include_once('global.php');

class Cliente extends Pessoa {

    protected $cpf;
    static $local_filename = "clientes.txt";

    private function __construct(string $nome, string $RG, string $email, string $telefone, string $cpf) 
    {
        $this->nome=$nome;
        $this->RG=$RG;
        $this->email=$email;
        $this->telefone=$telefone;
        $this->cpf=$cpf;
    }
  
    static public function cadastraCliente (string $nome, string $RG, string $email, string $telefone, string $cpf) {
  
      $permissao = Permissoes::verificaPermissao(__FUNCTION__);
  
      if ($permissao === true){
        $cliente = new Cliente ($nome, $RG, $email, $telefone, $cpf);
        return $cliente;
      } else {
        echo "Você não tem permissão para realizar a função " .__FUNCTION__. ".\n";
      }
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
