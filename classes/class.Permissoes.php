<?php 

include_once('global.php');
// leticia: classe permissoes estava com informações de outras classes
class Permissoes extends persist {

    static $local_filename = "permissoes.txt";
  
    public function __construct() {
    }

    public function verificaPermissao(Usuario $Usuario, string $Permissao) {
        $perfil = $Usuario->getPerfil();
        $permissoes = $perfil->getPermissoes();
    
       for (i<0; i<$permissoes.length; i++) {

          if ($permissoes[i] == $Permissao) {
            return true;
          }
         
       }
      return false;
    }

    static public function getFilename() {
        return get_called_class()::$local_filename;
    }
    

}