<?php 

include_once('global.php');
// leticia: classe permissoes estava com informações de outras classes
class Permissoes extends persist {

    static $local_filename = "permissoes.txt";
  
    public function __construct() {
    }


/*


como acessar o verifica permissao? Basta atribuir um login (atual) a uma variavel via GRBF
$loginAtual = getRecordsByField ("logado", 1);
// agora o loginAtual já tem o unico objeto usuario logado
para chamar a funcao, faz-se:
verificaPermissao($loginAtual, __FUNCTION__);
//__FUNCTION__ vai checar o nome da funcao

*/
  
    static public function verificaPermissao(Login $login, string $Permissao) {
        
        $usuario = $login->getUsuario();
        $perfil  = $usuario->getPerfil();
        $permissoes = $perfil->getPermissoes();
       
       for ($i=0; $i<sizeof($permissoes); $i++) {

          if ($permissoes[$i] == $Permissao) {
            return true;
          }
         
       }
      return false;
    }

    static public function getFilename() {
        return get_called_class()::$local_filename;
    }
    

}