<?php 

class Orcamento
{
    protected $PacienteAssociado, $DentistaAssociado, $Data, $ValorTotal, $Aprovado;
    protected $ProcedimentosAssociados = array();
    protected $DetalhamentosAssociados = array();

    public function __construct($PacienteAssociado, $DentistaAssociado, $Data)
    {
        $this->PacienteAssociado = $PacienteAssociado;
        $this->DentistaAssociado = $DentistaAssociado;
        $this->Data = $Data;
    }
  
    public function getPacienteAssociado ()
    {
        return $this->PacienteAssociado;
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
        return $ValorTotal;
    }
  
    public function getProcedimentosAssociados ()
    {
        return $this->ProcedimentosAssociados;
    }
  
    public function getDetalhamentosAssociados ()
    {
        return $this->DetalhamentosAssociados;
    }

    public function setPacienteAssociado ($PacienteAssociado)
    {
        $this->PacienteAssociado = $PacienteAssociado;
    }

    public function setDentistaAssociado ($DentistaAssociado)
    {
        $this->DentistaAssociado = $DentistaAssociado;
    }
  
    public function setData ($Data)
    {
        $this->Data = $Data;
    }    

    public function setValorTotal ($ValorTotal)
    {
        $this->ValorTotal = $ValorTotal;
    } 

   public function addProcedimento ($Procedimento)
    {
        array_push ($this->ProcedimentosAssociados, $Procedimento);
      
        $a = 3;
        while (($a != 0) and ($a != 1)) {
          print("Voce gostaria de adicionar um detalhamento para o procedimento adicionado? Digite 0 para nao e 1 para sim."."\n");
          $a = readline();
        }
      
        if ($a==1){
          $b = sizeof(this->ProcedimentosAssociados);
          $this->addDetalhamento($b - 1);
        }
    }

    public function addDetalhamento($a)
    {
        
        $c = 2;
        while (($c == 2) or ($c == 0)) {
        print("Digite o detalhamento para o procedimento ".$this->ProcedimentosAssociados[$a]."\n");
        $b = readline();
           
          while (($c != 0) and ($c != 1)) {
            print("O texto digitado foi: ".$b." Voce gostaria de confirmar esse detalhamento? Digite 0 para nao e 1 para sim"."\n");
            $c = readline();
          }
        }
        if($c == 1){
        $this->DetalhemtnosAssociados[$a] = $b;
        }
    }

    public function calculaOrcamento ()
    {
        for ($i = 0; $i < count($this->ProcedimentosAssociados); $i++) {
            print ("\n" ."Procedimento: "  .$this->ProcedimentosAssociados[$i]->getDescricao() ."\n\n" );
            print ("Valor Unitario: "  .$this->ProcedimentosAssociados[$i]->getValorUnitario() ."\n");
        }
        print("\n" ."Valor Total do Orçamento: R$" .$this->getValorTotal() ."\n");
    }

    public function analiseAprovacao ()
    {
      $a = 3;
        while (($a != 0) and ($a != 1)) {
          print("O orçamento foi aprovado e sera iniciado um tratamento? Digite 0 para nao e 1 para sim."."\n");
          $a = readline();
        }

        if ($a == 1) {
          
          $b = 0;
          $this->Aprovado = 1;
          while (($b != 1) and ($b != 2) and ($b != 3)) {
            print("Qual o metodo de pagamento? Digite 1 para dinheiro a vista, 2 para cartao de credito a vista e 3 para parcelado no cartao de credito em ate 6 vezes"."\n");
            $b = readline();
          }  
          
          if ($b == 1){
          
            $metodoPagamento = 'Dinheiro a vista';
            
          } elseif ($b == 2){
          
           $metodoPagamento = 'Cartao de Credito a Vista';
           
          } elseif ($b == 3) {
          
            $c = 0;
            while (($c != 1) and ($c != 2) and ($c != 3) and ($c != 4) and ($c != 5) and ($c != 6)) {
            print("Qual sera o numero de parcelas? Digite um numero de 1 a 6"."\n");
            $c = readline();
            }
            $metodoPagamento = 'Cartao de Credito, dividido de' .$c.' vezes';
            
          }
          
           $Tratamento = new Tratamento($this, $metodoPagamento)
           
        }
    }
    public function tamProcedimento ()
    {
        return sizeof ($this->ProcedimentosAssociados);
    }

      public function retornaProcedimento ($i)
    {
        return $this->ProcedimentosAssociados[$i];
    }

}
