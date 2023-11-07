<?php 

include_once('../global.php');
// leticia: classe permissoes estava com informações de outras classes
class Permissoes extends persist {

    static $local_filename = "permissoes.txt";
  
    public function __construct() {
    }

    public function verificaPermissao(Usuario $Usuario, string $Permissao) {
        $Teste = $Usuario->getPerfil();
        $vetor = $Teste->getPermissoes();
    
        foreach ($vetor as $permissaoUsuario) {
            if ($permissaoUsuario === $Permissao) {
                return true; // Encontrou a permissão desejada, retornando verdadeiro
            }
        }
    
        return false; // A permissão não foi encontrada, retornando falso
    }

    static public function getFilename() {
        return get_called_class()::$local_filename;
    }
    

}