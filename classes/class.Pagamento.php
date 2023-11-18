    <?php 

include_once('global.php');

class Pagamento extends persist {

    protected $valorPago, $dataPagamento, $mesAno, $metodoPagamento;
    static $local_filename = "Pagamento.txt";

    public function __construct(float $valorPago, string $dataPagamento, MetodoPagamento $metodoPagamento) 
    {
        $this->valorPago=$valorPago;
        $this->dataPagamento=$dataPagamento;
        $this->metodoPagamento=$metodoPagamento;
        $this->mesAno = defineMesAno($dataPagamento);
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
  
    public function getMesAno ()
    {
      return $this->mesAno;
    }  
  
    public function setMesAno (string $mesAno)
    {
      $this->mesAno = $mesAno;
    }  

    public function defineMesAno (string $data)
  
    {
      $partes = explode("-", $data);
      $mes = $partes[1];
      $ano = $partes[2];
      $dataReduzida = $mes . "-" . $ano;
      return $this->$dataReduzida;
    }  

    static public function getFilename() {
      return get_called_class()::$local_filename;
    }
}

