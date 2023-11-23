  <?php 

include_once('global.php');

class DentistaParceiro extends Dentista{
    protected $procedimentosFeitos = array();
    protected $habilitacoes = array();
    protected $pagamentos = array();
    static $local_filename = "dentistaParceiro.txt";
  

    public function __construct(string $nome, string $RG, string $email, string $telefone, string $CRO, string $endereco){
        $this->nome=$nome;
        $this->RG=$RG;
        $this->email=$email;
        $this->telefone=$telefone;
        $this->CRO=$CRO;
        $this->endereco=$endereco;
    }

    public function addProcFeitos(Concluidos $concluidos){
      $permissao = Permissoes::verificaPermissao(__FUNCTION__);

      if ($permissao === true){
        array_push($this->procedimentosFeitos, $concluidos);
      } else {
        echo "Você não tem permissão para realizar " .__FUNCTION__. ".\n";
      }
    }

    public function addHabilitacao(Habilitacao $habilitacao){
      $permissao = Permissoes::verificaPermissao(__FUNCTION__);

      if ($permissao === true){
      array_push($this->habilitacoes, $habilitacao);
      } else {
          echo "Você não tem permissão para realizar " .__FUNCTION__. ".\n";
        }
    }

    public function addPagamento(string $mesAno){
      $permissao = Permissoes::verificaPermissao(__FUNCTION__);

      if ($permissao === true){
      
        $pagamentoMes = new PagamentoMes ($mesAno);
        $pagamentoMes->calcPagamento($this);
        array_push($this->pagamentos, $pagamentoMes);
      } else {
        echo "Você não tem permissão para realizar " .__FUNCTION__. ".\n";
      }
    }


  public function getProcFeitos(){
    print_r($this->procedimentosFeitos);
    return $this->procedimentosFeitos;
  }

  public function getHabilitacao(){
    return $this->habilitacoes;
  }

  public function getPagamentos(){
    return $this->pagamentos;
  }

  static public function getFilename() {
      return get_called_class()::$local_filename;
  }

}

