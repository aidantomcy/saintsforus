const imgs = document.querySelectorAll("img");
imgs.forEach((img) => (img.ondragstart = () => false));

document.addEventListener("contextmenu", (e) => {
  e.preventDefault();
});
