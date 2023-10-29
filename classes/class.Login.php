    <?php 

include_once('../global.php');

 class Login extends persist{ 
   
    private string $folder = 'dataFiles';
    private string $filename;
    static private $ptrInstance = null;
    static $local_filename = "Login.txt";
    private array $login = array();
    private $usuario;

    private function __construct($Usuario) 
    {
        $this->usuario = $Usuario;
    }

   static function getInstance(Usuario $Usuario) {
       if ( self::$ptrInstance == null )
          self::$ptrInstance = new Login($Usuario);
         // print("O orçamento foi aprovado e será iniciado um tratamento? Digite 0           para não e 1 para sim."."\n");

       return self::$ptrInstance;
   }

   public function addLogin(string $p_loginText ) {
       array_push($this->login, $p_loginText);
   }
}
