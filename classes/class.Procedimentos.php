   <?php 

include_once('../global.php');

class Procedimentos {

    private $nome;
    private $descricao;
    private $ValorUnitario;


    public function __construct($nome, $descricao, $ValorUnitario) 
    {
        $this->nome=$nome;
        $this->descricao=$descricao;
        $this->ValorUnitario=$ValorUnitario;
    }

    public function getNome ()
    {
      return $this->nome;
    }
  
    public function setNome ($nome)
    {
      $this->nome = $nome;
    }  

      public function getDescricao ()
    {
      return $this->descricao;
    }
  
    public function setDescricao ($descricao)
    {
      $this->descricao = $descricao;
    }  

       public function getValorUnitario ()
    {
      return $this->ValorUnitario;
    }
  
    public function setValorUnitario ($ValorUnitario)
    {
      $this->ValorUnitario = $ValorUnitario;
    }  

      public function setValorUnitario ($ValorUnitario)
    {
      $this->ValorUnitario = $ValorUnitario;
    } 
}
