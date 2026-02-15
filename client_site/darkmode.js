
// this is a script that toggles dark mode on and off


//DOM methods
const toggle = document.getElementById("darkModeToggle");

if (toggle) {
  toggle.addEventListener("click", () => {
    document.body.classList.toggle("dark-mode");
  });
}