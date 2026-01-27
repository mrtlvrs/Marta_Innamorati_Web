document.addEventListener("DOMContentLoaded", function () {

    const saveButton = document.querySelector(".save-btn");

    // se il bottone non esiste (pagina senza save), esci
    if (!saveButton) {
        return;
    }

    saveButton.addEventListener("click", async function () {

        const creationId = saveButton.dataset.creationId;

        try {
            const response = await fetch(`${window.BASE_URL}/save`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    creation_id: creationId
                })
            });

            if (!response.ok) {
                console.error("Errore HTTP:", response.status);
                return;
            }

            const data = await response.json();

            // non loggato = redirect
            if (!data.success && data.error === "NOT_AUTHENTICATED") {
                window.location.href = `${window.BASE_URL}/login`;
                return;
            }

            // toggle stato visivo
            if (data.saved) {
                saveButton.classList.add("primary");
            } else {
                saveButton.classList.remove("primary");
            }

            // aggiorna contatore
            const countSpan = saveButton.querySelector(".save-count");
            countSpan.textContent = data.saveCount;

        } catch (error) {
            console.error("Errore nel save asincrono:", error);
        }
    });
});