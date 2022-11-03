import { test, expect, Page, Locator } from "@playwright/test";
import { baseURL } from "./constants/constants";
import { PlaywrightPage } from "./types/PlaywrightPage";

test("homepage has correct title", async ({ page }: PlaywrightPage) => {
  await page.goto(baseURL);
  await expect<Page>(page).toHaveTitle("Saints for Us - Home");

  const h1 = page.locator(".title");
  await expect<Locator>(h1).toHaveText("Saints for Us");
});
