document.addEventListener("click", (event) => {
    if (event.target.closest(".options-dots")) {
        const post = event.target.closest(".options-wrap");
        const options = post.querySelector(".options");
        options.classList.toggle("active");
    }
    if (event.target.closest(".comment-bar-comments")) {
        const post = event.target.closest("li");
        const comments = post.querySelector(".comments");
        comments.classList.toggle("active");
    }
    if (event.target.closest(".comment-bar-new")) {
        const post = event.target.closest("li");
        const newcomment = post.querySelector(".create-comment");
        newcomment.classList.toggle("active");
    }
});

const themeSwitch = document.getElementById("theme-button");
const currentTheme = localStorage.getItem("theme");

if (currentTheme === "dark") {
    document.body.classList.add("dark-mode");
} else if (currentTheme === "light") {
    document.body.classList.add("light-mode");
} else {
    const prefersDark = window
    .matchMedia("(prefers-color-scheme: dark)")
    .matches;
    document.body
    .classList
    .add(prefersDark ? "dark-mode" : "light-mode");
}

themeSwitch.addEventListener('click', () => {
    const currentTheme = localStorage.getItem("theme");
    if (currentTheme === "dark") {
        document.body.classList.remove("dark-mode");
        document.body.classList.add("light-mode");
        localStorage.setItem("theme", "light");
    } else {
        document.body.classList.remove("light-mode");
        document.body.classList.add("dark-mode");
        localStorage.setItem("theme", "dark");
    }
})