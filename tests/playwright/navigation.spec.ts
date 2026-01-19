import { test, expect } from '@playwright/test';

test.describe('Navigation', () => {

    test('header contains navigation elements', async ({ page }) => {
        await page.goto('/');

        // Check that header exists
        const header = page.locator('header, .header-main').first();
        await expect(header).toBeVisible();
    });

    test('page has clickable links', async ({ page }) => {
        await page.goto('/');

        // Check that there are links on the page
        const links = page.locator('a[href]');
        const count = await links.count();
        expect(count).toBeGreaterThan(0);
    });

    test('main content area exists', async ({ page }) => {
        await page.goto('/');

        // Check for main content area
        const main = page.locator('main, .content-main, [role="main"]').first();
        await expect(main).toBeVisible();
    });
});
