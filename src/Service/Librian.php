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

}