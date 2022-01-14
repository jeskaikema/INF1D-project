const mainMenu = document.querySelector(".Sidebar-mobile");
const openMenu = document.querySelector(".openMenu");
const overlay = document.querySelector(".overlay");

openMenu.addEventListener("click", show);
overlay.addEventListener("click", close);

function show() {
  mainMenu.style.display = "block";
  mainMenu.style.left = "0";
  overlay.style.display = "block";
  overlay.style.animation = "fadeInAnimation 1s ease";
}

function close() {
  mainMenu.style.left = "-100%";
  overlay.style.animation = "fadeOutAnimation 1s ease";
  setTimeout(function () {
    overlay.style.display = "none";
  }, 990);
}
