document.addEventListener(
    "DOMContentLoaded",
    () => {
        const input =
        document.getElementById("faq-search");

        const results =
        document.getElementById("faq-search-results");

        if(!input || !results) return;

        const cards = document.querySelectorAll(".faq-card");

        input.addEventListener("input",()=>{

            const value =input.value.toLowerCase().trim();
            results.innerHTML="";

            if(value.length < 2){

                results.classList.remove("active");

                return;

            }

            let matches=[];

            cards.forEach(card=>{


                const question =
                card.querySelector(".faq-question")
                .textContent
                .toLowerCase();


                const answer =
                card.querySelector(".faq-body-card")
                .textContent
                .toLowerCase();

                if(question.includes(value) || answer.includes(value)){
                    matches.push(card);
                }

            });

            if(matches.length===0){
                results.innerHTML=
                `
                <div class="faq-result">
                    Aucun résultat trouvé
                </div>
                `;
            }
            else{
                matches.slice(0,5)
                .forEach(card=>{
                    const title =
                    card.querySelector(".faq-question")
                    .textContent;

                    results.innerHTML +=
                    `
                    <a 
                    class="faq-result"
                    href="#${card.id}">
                    ${title}
                    </a>
                    `;

                });
            }


            results.classList.add("active");

        });
        
        document.addEventListener(
        "click",
        (e)=>{
        
        if(!results.contains(e.target)
        && e.target !== input){
        
        results.classList.remove("active");
        
        }
        
        });

    }
);
