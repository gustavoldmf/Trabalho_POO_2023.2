<?php 

include_once('../global.php');

class Tratamento extends Orcamento {
    private $orcamentoAssociado;
    private $especialidade;
    private $tipoPagamento;
    private $execucao = [];
    private $Concluidos = [];

    public function __construct(Especialidade $especialidade, $orcamentoAssociado, $tipoPagamento) {
        $this->orcamentoAssociado = $orcamentoAssociado;
        $this->especialidade = $especialidade;
        $this->tipoPagamento = $tipoPagamento;
    }

    public function getOrcamentoAssociado() {
        return $this->orcamentoAssociado;
    }

    public function getTipoPagamento() {
        return $this->tipoPagamento;
    }

    public function setOrcamentoAssociado($orcamentoAssociado) {
        $this->orcamentoAssociado = $orcamentoAssociado;
    }

    public function setTipoPagamento($tipoPagamento) {
        $this->tipoPagamento = $tipoPagamento;
    }

    public function verificaEspecialidadeDentista(Dentista $dentista, Procedimento $procedimento) {
        $especialidadeDentista = $dentista->getEspecialidade();
        $especialidadeProcedimento = $procedimento->getEspecialidade();
        return $especialidadeDentista->getNomeEspecialidade() === $especialidadeProcedimento->getNomeEspecialidade();
    }

    public function AssociaResponsavel(Dentista $DentistaEx, Procedimento $Procedimento) {
        if ($this->verificaEspecialidadeDentista($DentistaEx, $Procedimento)) {
            $responsabilidades = new Responsabilidades($DentistaEx, $Procedimento);
            $this->execucao[] = $responsabilidades; 
            return true;
        } else {
            echo "O dentista não possui a especialidade necessária para o procedimento.";
            return false;
        }
    }

    public function marcaConsulta(Paciente $paciente, $data, $horario, $duracao, Responsabilidades $responsabilidades) {
        print ("Os seguintes procedimentos estão definidos no tratamento: \n");
        for ($i = 0; $i < $orcamentoAssociado->getTamProc(); $i++) {
            print ("($i+1) - " . $orcamentoAssociado->getProcedimento($i)->getNome() . "\n");
        }
        print ("Digite o número do procedimento escolhido: ");

        $decisao = readline();
        $decisao = $decisao - 1;

        $c = new Consulta(
            $paciente,
            $DentistaEx,
            $data,
            $horario,
            $duracao,
            $orcamentoAssociado->getProcedimento($decisao)
        );

        $c->setResponsabilidades($responsabilidades);

        return $c;
    }

    public function finalizaProcedimento(Responsabilidades $responsabilidades, $dataConclusao) {
        if ($this->verificaEspecialidadeDentista($responsabilidades->getDentistaEx(), $responsabilidades->getProcedimento())) {
            $concluido = new Concluidos($dataConclusao);
            $this->Concluidos[] = $concluido;
            return true;
        } else {
            return false;
        }
    }
}