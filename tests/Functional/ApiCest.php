<?php

declare(strict_types=1);

namespace Tests\Functional;

use Tests\Support\FunctionalTester;

class ApiCest
{
    public function _before(FunctionalTester $I): void
    {
        // Setup before each test
    }

    public function tryApiHealthCheck(FunctionalTester $I): void
    {
        $I->wantTo('verify the application responds');

        $I->amOnPage('/');
        $I->seeResponseCodeIsSuccessful();
    }
}
