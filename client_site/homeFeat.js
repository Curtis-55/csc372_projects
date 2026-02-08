// Curtis Palmer 2/8/2026   used chatGPT to help with click feature on h1 title
 

const siteTitle = document.getElementById("site-title");
const contentBox = document.getElementById("content");
const navLinks = document.querySelectorAll(".nav-link");

function updateContent() {
    contentBox.innerHTML = `
        <h2>Why ThinkTree?</h2>
        <p>
            ThinkTree helps computer scientists <strong>visualize algorithms</strong>
            and workflows before coding, making complex logic easier to design.
        </p>
        <ul>
            <li>Plan programs before writing code</li>
            <li>Visualize decision trees clearly</li>
            <li>Improve efficiency and accuracy</li>
        </ul>
    `;
}

siteTitle.addEventListener("click", updateContent);

navLinks.forEach(link => {
    link.addEventListener("click", () => {
        navLinks.forEach(l => l.classList.remove("active"));
        link.classList.add("active");
    });
});



