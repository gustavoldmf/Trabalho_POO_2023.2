    <?php 

include_once('../global.php');

class DentistaFuncionario extends Dentista {

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

    public function getSalario()
    {
      return $this->salario;
    }

    public function setSalario ($salario)
    {
      $this->salario = $salario;
    }
}
