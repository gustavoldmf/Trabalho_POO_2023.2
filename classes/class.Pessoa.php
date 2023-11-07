  <?php 

include_once('../global.php');

class Pessoa extends persist {
    protected $nome, $RG, $email, $telefone;
    static $local_filename = "pessoa.txt";
  
    public function __construct(string $nome, string $RG, string $email, string $telefone){
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

    public function setNome (string $nome){
      $this->nome = $nome;
    }

    public function setRG (string $RG){
      $this->RG = $RG;
    }
  
    public function setEmail (string $email){
      $this->email = $email;
    }    

     public function setTelefone (string $telefone){
      $this->telefone = $telefone;
    }  

  
    static public function getFilename() {
      return get_called_class()::$local_filename;
    }
}