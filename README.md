# Shopware 6 Testing Infrastructure Demo

Een complete testing infrastructuur voor Shopware 6.7 met Codeception.

## Overzicht

Dit project demonstreert een professionele test setup voor Shopware 6:

- **Unit Tests** - Pure PHP unit tests
- **Functional Tests** - API en HTTP tests
- **Acceptance Tests** - Storefront browser tests

## Vereisten

| Component | Versie |
|-----------|--------|
| PHP | 8.2+ |
| MySQL | 8.0+ |
| Node.js | 20+ |
| Composer | 2.x |

## Installatie

### 1. Clone repository

```bash
git clone https://github.com/JohanKoppenaal/shopware-testing-demo.git
cd shopware-testing-demo
composer install
```

### 2. Database configuratie

Maak `.env.local` aan:

```env
APP_ENV=dev
APP_URL=http://localhost:8000
DATABASE_URL=mysql://root:root@localhost:3306/shopware_testing_demo
```

### 3. Shopware installeren

```bash
bin/console system:install --basic-setup --create-database
```

### 4. Server starten

```bash
php -S localhost:8000 -t public
```

## Tests Draaien

### Alle tests

```bash
./vendor/bin/codecept run
```

### Per suite

```bash
./vendor/bin/codecept run Unit
./vendor/bin/codecept run Functional
./vendor/bin/codecept run Acceptance
```

### Met details

```bash
./vendor/bin/codecept run --steps
```

## Project Structuur

```
shopware-testing-demo/
├── tests/
│   ├── Acceptance/
│   │   └── StorefrontCest.php    # Browser tests
│   ├── Functional/
│   │   └── ApiCest.php           # API tests
│   ├── Unit/
│   │   └── ExampleTest.php       # Unit tests
│   ├── Support/
│   │   ├── AcceptanceTester.php
│   │   ├── FunctionalTester.php
│   │   ├── UnitTester.php
│   │   └── _generated/
│   ├── Acceptance.suite.yml
│   ├── Functional.suite.yml
│   └── Unit.suite.yml
├── codeception.yml               # Hoofd configuratie
└── README.md
```

## Test Suites

### Unit Tests

Pure PHP tests zonder externe dependencies.

```php
public function testArrayOperations(): void
{
    $array = ['shopware', 'testing', 'demo'];
    $this->assertContains('testing', $array);
}
```

### Functional Tests

HTTP requests naar de applicatie.

```php
public function tryApiHealthCheck(FunctionalTester $I): void
{
    $I->wantTo('verify the application responds');
    $I->amOnPage('/');
    $I->seeResponseCodeIsSuccessful();
}
```

### Acceptance Tests

Browser-gebaseerde tests voor de storefront.

```php
public function tryToAccessHomepage(AcceptanceTester $I): void
{
    $I->wantTo('verify storefront homepage loads');
    $I->amOnPage('/');
    $I->seeElement('body');
}
```

## Admin Toegang

- **URL:** http://localhost:8000/admin
- **Gebruiker:** `admin`
- **Wachtwoord:** `shopware`

## Git Tags

| Tag | Beschrijving |
|-----|-------------|
| `fase-1` | Shopware 6.7 installatie |
| `fase-2` | Codeception setup |
| `fase-3` | Voorbeeld tests |

## Codeception Commando's

```bash
# Tester classes genereren
./vendor/bin/codecept build

# Nieuwe test genereren
./vendor/bin/codecept generate:cest Acceptance MyTest
./vendor/bin/codecept generate:test Unit MyTest

# Tests met coverage
./vendor/bin/codecept run --coverage --coverage-html
```

## Licentie

MIT
