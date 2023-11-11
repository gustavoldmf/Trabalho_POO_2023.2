  <?php 

include_once('global.php');

class DentistaParceiro extends Dentista{
    protected $procedimentosFeitos = [];
    protected $habilitacoes = [];
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
        $this->procedimentosFeitos[] = $concluidos;
    }

    public function addHabilitacao(Habilitacao $habilitacao){
        $this->habilitacoes[] = $habilitacao;
    }
// leticia: alterei metodo calc pagamento - AINDA FALTA FAZER A FILTRAGEM DE DATAS
    public function CalcPagamento(array $procFeitos, array $habilitacao) {
      $totalPagamento = 0;

    foreach ($procFeitos as $concluido) {
    $dataConclusao = $concluido->getData();

      foreach ($this->habilitacoes as $habilitacao) {
      $especialidade = $habilitacao->getEspecialidade();
      $comissao = $habilitacao->getComissao();
      if ($especialidade->getNomeEspecialidade() === $concluido->procedimento->getNomeEspecialidade()){
            $pagamento = $comissao * $concluido->procedimento->getValorUnitario();
              $totalPagamento += $pagamento;
      }
      }
    }
    return $totalPagamento;
    }

  static public function getFilename() {
      return get_called_class()::$local_filename;
  }

}
