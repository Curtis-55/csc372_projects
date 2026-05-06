const toggleBtn = document.getElementById("darkModeToggle");

toggleBtn.addEventListener("click", () => {
  document.body.classList.toggle("light-mode");

  // optional text change
  if (document.body.classList.contains("light-mode")) {
    toggleBtn.innerText = "Switch to Dark Mode";
  } else {
    toggleBtn.innerText = "Switch to Light Mode";
  }
});