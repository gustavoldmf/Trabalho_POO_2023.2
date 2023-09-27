    <?php 

include_once('../global.php');

class Dentista extends Funcionario {

    private $CRO;
    private $especialidade;
  
    public function __construct($nome, $RG, $email, $telefone, $especialidade, $CRO) 
    {
        $this->nome=$nome;
        $this->RG=$RG;
        $this->email=$email;
        $this->telefone=$telefone;
        $this->especialidade=$especialidade;
        $this->CRO=$CRO;
    }

    public function getEspecialidade()
    {
      return $this->especialidade;
    }

    public function setEspecialidade ($especialidade)
    {
      $this->especialidade=$especialidade;
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