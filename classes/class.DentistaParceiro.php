  <?php 

include_once('../global.php');

class DentistaParceiro extends Pessoa {

    private $PorcentComissao;
    private $CRO;
  
    public function __construct($nome, $RG, $email, $telefone, $PorcentComissao, $CRO) 
    {
        $this->nome=$nome;
        $this->RG=$RG;
        $this->email=$email;
        $this->telefone=$telefone;
        $this->PorcentComissao=$PorcentComissao;
        $this->CRO=$CRO;
    }

    public function getPorcentComissao()
    {
      return $this->PorcentComissao;
    }

    public function setPorcentComissao ($PorcentComissao)
    {
      $this->PorcetagemComissao=$PorcentComissao;
    }  

    public function getCRO ()
    {
      return $this->CRO;
    }

    public function setCRO ()
    {
      $this->CRO = $CRO;
    }
}