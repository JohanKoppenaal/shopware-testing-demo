import { test, expect } from '@playwright/test';

test.describe('Storefront', () => {

    test('homepage loads successfully', async ({ page }) => {
        await page.goto('/');

        // Page should have a title (any title)
        const title = await page.title();
        expect(title.length).toBeGreaterThan(0);
        await expect(page.locator('body')).toBeVisible();
    });

    test('navigation is visible', async ({ page }) => {
        await page.goto('/');

        const nav = page.locator('nav').first();
        await expect(nav).toBeVisible();
    });

    test('search functionality exists', async ({ page }) => {
        await page.goto('/');

        const searchInput = page.locator('input[type="search"], input[name="search"]').first();
        await expect(searchInput).toBeVisible();
    });

    test('footer is present', async ({ page }) => {
        await page.goto('/');

        const footer = page.locator('footer').first();
        await expect(footer).toBeVisible();
    });
});
