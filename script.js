function toggleMenu() {
  const menu = document.querySelector(".menu-links");
  const icon = document.querySelector(".hamburger-icon");
  menu.classList.toggle("open");
  icon.classList.toggle("open");
}

// Get the button
const arrowUp = document.getElementById("arrowUp");

// Add a scroll event listener
window.addEventListener("scroll", function () {
    // Get the combined height of the nav and hero sections
    const profileHeight = document.querySelector("#profile").offsetHeight;
    const navHeight = document.querySelector("#desktop-nav").offsetHeight;

    // Check if the scroll position is greater than the combined height
    if (window.scrollY > (profileHeight + navHeight)) {
        arrowUp.style.display = "block"; // Show the button
    } else {
        arrowUp.style.display = "none"; // Hide the button
    }
});

// Scroll to the top of the page
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
}
