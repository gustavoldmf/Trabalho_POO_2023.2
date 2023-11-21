    <?php 
include_once('global.php');
class Consulta extends persist{

  protected $paciente, $dentistaEx, $dataC, $horarioC, $duracaoC, $procedimentoC;
  static $local_filename = "consulta.txt";

  public function __construct(Paciente $paciente, Dentista $dentistaEx, string $dataC, string $horarioC, string $duracaoC, Procedimentos $procedimentoC)
  {
      $this->paciente = $paciente;
      $this->dentistaEx = $dentistaEx;
      $this->dataC = $dataC;
      $this->horarioC = $horarioC;
      $this->duracaoC = $duracaoC;
      $this->procedimentoC = $procedimentoC;
  }

  public function getPaciente()
  {
    return $this->paciente;
  }

  public function setPaciente(Paciente $paciente)
  {
    $this->paciente = $paciente;
  }

  public function getDentista()
  {
    return $this->dentistaEx;
  }

  public function setDentista(Dentista $dentistaEx)
  {
    $this->dentistaEx = $dentistaEx;
  }

  public function getDataC()
  {
    return $this->dataC;
  }

  public function setDataC(string $dataC)
  {
    $this->dataC = $dataC;
  }

  public function getHorarioC()
  {
    return $this->horarioC;
  }

  public function setHorarioC(string $horarioC)
  {
    $this->horarioC = $horarioC;
  }

  public function getDuracaoC()
  {
    return $this->duracaoC;
  }

  public function setDuracaoC(string $duracaoC)
  {
    $this->duracaoC = $duracaoC;
  }

  public function getProcedimentoC()
  {
    return $this->procedimentoC;
  }

  public function setProcedimentoC(Procedimento $procedimentoC)
  {
    $this->procedimentoC = $procedimentoC;
  }

  static public function getFilename() {
      return get_called_class()::$local_filename;
  }

}
