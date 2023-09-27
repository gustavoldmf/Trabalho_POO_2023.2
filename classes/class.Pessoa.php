  <?php 

include_once('../global.php');

class Pessoa
{
    protected $nome, $RG, $email, $telefone;
  
    public function __construct($nome, $RG, $email, $telefone){
        $this->nome=$nome;
        $this->RG=$RG;
        $this->email=$email;
        $this->telefone=$telefone;   
    }

    public function getNome (){
      return $this->nome;
    }

    public function getRG (){
      return $this->RG;
    }
  
    public function getEmail (){
      return $this->email;
    }    

     public function getTelefone (){
      return $this->telefone;
    }

    public function setNome ($nome){
      $this->nome = $nome;
    }

    public function setRG ($RG){
      $this->RG = $RG;
    }
  
    public function setEmail ($email){
      $this->email = $email;
    }    

     public function setTelefone ($telefone){
      $this->telefone = $telefone;
    }  
}