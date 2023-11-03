    <?php 

class Consulta {

  private $paciente, $dentistaExe, $dataC, $horarioC, $duracaoC, $procedimentoC;

  public function __construct($paciente, $dentistaExe, $dataC, $horarioC, $duracaoC, $procedimentoC)
  {
      $this->paciente = $paciente;
      $this->dentistaExe = $dentistaExe;
      $this->dataC = $dataC;
      $this->horarioC = $horarioC;
      $this->duracaoC = $duracaoC;
      $this->procedimentoC = $procedimentoC;
  }

  public function getPaciente()
  {
    return $this->paciente;
  }

  public function setPaciente($paciente)
  {
    $this->paciente = $paciente;
  }

  public function getDentistaExe()
  {
    return $this->dentistaExe;
  }

  public function setDentistaExe($dentistaExe)
  {
    $this->dentistaExe = $dentistaExe;
  }

  public function getDataC()
  {
    return $this->dataC;
  }

  public function setDataC($dataC)
  {
    $this->dataC = $dataC;
  }

  public function getHorarioC()
  {
    return $this->horarioC;
  }

  public function setHorarioC($horarioC)
  {
    $this->horarioC = $horarioC;
  }

  public function getDuracaoC()
  {
    return $this->duracaoC;
  }

  public function setDuracaoC($duracaoC)
  {
    $this->duracaoC = $duracaoC;
  }

  public function getProcedimentoC()
  {
    return $this->procedimentoC;
  }

  public function setProcedimentoC($procedimentoC)
  {
    $this->procedimentoC = $procedimentoC;
  }

}