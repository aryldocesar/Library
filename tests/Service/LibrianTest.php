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
        //act
        $loan_book = $librian->lendBook($loan,$user1,$book);

        //Assert - Then
        self::assertEquals("successfully lent", $loan_book);

    }

    public function testReturnALentBook(){
        //prepare
        $loan = new Loan();
        $librian = new Librian();

        $user1 = new User('Aryldo', '0001');

        $book = new Book('Clean Code', "B01");

        $librian->lendBook($loan,$user1,$book);
        //act
        $consult_book = $librian->returnALentBook($book->getCode(), $loan);

        //Assert - Then
        self::assertEquals("returned book", $consult_book);

    }

    public function testConsultBookAvailable(){
        //prepare
        $loan = new Loan();
        $librian = new Librian();

        $user1 = new User('Aryldo', '0001');

        $book = new Book('Clean Code', "B01");

        //act
        $consult_book = $librian->consultABook($loan, $book);
        
        //Assert - Then
        self::assertEquals(false, $consult_book);

    }

    public function testConsultALoanBook(){
        //prepare
        $loan = new Loan();
        $librian = new Librian();

        $user1 = new User('Aryldo', '0001');

        $book = new Book('Clean Code', "B01");

        //act

        $librian->lendBook($loan,$user1,$book);
        $return_book = $librian->consultABook($loan, $book->getCode());
        
        //Assert - Then
        self::assertEquals(true, $return_book);

    }

    public function testconsultReturnDateBook(){
        //prepare
        $loan = new Loan();
        $librian = new Librian();

        $user1 = new User('Aryldo', '0001');

        $book = new Book('Clean Code', "B01");

        //act

        $librian->lendBook($loan,$user1,$book);
        $return_book = $librian->consultReturnDateBook($loan, $book);

        //Assert - Then
        self::assertEquals($loan->getReturnDate(), $return_book);

    }


}