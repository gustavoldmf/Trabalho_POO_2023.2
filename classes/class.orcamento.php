<?php 

class Orcamento
{
    protected $pacienteAssociado, $DentistaAssociado, $Data, $ValorTotal, $Aprovado;
    protected $ProcedimentosAssociados = array();

    public function __construct($pacienteAssociado, $DentistaAssociado, $data)
    {
        $this->PacienteAssociado = $pacienteAssociado;
        $this->DentistaAssociado = $DentistaAssociado;
        $this->Data = $Data;
    }
  
    public function getPacienteAssociado ()
    {
        return $this->pacienteAssociado;
    }

    public function getDentistaAssociado ()
    {
        return $this->DentistaAssociado;
    }
  
    public function getData ()
    {
        return $this->Data;
    }    

    public function getAprovado ()
    {
        return $this->Aprovado;
    }
  
    public function getValorTotal ()
    {
        $soma = 0;
        for ($i = 0; $i < count($this->ProcedimentosAssociados); $i++) {
            $soma = $soma + $this->ProcedimentosAssociados[$i]->getValorUnitario();
        }
        $ValorTotal = $soma;
        return $soma;
    }
  
    public function getProcedimentosAssociados ()
    {
        return $this->ProcedimentosAssociados;
    }

    public function setPacienteAssociado ($pacienteAssociado)
    {
        $this->pacienteAssociado = $pacienteAssociado;
    }

    public function setDentistaAssociado ($DentistaAssociado)
    {
        $this->DentistaAssociado = $DentistaAssociado;
    }
  
    public function setData ($data)
    {
        $this->Data = $Data;
    }    

    public function setAprovado ($aprovado)
    {
        $this->aprovado = $aprovado;
    }  

    public function setValorTotal ($valorTotal)
    {
        $this->valorTotal = $valorTotal;
    } 

    public function addProcedimento ($procedimento)
    {
        array_push ($this->ProcedimentosAssociados, $procedimento);
    }

    public function calculaOrcamento ()
    {
        for ($i = 0; $i < count($this->ProcedimentosAssociados); $i++) {
            print ("Procedimento:  $this->ProcedimentosAssociados[$i]->getDescricao() \n");
            print ("Valor Unitário:  $this->ProcedimentosAssociados[$i]->getValorUnitario() \n\n");
        }
        print("Valor Total: R$ $this->getValorTotal()");
    }
}
