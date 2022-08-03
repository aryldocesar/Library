<?php
namespace Library\Service;

use Library\Model\Book;
use Library\Model\Loan;
use Library\Model\User;

Class Librian {

    public function lendBook(Loan $loan,User $user, Book $book){

        if(!$this->consultABook($loan, $book->getCOde())){
            $loan->toLoanBooks($book->getCode(), $user->getCode());
            return "successfully lent";
        }

        return "failed lend";
    }

    public function returnALentBook($book_code, Loan $loan){
        $loan_books = $loan->getLoanBooks();
        if(in_array($book_code, array_keys($loan_books ))){
            unset($book_code, $loan_books);
            return "returned book";
        }
        return "failed return a book";
    }

    public function consultABook(Loan $loan, $book_code){
        $loan_books = $loan->getLoanBooks();
        if(in_array($book_code, array_keys($loan_books))){
            return true;
        }

        return false;
    }

    public function consultReturnDateBook(Loan $loan, Book $book){
        if($this->consultABook($loan, $book->getCOde())){
            return true;
        }

        return false;
    }
}