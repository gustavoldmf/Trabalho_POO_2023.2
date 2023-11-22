<?php 

include_once('global.php');

class Orcamento extends persist{
  
    protected $pacienteAssociado, $dentistaAssociado, $data, $valorTotal;
    protected $procedimentosAssociados = [];
    protected $detalhamentosAssociados = [];
    static $local_filename = "orcamento.txt";
  

    public function __construct(Paciente $pacienteAssociado, Dentista $dentistaAssociado, string $data)
    {
        $this->pacienteAssociado = $pacienteAssociado;
        $this->dentistaAssociado = $dentistaAssociado;
        $this->data = $data;
        $this->procedimentosAssociados = [];
        $this->detalhamentosAssociados = [];
    }
  
    public function getPacienteAssociado ()
    {
        return $this->pacienteAssociado;
    }

    public function getDentistaAssociado ()
    {
        return $this->dentistaAssociado;
    }
  
    public function getData ()
    {
        return $this->data;
    }    
  
    public function getValorTotal ()
    {
        $soma = 0;
        for ($i = 0; $i < count($this->procedimentosAssociados); $i++) {
            $soma = $soma + $this->procedimentosAssociados[$i]->getValorUnitario();
        }
        $valorTotal = $soma;
        return $valorTotal;
    }
  
    public function getProcedimentosAssociados ()
    {
        return $this->procedimentosAssociados;
    }
  
    public function getDetalhamentosAssociados ()
    {
        return $this->detalhamentosAssociados;
    }

    public function setPacienteAssociado (Paciente $pacienteAssociado)
    {
        $this->pacienteAssociado = $pacienteAssociado;
    }

    public function setDentistaAssociado (Dentista $dentistaAssociado)
    {
        $this->dentistaAssociado = $dentistaAssociado;
    }
  
    public function setData (string $data)
    {
        $this->data = $data;
    }    

    public function setValorTotal (float $valorTotal)
    {
        $this->valorTotal = $valorTotal;
    } 
  
   public function addProcedimento (Procedimentos $procedimento)
    {
      $login1 = Login::getRecordsbyField("logado", 1);
      $permissao = Permissoes::verificaPermissao($login1, __FUNCTION__);

      if (permissao === true){
        array_push ($this->procedimentosAssociados, $procedimento);
      } else {
        echo "Voce nao tem permissao para realizar esta acao"
      }
    }

    public function addDetalhamento (string $detalhamento)
    {   
        $login1 = Login::getRecordsbyField("logado", 1);
        $permissao = Permissoes::verificaPermissao($login1, __FUNCTION__);
  
        if (permissao === true){
        array_push ($this->detalhamentosAssociados, $detalhamento);
        }else {
        echo "Voce nao tem permissao para realizar esta acao"
      }
    }

    public function calculaOrcamento ()
    {
        return $this->getValorTotal();
    }

    public function analiseAprovacao (int $formaPgto, int $parcelas)
    {
      if ($formaPgto >= 1 and $formaPgto <= 4) {
        
        if ($formaPgto === 1){
          $tipoPgto = "Dinheiro à vista";
        } 
        else if ($formaPgto === 2){
          $tipoPgto = "PIX";
        } 
        else if ($formaPgto === 3){
          $tipoPgto = "Cartão de débito";
        } 
        else if ($formaPgto === 4){
          if ($parcelas === 1){
            $tipoPgto = "Cartão de crédito à vista";
          } 
          else if ($parcelas >= 2 and $parcelas <= 6){
            $tipoPgto = "Parcelado em ".$parcelas." vezes no cartão";
          }
          else {
            print "Forma de pagamento invalida";
            return false;
          }
        }
        
        $Tratamento = new Tratamento($this, $tipoPgto);
          return $Tratamento;

      } else {
        print "Forma de pagamento invalida";
        return false;
      }

    }
  
    public function tamProcedimento ()
    {
        return sizeof ($this->procedimentosAssociados);
    }

      public function retornaProcedimento (int $i)
    {
        return $this->procedimentosAssociados[$i];
    }

    static public function getFilename() {
        return get_called_class()::$local_filename;
    }

}
