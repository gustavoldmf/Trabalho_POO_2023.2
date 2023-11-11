    <?php 
include_once('global.php');

class Funcionario extends Pessoa {

    protected $endereco;
    protected $salario;
    // leticia : adicionei atributo usuario
    protected $usuario;
    static $local_filename = "funcionario.txt";
  
    public function __construct(string $nome, string $RG, string $email, string $telefone, string $endereco, string $salario) 
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

    public function setEndereco(string $endereco)
    {
      $this->endereco=$endereco;
    }  

    public function getSalario ()
    {
      return $this->salario;
    }

    public function setSalario (string $salario)
    {
      $this->salario = $salario;
    }

    public function setUsuario(Usuario $usuario) {
        $this->usuario = $usuario;
    }
  
    public function getUsuario() {
       return $this->usuario;
    }

    static public function getFilename() {
        return get_called_class()::$local_filename;
    }
}