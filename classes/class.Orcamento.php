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
        array_push ($this->procedimentosAssociados, $procedimento);
    }

    public function addDetalhamento (string $detalhamento)
    {   
        array_push ($this->detalhamentosAssociados, $detalhamento);
    }

    public function calculaOrcamento ()
    {
        return $this->getValorTotal();
    }

    public function analiseAprovacao (int $formaPgto, int $parcelas)
    {
      if ($formaPgto === 1 or $formaPgto === 2 or $formaPgto === 3){
        
        if ($formaPgto === 1){
          $tipoPgto = 'Dinheiro a vista';
        } else if ($formaPgto === 2){
          $tipoPgto = 'Cartao de credito a vista';
        } else if ($formaPgto === 3){
          $tipoPgto = 'Parcelado no cartao de '.$parcelas.' vezes' ;
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
