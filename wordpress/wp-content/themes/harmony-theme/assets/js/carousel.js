const bracelets = [
    {
        image:"/wp-content/themes/harmony-theme/assets/images/bracelet/pink_bracelet_harmony.png",
        color:"rose"
    },
    {
        image:"/wp-content/themes/harmony-theme/assets/images/bracelet/black_bracelet_harmony.png",
        color:"noir"
    },
    {
        image:"/wp-content/themes/harmony-theme/assets/images/bracelet/white_bracelet_harmony.png",
        color:"blanc"
    },
    {
        image:"/wp-content/themes/harmony-theme/assets/images/bracelet/blue_bracelet_harmony.png",
        color:"bleu"
    },

    {
        image:"/wp-content/themes/harmony-theme/assets/images/bracelet/green_bracelet_harmony.png",
        color:"vert"
    },

    {
        image:"/wp-content/themes/harmony-theme/assets/images/bracelet/red_bracelet_harmony.png",
        color:"rouge"
    }
];

let current = 1;
const nextButton = document.getElementById("carousel-next-btn");
const prevButton = document.getElementById("carousel-prev-btn");
const items = document.querySelectorAll(".carousel-item");
const title = document.getElementById("carousel-bracelet-title")
const description = document.getElementById("carousel-bracelet-description")

function render(){

    const previous = (current - 1 + bracelets.length) % bracelets.length;

    const next = (current + 1) % bracelets.length;

    items.forEach(item => item.classList.remove("active"));
    items[1].classList.add("active");

    items[0].querySelector("img").src =
    bracelets[previous].image;
    
    items[1].querySelector("img").src =
    bracelets[current].image;
    
    items[2].querySelector("img").src =
    bracelets[next].image;
    
    title.textContent =
    "Montre Harmony";
    
    description.textContent =
    `Pack bracelet ${bracelets[current].color}`;
}

nextButton.addEventListener("click",()=>{
    // e.preventDefault();
    current++;
    if(current>=bracelets.length){
        current=0;
    }
    render();
});

prevButton.addEventListener("click",()=>{
    // e.preventDefault();
    current--;
    if(current<0){
        current= bracelets.length-1;
    }
    render();
});