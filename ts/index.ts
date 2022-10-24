const themeSwitcherBtn =
  document.querySelector<HTMLButtonElement>("#theme-switcher");
const moon: string = `
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
</svg>`;
const sun: string = `
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
</svg>`;
const hamburgerBtn = document.querySelector<HTMLButtonElement>(".hamburger");
const hamburgerMenu = document.querySelector<HTMLDivElement>(".hamburger-menu");

if (
  localStorage.theme === "dark" ||
  !(
    "theme" in localStorage &&
    window.matchMedia("(prefers-color-scheme: dark)").matches
  )
) {
  localStorage.theme = "dark";
} else {
  localStorage.theme = "light";
}

document.body.classList.add(localStorage.theme);

if (localStorage.theme === "dark") {
  themeSwitcherBtn.innerHTML = sun;
} else if (localStorage.theme === "light") {
  themeSwitcherBtn.innerHTML = moon;
}
themeSwitcherBtn.addEventListener("click", () => {
  if (document.body.classList.contains("dark")) {
    document.body.classList.replace("dark", "light");
    localStorage.setItem("theme", "light");
    themeSwitcherBtn.innerHTML = moon;
  } else if (document.body.classList.contains("light")) {
    document.body.classList.replace("light", "dark");
    localStorage.setItem("theme", "dark");
    themeSwitcherBtn.innerHTML = sun;
  }
});

hamburgerBtn.addEventListener("click", () => {
  if (hamburgerMenu.classList.contains("show")) {
    hamburgerMenu.classList.remove("show");
    hamburgerMenu.style.display = "none";
  } else {
    hamburgerMenu.style.cssText = `
      display: flex;
      margin-top: 1rem;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      width: 95vw;
      font-size: 1.5em;
      background: var(--hamburger-menu-background);
      border-radius: 1rem;
      overflow: hidden;
      padding: 1rem;
    `;
    hamburgerMenu.classList.add("show");
  }
});

if ("serviceWorker" in navigator) {
  navigator.serviceWorker.register("./service-worker.js");
}
