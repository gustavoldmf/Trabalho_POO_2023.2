<?php

include_once('global.php');

    class Responsabilidades extends persist{

        protected $dentistaEx;
        protected $procedimento;
        static $local_filename = "responsabilidades.txt";

        public function __construct(Dentista $dentistaEx, Procedimentos $procedimento) {
            $this->dentistaEx = $dentistaEx;
            $this->procedimento = $procedimento;
        }

        public function getDentistaEx() {
            return $this->dentistaEx;
        }

        public function setDentistaEx(Dentista $dentistaEx) {
            $this->dentistaEx = $dentistaEx;
        }

        public function getProcedimento() {
            return $this->procedimento;
        }

        public function setProcedimento(Procedimento $procedimento) {
            $this->procedimento = $procedimento;
        }

      static public function getFilename() {
          return get_called_class()::$local_filename;
      }
}
