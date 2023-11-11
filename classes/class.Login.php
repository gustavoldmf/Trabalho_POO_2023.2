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

   static function getInstance(Usuario $Usuario) {
       if ( self::$ptrInstance == null )
          self::$ptrInstance = new Login($Usuario);

       return self::$ptrInstance;
   }

   public function addLogin(string $p_loginText ) {
       array_push($this->login, $p_loginText);
   }

     public function getUsuario(){
       return this->usuario;        
    }

     static public function getFilename() {
         return get_called_class()::$local_filename;
     }
}
