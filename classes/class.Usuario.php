<?php

include_once('global.php');

class Usuario extends persist {
    protected $email;
    protected $nome;
    private $senha;
    protected $Perfil;
    static $local_filename = "perfil.txt";
  
    public function __construct(string $email, string $nome, string $senha, Perfil $Perfil) {
        $this->email = $email;
        $this->nome = $nome;
        $this->senha = $senha;
        $this->Perfil = $Perfil;
    }

    static public function criaUsuario(string $email, string $nome, string $senha, Perfil $Perfil) {
        if ($Perfil->getPermissoes()["funcionario"] == true || $Perfil->getPermissoes()["dentista parceiro"] == true) {
            $usuario = new Usuario($email, $nome, $senha, $Perfil);
            return $usuario;
        }
    }

    public function verificaLogin() {
    
      $verifica = Login::getRecordsByField("logado", 1);
        if($verifica->getLogado() == 1){
            return true;
        }
        else 
            return false;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getPerfil() {
        return $this->Perfil;
    }
  
    static public function getFilename() {
        return get_called_class()::$local_filename;
  }
  
}