const imgs = document.querySelectorAll("img");
imgs.forEach((img) => (img.ondragstart = () => false));

if ("serviceWorker" in navigator) {
  navigator.serviceWorker.register("../js/service-worker.js");
}

document.addEventListener("contextmenu", (e) => {
  e.preventDefault();
});
