<?php

include_once('global.php');

class Dentista extends Pessoa {
  protected $CRO;
  protected $endereco;
  protected $especialidadesDentista = []; // Atualização aqui
  //leticia : adicionei o atributo usuario
  protected $usuario;
  static $local_filename = "dentista.txt";
  
  private function __construct(string $nome, string $RG, string $email, string $telefone, string $CRO, string $endereco) {
      $this->nome = $nome;
      $this->RG = $RG;
      $this->email = $email;
      $this->telefone = $telefone;
      $this->CRO = $CRO;
      $this->endereco = $endereco;
        
      $this->especialidadesDentista = [];
  }

  static public function cadastraDentista (string $nome, string $RG, string $email, string $telefone, string $CRO, string $endereco) {

    $permissao = Permissoes::verificaPermissao(__FUNCTION__);

    if ($permissao === true){
      $dentista = new Dentista ($nome, $RG, $email, $telefone, $CRO, $endereco);
      return $dentista;
    } else {
      echo "Você não tem permissão para realizar " .__FUNCTION__. ".\n";
    }
  }
  

  public function getCRO() {
      return $this->CRO;
  }

  public function setCRO(string $CRO) {
      $this->CRO = $CRO;
  }

  public function getEndereco() {
      return $this->endereco;
  }

  public function setEndereco(string $endereco) {
      $this->endereco = $endereco;
  }

  public function getEspecialidadesDentista() { // Atualização aqui
      return $this->especialidadesDentista;
  }
  
  //leticia: mudei metodo para addEspecialidade em vez de set especialidade. Agora, adicionamos uma especialidade por vez.
  
  public function addEspecialidadesDentista(Especialidade $especialidade) { 
    $permissao = Permissoes::verificaPermissao(__FUNCTION__);

    if ($permissao === true){
     array_push($this->especialidadesDentista, $especialidade);
    } else {
      echo "Você não tem permissão para realizar " .__FUNCTION__. ".\n";
    }
  }

  public function setUsuario(Usuario $usuario) {
      $this->usuario = $usuario;
  }
  
  public function getUsuario() {
     return $this->usuario;
  }
  
  static public function getFilename() {
      return get_called_class()::$local_filename;
  }
}