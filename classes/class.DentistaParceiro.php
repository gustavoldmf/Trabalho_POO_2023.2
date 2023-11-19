  <?php 

include_once('global.php');

class DentistaParceiro extends Dentista{
    protected $procedimentosFeitos = [];
    protected $habilitacoes = [];
    protected $totalPagamento;
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
    }

    public function addProcFeitos(Concluidos $concluidos){
        array_push($this->procedimentosFeitos, $concluidos);
    }

    public function addHabilitacao(Habilitacao $habilitacao){
      array_push($this->habilitacoes, $habilitacao);
    }
// leticia: alterei metodo calc pagamento - AINDA FALTA FAZER A FILTRAGEM DE DATAS
    public function CalcPagamento(array $procFeitos, array $habilitacao) {
      $totalPagamento = 0;

    foreach ($procFeitos as $concluidos) {
    $dataConclusao = $concluidos->getData();
    $proc = $concluidos->getProcedimento();

      foreach ($this->habilitacoes as $habilitacao) {
      $especialidade = $habilitacao->getEspecialidade();
      $comissao = $habilitacao->getComissao();
      if ($especialidade->getNomeEspecialidade() === $proc->getEspecialidade()){
            $pagamento = $comissao * $proc->getValorUnitario();
              $totalPagamento += $pagamento;
      }
      }
    }
    $this->totalPagamento = $totalPagamento;
    }

  public function getTotalPagamento(){
    return $this->totalPagamento;
  }

  public function getProcFeitos(){
    return $this->procedimentosFeitos;
  }

  public function getHabilitacao(){
    return $this->habilitacoes;
  }

  static public function getFilename() {
      return get_called_class()::$local_filename;
  }

}
