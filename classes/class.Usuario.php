<?php 

include_once('../global.php');

class Usuario{
  protected $email;
  protected $nome;
  private $senha; 
  protected $Perfil;


  public function __contruct(string $email, string $nome, string $senha, Perfil $Perfil){
    $this->email = $email;
    $this->nome = $nome;
    $this->senha = $senha;
    $this->Perfil = $Perfil;
  }

  //com base na seguinte instrução da sprint 4 eu peguei a array de permissoes verifiquei se a chave funcionario => true e dentista parceiro => true para saber se está permitido criar um usuario 
  //Tópico da sprint 4: O sistema deve permitir o cadastro de usuários contendo login,senha e e-mail. Apenas os funcionários e dentistas parceiros devem ter acesso ao sistema e, portanto, possuir usuário cadastrado.

  static public function criaUsuario(string $email, string $nome, string $senha, Perfil $Perfil){

    if($Perfil->getPermissoes()["funcionario"] == true || $Perfil->getPermissoes()["dentista parceiro"] == true){
    $usuario = new Usuario($email, $nome, $senha, $Perfil);
    return $usuario;
    }

  }

  public function verificaLogin(string $email, string $senha){

    // verifica se o email ja existe no banco de dados de login, caso exista será possivel verificar a senha e retornar true or false 
    $emailExiste = Login::getRecordsByField("email", $email);

    if($emailExiste != null){
      if($senha == Login::getIntance()->getUsuario()->getSenha()){
      return true;
      }
      else
      return false;
    }
  
}

  public function getEmail(){
    return = $this->email;
  }

  public function getSenha(){
    return = $this->senha;
  }

}
