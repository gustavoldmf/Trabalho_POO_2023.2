   <?php 

include_once('global.php');

class Procedimentos extends persist {

    protected $nome;
    protected $descricao;
    protected $valorUnitario;
    protected $especialidade;
    static $local_filename = "procedimentos.txt";

//leticia: adicionei construtor e metodos para o parametro especialidade
    public function __construct(string $nome, string $descricao, float $valorUnitario, Especialidade $especialidade) 
    {
        $this->nome=$nome;
        $this->descricao=$descricao;
        $this->valorUnitario=$valorUnitario;
        $this->especialidade=$especialidade;
        $this->save();
    }

    static function criaProcedimento(string $nome, string $descricao, float $valorUnitario, Especialidade $especialidade){
      $login1 = Login::getRecordsbyField("logado", 1);
      $permissao = Permissoes::verificaPermissao($login1, __FUNCTION__);

      if (permissao === true){
      $procedimento = new Procedimento ($nome, $descricao, $valorUnitario, $especialidade);
        return $procedimento;
      } else {
        echo "Voce nao tem permissao para realizar esta acao"
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
