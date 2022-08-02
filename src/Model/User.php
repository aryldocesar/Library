<?php
namespace Library\Model;

Class User {

    public function __construct($name, $code)
    {
        $this->name = $name;
        $this->code = $code;
    }

    public function getCode(){
        return $this->code;
    }

    public function setCode($code){
        $this->code = $code;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }
}