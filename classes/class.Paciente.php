    <?php 

include_once('../global.php');

class Paciente extends Pessoa {

    private $nascimento;
    private $ClienteAssociado;
  
    public function __construct($nome, $RG, $email, $telefone, $nascimento) 
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

    public function setNascimento ($nascimento)
    {
      $this->nascimento= $nascimento;
    }  

    public function AssociaCliente ($ClienteAssociado)
    {
      $this->ClienteAssociado=$ClienteAssociado;  
    }
      
    public function DesassociaCliente ($ClienteAssociado)
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

}