<?php

include_once('../global.php');

class Dentista extends Pessoa {
  protected $CRO;
  protected $endereco;
  protected $especialidadesDentista = []; // Atualização aqui

  public function __construct($nome, $RG, $email, $telefone, $CRO, $endereco) {
      $this->nome = $nome;
      $this->RG = $RG;
      $this->email = $email;
      $this->telefone = $telefone;
      $this->CRO = $CRO;
      $this->endereco = $endereco;
  }

  public function getCRO() {
      return $this->CRO;
  }

  public function setCRO($CRO) {
      $this->CRO = $CRO;
  }

  public function getEndereco() {
      return $this->endereco;
  }

  public function setEndereco($endereco) {
      $this->endereco = $endereco;
  }

  public function getEspecialidadesDentista() { // Atualização aqui
      return $this->especialidadesDentista;
  }

  public function setEspecialidadesDentista($especialidadesDentista) { // Atualização aqui
      $this->especialidadesDentista = $especialidadesDentista;
  }
}