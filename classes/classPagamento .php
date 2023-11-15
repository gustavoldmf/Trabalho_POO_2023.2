    <?php 

include_once('global.php');

class Pagamento extends persist {

    protected $valorPago, $dataPagamento, $metodoPagamento;
    static $local_filename = "Pagamento.txt";

    public function __construct(float $valorPago, string $dataPagamento, MetodoPagamento $metodoPagamento) 
    {
        $this->valorPago=$valorPago;
        $this->dataPagamento=$dataPagamento;
        $this->metodoPagamento=$metodoPagamento;
    }

    public function getValorPago ()
    {
      return $this->valorPago;
    }

    public function setValorPago (float $valorPago)
    {
      $this->valorPago = $valorPago;
    }  
    public function getDataPagamento ()
    {
      return $this->dataPagamento;
    }
  
    public function setDataPagamento (string $dataPagamento)
    {
      $this->dataPagamento = $dataPagamento;
    }  

    public function getMetodoPagamento ()
    {
      return $this->metodoPagamento;
    }
  
    public function setMetodoPagamento (MetodoPagamento $metodoPagamento)
    {
      $this->metodoPagamento = $metodoPagamento;
    }  

    static public function getFilename() {
      return get_called_class()::$local_filename;
    }
}
