export function toggleMenu() {
  const menu = document.getElementById("menuMain");
  const toggle = document.getElementById("menuToggle");

  menu.style.display = (menu.style.display === "flex") ? "none" : "flex";
  toggle.classList.toggle("rotate-icon");
}

export function deactivateToggle() {
  if (window.innerWidth > 450) {
    const menu = document.getElementById("menuMain");
    const menuHidden = menu.style.display === "none";
    const toggle = document.getElementById("menuToggle");


    if (menuHidden) toggleMenu();
    toggle.classList.toggle("rotate-icon");
  }
}
