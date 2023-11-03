<?php

    class Responsabilidades {

        private $dentistaEx;
        private $procedimento;

        public function __construct(Dentista $dentistaEx, Procedimento $procedimento) {
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
}
