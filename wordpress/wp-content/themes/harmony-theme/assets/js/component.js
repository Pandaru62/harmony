const screenTexts = document.querySelectorAll(".screen-watch-text");
const watchImage = document.getElementById("watch-screen");

screenTexts.forEach(text => {
    text.addEventListener("mouseenter", () => {
        // Remove selection from all
        screenTexts.forEach(t => t.classList.remove("screen-watch-selected"));

        // Add selection to hovered one
        text.classList.add("screen-watch-selected");

        // Change image
        const imageNumber = text.dataset.image;
        watchImage.src = `/wp-content/themes/harmony-theme/assets/images/bracelet-screen/screen${imageNumber}.png`;
    });
});

const featureTripticalCards = document.querySelectorAll(".feature-triptical-card");
const watchImage2 = document.querySelector(".feature-triptical-img img");

featureTripticalCards.forEach(card => {
    card.addEventListener("click", () => {

        featureTripticalCards.forEach(c =>
            c.classList.remove("triptical-card-active")
        );

        card.classList.add("triptical-card-active");

        const imageNumber = card.dataset.image;

        watchImage2.src =
            `/wp-content/themes/harmony-theme/assets/images/component/triptical/triptical-${imageNumber}.png`;
    });
});

const faqCards =
    document.querySelectorAll(".faq-card");

faqCards.forEach(card => {

    const button =
        card.querySelector(".faq-toggle");

    const content =
        card.querySelector(".faq-content");

    button.addEventListener("click", () => {

        const open =
            card.classList.toggle("is-open");

        if (open) {

            content.style.maxHeight =
                content.scrollHeight + "px";

        }

        else {

            content.style.maxHeight = null;

        }

    });

});