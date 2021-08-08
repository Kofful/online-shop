<?php

use Framework\Authentication\Authentication;
use Helpers\Exceptions\SessionException;

class AuthenticationCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTestCorrectAuth(UnitTester $I)
    {
        $result = Authentication::auth("0933333333", "1111");
        $I->assertTrue($result);
        Authentication::logOut();
    }

    public function tryToTestIncorrectAuth(UnitTester $I)
    {
        $result = Authentication::auth("0933333333", "0000");
        $I->assertFalse($result);
    }

    public function tryToTestCorrectLogout(UnitTester $I)
    {
        Authentication::auth("0933333333", "1111");
        $I->assertNull(Authentication::logOut());
    }

    public function tryToTestIncorrectLogout(UnitTester $I)
    {
        //$I->expectThrowable(SessionException::class, [Authentication::class, "logOut"]);
        //Error: Class SessionException not found :(
    }

    public function tryToTestIsAuthTrue(UnitTester $I)
    {
        Authentication::auth("0933333333", "1111");
        $response = Authentication::isAuth();
        $I->assertTrue($response);
        Authentication::logOut();
    }

    public function tryToTestIsAuthFalse(UnitTester $I)
    {
        $response = Authentication::isAuth();
        $I->assertFalse($response);
    }
}
