   <?php 

include_once('global.php');

class Procedimentos extends persist {

    protected $nome;
    protected $descricao;
    protected $valorUnitario;
    protected $especialidade;
    static $local_filename = "procedimentos.txt";

    private function __construct(string $nome, string $descricao, float $valorUnitario, Especialidade $especialidade) 
    {
        $this->nome=$nome;
        $this->descricao=$descricao;
        $this->valorUnitario=$valorUnitario;
        $this->especialidade=$especialidade;
        $this->save();
    }

    static public function criaProcedimento(string $nome, string $descricao, float $valorUnitario, Especialidade $especialidade){
      $permissao = Permissoes::verificaPermissao(__FUNCTION__);

      if ($permissao === true){
      $procedimento = new Procedimentos($nome, $descricao, $valorUnitario, $especialidade);
        return $procedimento;
      } else {
        echo "Você não tem permissão para realizar a função " .__FUNCTION__. ".\n";
      }
    }

    public function getNome ()
    {
      return $this->nome;
    }
  
    public function setNome (string $nome)
    {
      $this->nome = $nome;
    }  

      public function getDescricao ()
    {
      return $this->descricao;
    }
  
    public function setDescricao (string $descricao)
    {
      $this->descricao = $descricao;
    }  

       public function getValorUnitario ()
    {
      return $this->valorUnitario;
    }
  
    public function setValorUnitario (float $valorUnitario)
    {
      $this->ValorUnitario = $valorUnitario;
    }         
  
    public function getEspecialidade () {
      return $this->especialidade;
    }
  
    public function setEspecialidade (Especialidade $especialidade)
    {
      $this->especialidade = $especialidade;
    }  
  
    static public function getFilename() {
        return get_called_class()::$local_filename;
    }

}
