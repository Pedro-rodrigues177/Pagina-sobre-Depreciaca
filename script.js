let btnMenu = document.getElementById("btn-menu");
let menu = document.getElementById("menu-mobile");

btnMenu.addEventListener("click", () => {
  menu.classList.add("menu-aberto");
});

menu.addEventListener("click", () => {
  menu.classList.remove("menu-aberto");
});
