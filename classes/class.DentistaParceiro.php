  <?php 

include_once('../global.php');

class DentistaParceiro extends Dentista{
    private $procedimentosFeitos = [];
    private $Habilitacao = [];

    public function __construct($nome, $RG, $email, $telefone, $CRO, $endereco){
        parent::__construct($nome, $RG, $email, $telefone, $CRO, $endereco);
    }

    public function addProcFeitos(Concluidos $concluidos){
        $this->procedimentosFeitos[] = $concluidos;
    }

    public function addHabilitacao(Habilitacao $habilitacao){
        $this->Habilitacao[] = $habilitacao;
    }

    public function CalcPagamento(array $procFeitos, array $Habilitacao) {
      $totalPagamento = 0;

    foreach ($procFeitos as $concluido) {
    $dataConclusao = $concluido->getdata();

      foreach ($this->Habilitacao as $habilitacao) {
      $especialidade = $habilitacao->getEspecialidade();
      $comissao = $habilitacao->getComissao();
      if ($especialidade->getNomeEspecialidade() === $dataConclusao){
            $pagamento = $comissao * $valorProcedimento;
              $totalPagamento += $pagamento;
      }
      }
    }
    return $totalPagamento;
    }
}
