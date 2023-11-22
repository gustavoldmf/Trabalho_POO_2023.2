    <?php 

include_once('global.php');

class Paciente extends Pessoa {

    protected $nascimento;
    protected $ClienteAssociado;
    static $local_filename = "paciente.txt";
  
    public function __construct(string $nome, string $RG, string $email, string $telefone, string $nascimento) 
    {
        $this->nome=$nome;
        $this->RG=$RG;
        $this->email=$email;
        $this->telefone=$telefone;
        $this->nascimento= $nascimento;
    }

    public function getNascimento ()
    {
      return $this->nascimento;
    }

    public function setNascimento (string $nascimento)
    {
      $this->nascimento= $nascimento;
    }  

    public function AssociaCliente (Cliente $ClienteAssociado)
    {
      $login1 = Login::getRecordsbyField("logado", 1);
      $permissao = Permissoes::verificaPermissao($login1, __FUNCTION__);

      if (permissao === true){
      $this->ClienteAssociado=$ClienteAssociado;  
      } else {
        echo "Voce nao tem permissao para realizar esta acao"
      }
    }
      
    public function DesassociaCliente (Cliente $ClienteAssociado)
    { 
      $login1 = Login::getRecordsbyField("logado", 1);
      $permissao = Permissoes::verificaPermissao($login1, __FUNCTION__);

      if (permissao === true){
      $this->ClienteAssociado= null;  
      } else {
        echo "Voce nao tem permissao para realizar esta acao"
      }
    }

    public function getClienteAssociado ()
    {
      return $this->ClienteAssociado;
    }

    public function exibeInfo(){
      $login1 = Login::getRecordsbyField("logado", 1);
      $permissao = Permissoes::verificaPermissao($login1, __FUNCTION__);

      if (permissao === true){
      print("Informações do Paciente:" ."\n\n");
      print("Nome:" .$this->nome ."\n");
      print("RG:" .$this->RG ."\n");
      print("Email:" .$this->email ."\n");
      print("Contato:" .$this->telefone ."\n");
      print("Data de nascimento:" .$this->nascimento ."\n");
      } else {
        echo "Voce nao tem permissao para realizar esta acao"
      }
    }

    static public function getFilename() {
        return get_called_class()::$local_filename;
    }

}