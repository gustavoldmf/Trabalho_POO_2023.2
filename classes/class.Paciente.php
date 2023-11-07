    <?php 

include_once('../global.php');

class Paciente extends Pessoa {

    protected $nascimento;
    protected $ClienteAssociado;
    static $local_filename = "paciente.txt";
  
    public function __construct(string $nome, string $RG, string $email, string $telefone, string $nascimento) 
    {
        $this->nome=$nome;
        $this->RG=$RG;
        $this->email=$email;
        $this->telefone=$telefone;
        $this->nascimento= $nascimento;
    }

    public function getNascimento ()
    {
      return $this->nascimento;
    }

    public function setNascimento (string $nascimento)
    {
      $this->nascimento= $nascimento;
    }  

    public function AssociaCliente (Cliente $ClienteAssociado)
    {
      $this->ClienteAssociado=$ClienteAssociado;  
    }
      
    public function DesassociaCliente (Cliente $ClienteAssociado)
    {
      $this->ClienteAssociado= null;  
    }

    public function getClienteAssociado ()
    {
      return $this->ClienteAssociado;
    }

    public function exibeInfo(){
      print("Informações do Paciente:" ."\n\n");
      print("Nome:" .$this->nome ."\n");
      print("RG:" .$this->RG ."\n");
      print("Email:" .$this->email ."\n");
      print("Contato:" .$this->telefone ."\n");
      print("Data de nascimento:" .$this->nascimento ."\n");
    }

    static public function getFilename() {
        return get_called_class()::$local_filename;
    }

}