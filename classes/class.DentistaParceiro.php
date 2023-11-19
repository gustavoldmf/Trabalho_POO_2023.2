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
        array_push($this->procedimentosFeitos, $concluidos);
    }

    public function addHabilitacao(Habilitacao $habilitacao){
      array_push($this->habilitacoes, $habilitacao);
    }

    public function addPagamento(string $mesAno){
        $pagamentoMes = new PagamentoMes ($mesAno);
        $pagamentoMes->calcPagamento($this);
        array_push($this->pagamentos, $pagamentoMes);
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

