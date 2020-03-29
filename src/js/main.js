import { toggleMenu, deactivateToggle } from "./menu.js";

let a = performance.now();
document.addEventListener("DOMContentLoaded", (() => {
    // DOM Load Performance
    let b = performance.now();
    console.info(`DOM ready in ${b - a}ms!`);
    
    // Toggle Menu
    document.getElementById("menuToggle")
    .addEventListener("click", toggleMenu);
    window.addEventListener('resize', deactivateToggle);
}));
