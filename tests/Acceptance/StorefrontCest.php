<?php

declare(strict_types=1);

namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class StorefrontCest
{
    public function _before(AcceptanceTester $I): void
    {
        // Runs before each test
    }

    public function tryToAccessHomepage(AcceptanceTester $I): void
    {
        $I->wantTo('verify storefront homepage loads');

        $I->amOnPage('/');
        $I->seeElement('body');
    }

    public function tryToSeePageTitle(AcceptanceTester $I): void
    {
        $I->wantTo('verify page has a title');

        $I->amOnPage('/');
        $I->seeElement('title');
    }
}
