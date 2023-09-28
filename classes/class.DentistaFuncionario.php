    <?php 

include_once('../global.php');

class DentistaFuncionario extends Dentista {

    private $especialidade;
    private $endereco;
    private $salario;
  
    public function __construct($nome, $RG, $email, $telefone, $CRO, $especialidade, $endereco, $salario) 
    {
        $this->nome=$nome;
        $this->RG=$RG;
        $this->email=$email;
        $this->telefone=$telefone;
        $this->CRO=$CRO;
        $this->especialidade=$especialidade;
        $this->endereco=$endereco;
        $this->salario=$salario;
    }

    public function getEspecialidade()
    {
      return $this->especialidade;
    }

    public function setEspecialidade ($especialidade)
    {
      $this->especialidade=$especialidade;
    }

    public function getEndereco()
    {
      return $this->endereco;
    }

    public function setEndereco($endereco)
    {
      $this->endereco = $endereco;
    }  

    public function getSalario()
    {
      return $this->salario;
    }

    public function setSalario ($salario)
    {
      $this->salario = $salario;
    }
}
