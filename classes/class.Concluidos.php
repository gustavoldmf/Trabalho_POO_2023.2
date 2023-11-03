<?php 

class Concluidos {
    
    private $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function getdata() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
}
}