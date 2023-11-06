<?php

include_once('../global.php');

class Perfil {

  protected $permissoes = array();

  public function __construct(Array Permissoes $permissoes){
    $this->permissoes = $permissoes;
  }

  public function getPermissoes(){
    return = $this->permissoes;
  }
}