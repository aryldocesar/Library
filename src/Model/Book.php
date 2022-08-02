<?php
namespace Library\Model;

Class Book {

    public function __construct($title, $code)
    {
        $this->title = $title;
        $this->code = $code;
    }

    public function getCode(){
        return $this->code;
    }

    public function setCode($code){
        $this->code = $code;
    }

    public function getTitle(){
        return $this->title;
    }

    public  function setTitle($title){
        $this->title = $title;
    }
}