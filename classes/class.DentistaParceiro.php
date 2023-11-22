  <?php 

include_once('global.php');

class DentistaParceiro extends Dentista{
    protected $procedimentosFeitos = [];
    protected $habilitacoes = [];
    protected $pagamentos = [];
    static $local_filename = "dentistaParceiro.txt";
  

    public function __construct(string $nome, string $RG, string $email, string $telefone, string $CRO, string $endereco){
        $this->nome=$nome;
        $this->RG=$RG;
        $this->email=$email;
        $this->telefone=$telefone;
        $this->CRO=$CRO;
        $this->endereco=$endereco;
        $this->especialidadesDentista = [];
        $this->procedimentosFeitos = [];
        $this->habilitacoes = [];
        $this->pagamentos = [];
    }

    public function addProcFeitos(Concluidos $concluidos){
      $login1 = Login::getRecordsbyField("logado", 1);
      $permissao = Permissoes::verificaPermissao($login1[0], __FUNCTION__);

      if ($permissao === true){
        array_push($this->procedimentosFeitos, $concluidos);
      } else {
        echo "Voce nao tem permissao para realizar esta acao";
      }
    }

    public function addHabilitacao(Habilitacao $habilitacao){
      $login1 = Login::getRecordsbyField("logado", 1);
      $permissao = Permissoes::verificaPermissao($login1[0], __FUNCTION__);

      if ($permissao === true){
      array_push($this->habilitacoes, $habilitacao);
      } else {
          echo "Voce nao tem permissao para realizar esta acao";
        }
    }

    public function addPagamento(string $mesAno){
      $login1 = Login::getRecordsbyField("logado", 1);
      $permissao = Permissoes::verificaPermissao($login1[0], __FUNCTION__);

      if ($permissao === true){
      
        $pagamentoMes = new PagamentoMes ($mesAno);
        $pagamentoMes->calcPagamento($this);
        array_push($this->pagamentos, $pagamentoMes);
      } else {
        echo "Voce nao tem permissao para realizar esta acao";
      }
    }


  public function getProcFeitos(){
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

