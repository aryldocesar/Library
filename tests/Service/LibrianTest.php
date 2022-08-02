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
        $aryldo = new User("Aryldo", "0001");
        $cesar = new User("Cesar", "0002");
        $book_one = new Book("Biblia", "B01");
        $book_two = new Book("Clean Code", "B02");

        //Act
        $first_loan = $librian->lendBook($loan, $aryldo, $book_one);
        $second_loan = $librian->lendBook($loan, $cesar, $book_two);
        
        //Assert - Then
        self::assertEquals("successfully lent", $second_loan);

    }
}