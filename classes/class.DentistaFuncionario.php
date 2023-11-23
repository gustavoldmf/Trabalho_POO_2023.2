    <?php 

include_once('global.php');

class DentistaFuncionario extends Dentista {

    protected $salario;
    static $local_filename = "dentistaFuncionario.txt";
  
  
    private function __construct (string $nome, string $RG, string $email, string $telefone, string $CRO, string $endereco, float $salario) 
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

    static public function cadastraDentistaFuncionario (string $nome, string $RG, string $email, string $telefone, string $CRO, string $endereco, float $salario) {
  
      $permissao = Permissoes::verificaPermissao(__FUNCTION__);
  
      if ($permissao === true){
        $dentista = new DentistaFuncionario ($nome, $RG, $email, $telefone, $CRO, $endereco, $salario);
        return $dentista;
      } else {
        echo "Você não tem permissão para realizar a função " .__FUNCTION__. ".\n";
      }
    }
  
    public function getSalario()
    {
      return $this->salario;
    }

    public function setSalario (float $salario)
    {
      $this->salario = $salario;
    }

  static public function getFilename() {
      return get_called_class()::$local_filename;
  }
  
}
