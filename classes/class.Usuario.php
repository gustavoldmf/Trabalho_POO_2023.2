<?php

include_once('../global.php');

class Usuario {
    protected $email;
    protected $nome;
    private $senha;
    protected $Perfil;

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

    public function verificaLogin(string $email, string $senha) {
        $emailExiste = Login::getRecordsByField("email", $email);

        if ($emailExiste != null) {
            if ($senha == Login::getIntance()->getUsuario()->getSenha()) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }
}
