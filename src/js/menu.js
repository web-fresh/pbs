export function toggleMenu() {
  const menu = document.getElementById("menuMain");
  menu.style.display = (menu.style.display === "flex") ? "none" : "flex";
}

export function deactivateToggle() {
  if (window.innerWidth > 450) {
    const menu = document.getElementById("menuMain");
    const menuHidden = menu.style.display === "none";
    if (menuHidden) toggleMenu();
  }
}
