import { test, expect, Locator } from "@playwright/test";
import { baseURL } from "./constants/constants";
import { PlaywrightPage } from "./types/PlaywrightPage";

test("users can change the theme", async ({ page }: PlaywrightPage) => {
  await page.goto(baseURL);

  const updateThemeBtn = page.locator("#theme-switcher");
  const body = page.locator("body");

  await expect<Locator>(body).toHaveClass("dark");
  updateThemeBtn.click();
  await expect<Locator>(body).toHaveClass("light");
});
