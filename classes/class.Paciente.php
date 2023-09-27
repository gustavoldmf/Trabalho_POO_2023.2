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
        $this->nascimento=$nascimento;
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

    public function getClienteAssociado ()
    {
      return $this->ClienteAssociado;
    }

}