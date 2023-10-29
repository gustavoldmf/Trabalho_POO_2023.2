 <?php 

include_once('../global.php');

class Tratamento extends Orcamento{

    private $orcamento, $paciente;

    protected $orcamentoAssociado, $tipoPagamento;

 

    public function __construct($orcamentoAssociado, $tipoPagamento) {

        $this->orcamentoAssociado = $orcamentoAssociado;

        $this->tipoPagamento = $tipoPagamento;

    }

 

    public function getOrcamentoAssociado (){

        return $this->orcamentoAssociado;

    }

 

    public function getTipoPagamento (){

        return $this->tipoPagamento;

    }

 

    public function setOrcamentoAssociado ($orcamentoAssociado)

    {

        $this->orcamentoAssociado = $orcamentoAssociado;

    }

 

    public function setTipoPagamento ($tipoPagamento)

    {

        $this->tipoPagamento = $tipoPagamento;

    }    
    public function AgendaConsulta ($DentistaEx, $DataC, $HorarioC, $DuracaoC)

    {
      // os parametros serao inseridos dentro da funcao, nao como parametros. para isso vamos usar o getrecords e a partir dele selecionar o dentista escolhido
      print ("Os seguintes procedimentos estao definidos no tratamento: \n");
      for (i=0; i<$orcamentoAssociado->getTamProc(); i++){
      print ("($i+1) - $orcamentoAssociado->getProcedimento(i)\n");
      }
      print ("Digite o numero do procedimento escolhido: ");
      $decisao = readline();
      $decisao = $decisao - 1;

      $c = new Consulta ($orcamentoAssociado->getPaciente, $DentistaEx, $DataC, $HorarioC, $DuracaoC, $orcamentoAssociado->getProcedimento(decisao));
      
      
    }
}