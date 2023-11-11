    <?php 

include_once('global.php');

class DentistaFuncionario extends Dentista {

    protected $salario;
    static $local_filename = "dentistaFuncionario.txt";
  
  
    public function __construct (string $nome, string $RG, string $email, string $telefone, string $CRO, string $endereco, string $salario) 
    {
        $this->nome=$nome;
        $this->RG=$RG;
        $this->email=$email;
        $this->telefone=$telefone;
        $this->CRO=$CRO;
        $this->endereco=$endereco;
        $this->salario=$salario;
        $this->especialidadesDentista = [];
    } 

    public function getSalario()
    {
      return $this->salario;
    }

    public function setSalario (string $salario)
    {
      $this->salario = $salario;
    }

  static public function getFilename() {
      return get_called_class()::$local_filename;
  }
  
}
