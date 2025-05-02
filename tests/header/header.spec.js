// @ts-check
const { test, expect } = require('@playwright/test');

import { adminLoginAction } from '../utils/login';

var localUrl = 'http://tests.local';

// Front-End - Desktop tests
test.describe('Front-End — Desktop tests', () => {
	// Set the viewport
	test.use({ viewport: { width: 1920, height: 1080 } });

	test.beforeEach(async ({ page }) => {
		await page.goto(localUrl);
	});

	test('Header components are visible on desktop', async ({ page }) => {
		// Test logo visibility
		await expect(page.locator('.shfb-desktop .site-branding').first()).toBeVisible();
		
		// Test primary menu
		await expect(page.locator('.main-navigation').first()).toBeVisible();
		
		// Test search component if present
		const searchComponent = page.locator('.header-search').first();
		if (await searchComponent.count() > 0) {
			await expect(searchComponent).toBeVisible();
		}
		
		// Test social icons if present
		const socialIcons = page.locator('.header-social').first();
		if (await socialIcons.count() > 0) {
			await expect(socialIcons).toBeVisible();
		}
	});

	test('Header search functionality works', async ({ page }) => {
		const searchToggle = page.locator('.search-toggle');
		const searchForm = page.locator('.search-form');
		
		if (await searchToggle.count() > 0) {
			await searchToggle.click();
			await expect(searchForm).toBeVisible();
			
			// Test search input
			await searchForm.locator('input[type="search"]').fill('test');
			await searchForm.locator('button[type="submit"]').click();
			
			// Verify search results page
			await expect(page).toHaveURL(/.*s=test/);
		}
	});

	test('Primary menu navigation works', async ({ page }) => {
		const menuItems = page.locator('.main-navigation li.menu-item a');
		const firstMenuItem = menuItems.first();
		
		if (await firstMenuItem.count() > 0) {
			const href = await firstMenuItem.getAttribute('href');
			await firstMenuItem.click();
			await expect(page).toHaveURL(href || '');
		}
	});

	//test dropdown menu when hover
	test('1st level dropdown menu works', async ({ page }) => {
		const dropdownMenu = page.locator('.menu-item-has-children').first();
		if (await dropdownMenu.count() > 0) {
			await dropdownMenu.hover();
			//find ul inside dropdownMenu
			const dropdownMenuItems = dropdownMenu.locator('ul').first();
			if (await dropdownMenuItems.count() > 0) {
				await expect(dropdownMenuItems).toBeVisible();
			}
		}
	});

	//test 2nd level dropdown menu when hover
	test('2nd level dropdown menu works', async ({ page }) => {
		const dropdownMenu = page.locator('.menu-item-has-children').first();
		if (await dropdownMenu.count() > 0) {
			await dropdownMenu.hover();
			//find ul inside dropdownMenu
			const dropdownMenuItems = dropdownMenu.locator('ul').first();
			//find li inside dropdownMenuItems
			const dropdownMenuItems2 = dropdownMenuItems.locator('li').first();
			if (await dropdownMenuItems2.count() > 0) {
				await expect(dropdownMenuItems2).toBeVisible();
			}
		}
	});

	//test top row background color
	test('Top row background color works', async ({ page }) => {
		const topRow = page.locator('.shfb-above_header_row').first();
		if (await topRow.count() > 0) {
			//to have background color #000000
			await expect(topRow).toHaveCSS('background-color', 'rgb(63, 205, 138)');
		}
	});

	//main row background color
	test('Main row background color works', async ({ page }) => {
		const mainRow = page.locator('.shfb-main_header_row').first();
		if (await mainRow.count() > 0) {
			await expect(mainRow).toHaveCSS('background-color', 'rgb(56, 37, 220)');
		}
	});

	//bottom row background color
	test('Bottom row background color works', async ({ page }) => {
		const bottomRow = page.locator('.shfb-below_header_row').first();
		if (await bottomRow.count() > 0) {
			await expect(bottomRow).toHaveCSS('background-color', 'rgb(239, 37, 187)');
		}
	});

	//menu text color
	test('Menu text color works', async ({ page }) => {
		const menuText = page.locator('.main-navigation li.menu-item a').first();
		if (await menuText.count() > 0) {
			await expect(menuText).toHaveCSS('color', 'rgb(255, 255, 255)');
		}
	});

	//menu text hover color
	test('Menu text hover color works', async ({ page }) => {
		const menuText = page.locator('.main-navigation li.menu-item a').first();
		if (await menuText.count() > 0) {
			await menuText.hover();
			await expect(menuText).toHaveCSS('color', 'rgb(131, 43, 129)');
		}
	});
	
});

// Front-End - Mobile tests
test.describe('Front-End — Mobile tests', () => {
	// Set the viewport to mobile
	test.use({ viewport: { width: 600, height: 900 } });

	test.beforeEach(async ({ page }) => {
		await page.goto(localUrl);
	});

	test('Mobile menu toggle works', async ({ page }) => {
		const menuToggle = page.locator('.menu-toggle');
		const mobileMenu = page.locator('.sydney-offcanvas-menu');

		if (await menuToggle.count() > 0) {
			await menuToggle.click();
			await expect(mobileMenu).toBeVisible();
			//also expect toggled class
			await expect(mobileMenu).toHaveClass('shfb shfb-mobile_offcanvas sydney-offcanvas-menu toggled');
		}
	});

	test('Off-canvas menu functionality', async ({ page }) => {
		const offcanvasToggle = page.locator('.offcanvas-toggle');
		const offcanvasMenu = page.locator('.offcanvas-menu');
		
		if (await offcanvasToggle.count() > 0) {
			await offcanvasToggle.click();
			await expect(offcanvasMenu).toBeVisible();
			
			// Test menu closing
			await offcanvasToggle.click();
			await expect(offcanvasMenu).not.toBeVisible();
		}
	});

	test('Mobile header components are visible', async ({ page }) => {
		// Test logo visibility
		await expect(page.locator('.shfb-mobile .site-branding').first()).toBeVisible();
		
		// Test mobile menu toggle
		await expect(page.locator('.menu-toggle').first()).toBeVisible();
		
		// Test search component if present
		const searchComponent = page.locator('.shfb-mobile .header-search').first();
		if (await searchComponent.count() > 0) {
			await expect(searchComponent).toBeVisible();
		}
	});
});