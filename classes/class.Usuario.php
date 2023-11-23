<?php

include_once('global.php');

class Usuario extends persist {
    protected $email;
    protected $nome;
    private $senha;
    protected $perfil;
    static $local_filename = "usuario.txt";
  
    public function __construct(string $email, string $nome, string $senha, Perfil $perfil) {
        $this->email = $email;
        $this->nome = $nome;
        $this->senha = $senha;
        $this->perfil = $perfil;
    }

    static public function criaUsuario(string $email, string $nome, string $senha, Perfil $perfil) {
        if ($perfil->getPermissoes()["funcionario"] == true || $perfil->getPermissoes()["dentista parceiro"] == true) {
            $usuario = new Usuario($email, $nome, $senha, $perfil);
            return $usuario;
        }
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getPerfil() {
        return $this->perfil;
    }
  
    static public function getFilename() {
        return get_called_class()::$local_filename;
  }
  
}