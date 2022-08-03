<?php
namespace Library\Service;

use Library\Model\Book;
use Library\Model\Loan;
use Library\Model\User;

Class Librian {

    public function lendBook(Loan $loan,User $user, Book $book){

        if(!in_array($book->getCode(), array_keys($loan->getLoanBooks()))){
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
}