<?php 

include_once('global.php');

 class Login extends persist{ 
   
    private string $folder = 'dataFiles';
    private string $filename;
    static private $ptrInstance = null;
    static $local_filename = "Login.txt";
    private array $login = array();
    private $usuario;
    protected $logado;

    private function __construct(Usuario $Usuario) 
    {
        $this->usuario = $Usuario;
        $this->logado = 1;
        $this->save();
    }

   static function Instance(Usuario $Usuario) {
       if ( self::$ptrInstance == null )
          self::$ptrInstance = new Login($Usuario);
          
   
       
     
       return self::$ptrInstance;
   }

   static function getInstance(){
     return self::$ptrInstance;
   }

   static function Logar(string $email, string $senha){
     $usuario = Usuario::getRecordsByField("email", $email);
    
        if($usuario[0]->getSenha() == $senha){

          Login::Instance($usuario[0]);
          return true;
        }
     
     return false;
   }
   
    public function LogOut(){
      self::$ptrInstance = NULL;
      $this->logado = 0;
      $this->save();
      return self::$ptrInstance;
    }

     public function getUsuario(){
       return $this->usuario;        
    }

   public function getLogado(){
     return $this->logado;
   }
   
     static public function getFilename() {
         return get_called_class()::$local_filename;
     }
}
