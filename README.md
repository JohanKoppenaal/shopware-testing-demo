# Shopware 6 Testing Infrastructure Demo

Een complete testing infrastructuur voor Shopware 6.7 met Codeception en Playwright.

## Overzicht

Dit project demonstreert een professionele test setup voor Shopware 6:

- **Unit Tests** - Pure PHP unit tests (Codeception)
- **Functional Tests** - API en HTTP tests (Codeception)
- **Acceptance Tests** - Storefront browser tests (Codeception)
- **E2E Tests** - End-to-end browser tests (Playwright)

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
npm install
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

### 5. Playwright browsers installeren

```bash
npx playwright install chromium
```

## Tests Draaien

### Codeception (PHP)

```bash
# Via Composer (aanbevolen)
composer test              # Alle tests
composer test:unit         # Alleen Unit tests
composer test:functional   # Alleen Functional tests
composer test:acceptance   # Alleen Acceptance tests
composer test:coverage     # Unit tests met coverage rapport

# Via Codeception direct
./vendor/bin/codecept run
./vendor/bin/codecept run Unit
./vendor/bin/codecept run --steps   # Met details
```

### Playwright (TypeScript)

```bash
# Via npm
npm run test:e2e           # Alle E2E tests
npm run test:e2e:headed    # Met browser zichtbaar
npm run test:e2e:ui        # Playwright UI mode
npm run test:e2e:report    # Open HTML rapport
```

## Project Structuur

```
shopware-testing-demo/
├── tests/
│   ├── Acceptance/
│   │   └── StorefrontCest.php    # Codeception browser tests
│   ├── Functional/
│   │   └── ApiCest.php           # API tests
│   ├── Unit/
│   │   └── ExampleTest.php       # Unit tests
│   ├── playwright/
│   │   ├── storefront.spec.ts    # Playwright storefront tests
│   │   └── navigation.spec.ts    # Playwright navigation tests
│   ├── Support/
│   │   ├── AcceptanceTester.php
│   │   ├── FunctionalTester.php
│   │   ├── UnitTester.php
│   │   └── _generated/
│   ├── Acceptance.suite.yml
│   ├── Functional.suite.yml
│   └── Unit.suite.yml
├── .github/
│   └── workflows/
│       └── tests.yml             # GitHub Actions CI
├── codeception.yml               # Codeception configuratie
├── playwright.config.ts          # Playwright configuratie
├── package.json                  # Node.js dependencies
└── README.md
```

## Test Suites

### Unit Tests (Codeception)

Pure PHP tests zonder externe dependencies.

```php
public function testArrayOperations(): void
{
    $array = ['shopware', 'testing', 'demo'];
    $this->assertContains('testing', $array);
}
```

### Functional Tests (Codeception)

HTTP requests naar de applicatie.

```php
public function tryApiHealthCheck(FunctionalTester $I): void
{
    $I->wantTo('verify the application responds');
    $I->amOnPage('/');
    $I->seeResponseCodeIsSuccessful();
}
```

### Acceptance Tests (Codeception)

Browser-gebaseerde tests voor de storefront (PhpBrowser).

```php
public function tryToAccessHomepage(AcceptanceTester $I): void
{
    $I->wantTo('verify storefront homepage loads');
    $I->amOnPage('/');
    $I->seeElement('body');
}
```

### E2E Tests (Playwright)

Echte browser tests met Chromium.

```typescript
test('homepage loads successfully', async ({ page }) => {
    await page.goto('/');
    const title = await page.title();
    expect(title.length).toBeGreaterThan(0);
    await expect(page.locator('body')).toBeVisible();
});
```

## Admin Toegang

- **URL:** http://localhost:8000/admin
- **Gebruiker:** `admin`
- **Wachtwoord:** `shopware`

## CI/CD

GitHub Actions workflow voor automatische tests met 3 jobs:

| Job | Beschrijving |
|-----|-------------|
| **unit-tests** | PHP Unit tests |
| **functional-tests** | PHP Functional tests met MySQL |
| **playwright-tests** | Playwright E2E tests met MySQL |

Features:
- PHP 8.4 en Node.js 20
- MySQL 8.0 service container
- Playwright rapport als artifact (30 dagen)

Workflow: [.github/workflows/tests.yml](.github/workflows/tests.yml)

## Git Tags

| Tag | Beschrijving |
|-----|-------------|
| `fase-1` | Shopware 6.7 installatie |
| `fase-2` | Codeception setup |
| `fase-3` | Voorbeeld tests |
| `fase-4` | CI/CD configuratie |
| `fase-5` | Playwright E2E testing |
| `fase-6` | Playwright in GitHub Actions |

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

## Playwright Commando's

```bash
# Nieuwe test genereren
npx playwright codegen localhost:8000

# Specifieke test file draaien
npx playwright test storefront.spec.ts

# Debug mode
npx playwright test --debug

# Trace viewer
npx playwright show-trace trace.zip
```

## Test Totalen

| Framework | Aantal Tests |
|-----------|-------------|
| Codeception Unit | 3 |
| Codeception Functional | 1 |
| Codeception Acceptance | 2 |
| Playwright E2E | 7 |
| **Totaal** | **13** |

## Licentie

MIT
