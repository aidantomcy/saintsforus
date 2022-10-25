if (localStorage.theme === "dark" ||
    !("theme" in localStorage &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)) {
    localStorage.theme = "dark";
}
else {
    localStorage.theme = "light";
}
document.body.classList.add(localStorage.theme);
//# sourceMappingURL=script.js.map