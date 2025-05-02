// @ts-check
const { test, expect } = require('@playwright/test');

import { is_pro } from '../utils/pro';
import { adminLoginAction } from '../utils/login';

var localUrl = 'http://tests.local';


// Front-End - Desktop tests
test.describe('Front-End — Desktop tests', () => {
	// Set the viewport
	test.use({ viewport: { width: 1920, height: 1080 } });

	test.beforeEach(async ({ page }) => {
		await page.goto(localUrl);
	});

	test('Footer rows have correct background colors on desktop', async ({ page }) => {
		// first (above) row
		const firstRow = page.locator('.shfb-above_footer_row');
		await expect(firstRow).toHaveCSS('background-color', 'rgb(133, 255, 146)');
	  
		// middle (main) row
		const middleRow = page.locator('.shfb-main_footer_row');
		await expect(middleRow).toHaveCSS('background-color', 'rgb(95, 95, 255)');
	  
		// last (below) row
		const lastRow = page.locator('.shfb-below_footer_row');
		await expect(lastRow).toHaveCSS('background-color', 'rgb(213, 43, 212)');
	});

	test('All footer components are present on desktop', async ({ page }) => {
		const footer = page.locator('footer.shfb-footer');
	  
		const componentIds = [
		  'button',
		  'social',
		  'html',
		  'widget1',
		  'widget2',
		  'widget3',
		  'widget4',
		  'copyright'
		];
	  
		for (const id of componentIds) {
		  const comp = footer.locator(`[data-component-id="${id}"]`);
		  // ensure exactly one instance
		  await expect(comp).toHaveCount(1);
		  // ensure it’s visible
		  await expect(comp).toBeVisible();
		}
	});
			
	test('Footer column counts and layout classes on desktop', async ({ page }) => {
		const footer = page.locator('footer.shfb-footer.shfb-desktop');
	  
		// Above footer row: 3 columns, .shfb-cols-3
		const aboveRow = footer.locator('.shfb-above_footer_row');
		await expect(aboveRow.locator('.shfb-column')).toHaveCount(3);
		await expect(aboveRow.locator('.shfb-row')).toHaveClass(/shfb-cols-3/);
	  
		// Main footer row: 4 columns, .shfb-cols-4
		const mainRow = footer.locator('.shfb-main_footer_row');
		await expect(mainRow.locator('.shfb-column')).toHaveCount(4);
		await expect(mainRow.locator('.shfb-row')).toHaveClass(/shfb-cols-4/);
	  
		// Below footer row: 1 column, .shfb-cols-1
		const belowRow = footer.locator('.shfb-below_footer_row');
		await expect(belowRow.locator('.shfb-column')).toHaveCount(1);
		await expect(belowRow.locator('.shfb-row')).toHaveClass(/shfb-cols-1/);
	  });

	  //test copyright text value
	  test('Copyright text value is present on desktop', async ({ page }) => {
		var currentYear = new Date().getFullYear();
		const footer = page.locator('footer.shfb-footer.shfb-desktop');
		const copyright = footer.locator('[data-component-id="copyright"]');
		await expect(copyright).toHaveText(`© ${currentYear} tests. Proudly powered by Sydney`);
	  });

	  //tests for copyright text color, copyright link color and copyright link hover color
	  test('Copyright text color is correct on desktop', async ({ page }) => {
		const footer = page.locator('footer.shfb-footer.shfb-desktop');
		const copyright = footer.locator('[data-component-id="copyright"]');
		//find sydney-credits
		const sydneyCredits = copyright.locator('.sydney-credits');
		await expect(sydneyCredits).toHaveCSS('color', 'rgb(255, 72, 72)');
	  });

	  test('Copyright link color is correct on desktop', async ({ page }) => {
		const footer = page.locator('footer.shfb-footer.shfb-desktop');
		const copyright = footer.locator('[data-component-id="copyright"]');
		const link = copyright.locator('a');
		await expect(link).toHaveCSS('color', 'rgb(255, 255, 255)');
	  });

	  test('Copyright link hover color is correct on desktop', async ({ page }) => {
		const footer = page.locator('footer.shfb-footer.shfb-desktop');
		const copyright = footer.locator('[data-component-id="copyright"]');
		const link = copyright.locator('a');
		await link.hover();
		await expect(link).toHaveCSS('color', 'rgb(65, 231, 131)');
	  });
	  
	  
	  
});

// Front-End - Mobile tests
test.describe('Front-End — Mobile tests', () => {
	// Set the viewport to mobile
	test.use({ viewport: { width: 600, height: 900 } });

	test.beforeEach(async ({ page }) => {
		await page.goto(localUrl);
	});

	test('All footer components are present on mobile', async ({ page }) => {
		const footer = page.locator('footer.shfb-footer');
	  
		const componentIds = [
		  'button',
		  'social',
		  'html',
		  'widget1',
		  'widget2',
		  'widget3',
		  'widget4',
		  'copyright'
		];
	  
		for (const id of componentIds) {
		  const comp = footer.locator(`[data-component-id="${id}"]`);
		  // ensure exactly one instance
		  await expect(comp).toHaveCount(1);
		  // ensure it’s visible
		  await expect(comp).toBeVisible();
		}
	});

});