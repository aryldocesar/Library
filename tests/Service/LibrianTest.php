<?php
namespace Library\Tests\Service;

use PHPUnit\Framework\TestCase;
use Library\Model\User;
use Library\Model\Book;
use Library\Model\Loan;
use Library\Service\Librian;

class LibrianTest extends TestCase
{
    public function testLendALentBook(){
        //Prepare
        $loan = new Loan();
        $librian = new Librian();
        $user1 = new User("Aryldo", "0001");
        $user2 = new User("Cesar", "0002");
        $book_one = new Book("Biblia", "B01");

        //Act
        $first_loan = $librian->lendBook($loan, $user1, $book_one);
        $second_loan = $librian->lendBook($loan, $user2, $book_one);
        
        //Assert - Then
        self::assertEquals("failed lend", $second_loan);

    }

    public function testLendABook(){
        //prepare
        $loan = new Loan();
        $librian = new Librian();

        $user1 = new User('Aryldo', '0001');

        $book = new Book('Clean Code', "B01");

        $loan_book = $librian->lendBook($loan,$user1,$book);

        self::assertEquals("successfully lent", $loan_book);

    }
}