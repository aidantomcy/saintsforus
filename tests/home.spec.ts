import { test, expect, Page } from "@playwright/test";

test("homepage has correct title", async ({ page }: { page: Page }) => {
  const port = 5000;
  const baseURL = `http://localhost:${port}`;
  await page.goto(baseURL);
  await expect(page).toHaveTitle("Saints for Us - Home");

  const h1 = page.locator(".title");
  await expect(h1).toHaveText("Saints for Us");
});
