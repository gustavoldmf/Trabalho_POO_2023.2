<?php 

include_once('global.php');

 class Login extends persist{ 
   
    private string $folder = 'dataFiles';
    private string $filename;
    static private $ptrInstance = null;
    static $local_filename = "Login.txt";
    private array $login = array();
    private $usuario;

    private function __construct(Usuario $Usuario) 
    {
        $this->usuario = $Usuario;
    }

   static function Instance(Usuario $Usuario) {
       if ( self::$ptrInstance == null )
          self::$ptrInstance = new Login($Usuario);

       return self::$ptrInstance;
   }

   static function getInstance(){
     return self::ptrInstance;
   }

    public function LogOut(){
      self::$ptrInstance == null;
    }

     public function getUsuario(){
       return this->usuario;        
    }

     static public function getFilename() {
         return get_called_class()::$local_filename;
     }
}
