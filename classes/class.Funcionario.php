    <?php 

include_once('../global.php');

class Funcionario extends Pessoa {

    private $endereco;
    private $salario;
  
    public function __construct($nome, $RG, $email, $telefone, $endereco, $salario) 
    {
        $this->nome=$nome;
        $this->RG=$RG;
        $this->email=$email;
        $this->telefone=$telefone;
        $this->endereco=$endereco;
        $this->salario=$salario;
    }

    public function getEndereco()
    {
      return $this->endereco;
    }

    public function setEndereco($endereco)
    {
      $this->endereco=$endereco;
    }  

    public function getSalario ()
    {
      return $this->salario;
    }

    public function setSalario ()
    {
      $this->salario = $salario;
    }
}