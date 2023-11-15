    <?php 

include_once('global.php');

class MetodoPagamento extends persist {

    protected $metodo, $taxa;
    static $local_filename = "metodoPagamento.txt";

    public function __construct(string $metodo, float $taxa) 
    {
        $this->metodo=$metodo;
        $this->taxa=$taxa;
    }

    public function getMetodo ()
    {
      return $this->metodo;
    }

    public function setMetodo (string $metodo)
    {
      $this->metodo = $metodo;
    }  
    public function getTaxa ()
    {
      return $this->taxa;
    }
  
    public function setTaxa (float $taxa)
    {
      $this->taxa = $taxa;
    }  

    static public function getFilename() {
      return get_called_class()::$local_filename;
    }
}
