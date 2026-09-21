const toggle = document.querySelector(".menu-toggle");
const nav = document.querySelector(".header__nav");

toggle.addEventListener("click", () => {

    nav.classList.toggle("is-open");

    toggle.classList.toggle("is-active");

});

const expanded =
    toggle.classList.contains("is-active");

toggle.setAttribute(
    "aria-expanded",
    expanded
);

const links =
    document.querySelectorAll(".header__nav a");

links.forEach(link => {

    link.addEventListener("click", () => {

        nav.classList.remove("is-open");

        toggle.classList.remove("is-active");

        toggle.setAttribute(
            "aria-expanded",
            "false"
        );

        document.body.classList.remove("menu-open");

    });

});