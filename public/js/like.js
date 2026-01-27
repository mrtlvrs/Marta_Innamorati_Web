// BASE_URL viene iniettato dal backend
//codice che viene eseguito quando la pagina è stata caricata
document.addEventListener("DOMContentLoaded", function () {

    //cerchiamo il bottone del like che nel template si chiama like-btn
    const likeButton = document.querySelector(".like-btn");

    //se il bottone non esiste, esce
    if (!likeButton) {
        return;
    }

    //"ascoltatore" del click
    likeButton.addEventListener("click", async function () {

        //id della creazione dal data-attribute
        const creationId = likeButton.dataset.creationId;

        try {
            //invia la richiesta al controller PHP
            const response = await fetch(`${window.BASE_URL}/like`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    creation_id: creationId
                })
            });

            //converte la risposta in un oggetto JS
            const data = await response.json();

            //se l'utente non è loggato → redirect al login
            if (!data.success && data.error === "NOT_AUTHENTICATED") {
                window.location.href = `${window.BASE_URL}/login`;
                return;
            }

            //aggiorniamo lo stato del bottone
            if (data.liked) {
                likeButton.classList.add("primary");
            } else {
                likeButton.classList.remove("primary");
            }

            //aggiorniamo il numero di like
            const countSpan = likeButton.querySelector(".like-count");
            countSpan.textContent = data.count;

        } catch (error) {
            console.error("Errore nella richiesta di like:", error);
        }
    });
});