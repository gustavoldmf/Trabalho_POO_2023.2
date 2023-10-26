  <?php 

include_once('../global.php');

class DentistaParceiro extends Dentista {

    private $ComissaoPorCento;
    
    public function __construct($nome, $RG, $email, $telefone, $CRO, $endereco, $ComissaoPorCento) 
    {
        $this->nome=$nome;
        $this->RG=$RG;
        $this->email=$email;
        $this->telefone=$telefone;
        $this->CRO=$CRO;
        $this->endereco=$endereco;
        $this->ComissaoPorCento=$ComissaoPorCento;
    }

    public function getComissaoPorCento()
    {
      return $this->ComissaoPorCento;
    }

    public function setComissaoPorCento ($ComissaoPorCento)
    {
      $this->PorcetagemComissao = $ComissaoPorCento;
    }
}
