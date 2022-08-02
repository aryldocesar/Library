<?php
namespace Library\Model;

Class Loan {

    public function __construct()
    {
       $this->loan_books = [];
    }

    public function toLoanBooks($book_code, $user_code)
    {
        $this->book_code = $book_code;
        $this->user_code = $user_code;
        $this->loan_date = date("Y-m-d");
        $this->loan_date = date("Y-m-d", strtotime(date('Y-m-d'). ' + 3 days'));
        $this->loan_books[$book_code] =  $this->loan_date;
    }

    public function getLoanBooks(){
        return $this->loan_books;
    }

    
}