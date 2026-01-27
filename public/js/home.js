//gestione asincrona filtri + paginazione nella home
//ascolta i click nella pagina
document.addEventListener('click', async function (e) {

    //intercetta solo click su link di paginazione
    const paginationLink = e.target.closest('.pagination-wrapper a');
    if (!paginationLink) return;

    //blocca il comportamento nativo del browser
    e.preventDefault();

    try {
        //manda la richiesta HTTP (GET, tramite la URL) come se fosse il browser a farlo
        const response = await fetch(paginationLink.href);

        if (!response.ok) return;

        //contiene l'html come stringa
        const html = await response.text();

        //trasforma la stringa in html navigabile
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');

        //dalla nuova pagina prende solo i post e la paginazione
        const newPosts = doc.querySelector('.posts');
        const newPaginationWrapper = doc.querySelector('.pagination-wrapper');  //nuova
        const currentWrapper = document.querySelector('.pagination-wrapper');   //vecchia

        if (!newPosts) return;

        //sostituisce con i nuovi post
        document.querySelector('.posts').innerHTML = newPosts.innerHTML;

        // aggiorna la paginazione: se nella risposta non c'è, rimuovi quella vecchia
        if (currentWrapper) {
            if (newPaginationWrapper) {
                currentWrapper.innerHTML = newPaginationWrapper.innerHTML;
            } else {
                currentWrapper.remove();
            }
        } else if (newPaginationWrapper) {
            // se prima non c'era paginazione ma ora sì, inseriscila dopo i post
            const postsEl = document.querySelector('.posts');
            if (postsEl) {  //se ci sono post, inseriscila dopo
                postsEl.insertAdjacentElement('afterend', newPaginationWrapper);
            }
        }

        //torna all'inizio della pagina
        window.scrollTo({ top: 0, behavior: 'smooth' });

    } catch (err) {
        console.error('Errore caricamento paginazione:', err);
    }
});

//submit asincrono del form filtri
//ascolta i submit nella pagina, cioè quando un form viene inviato
document.addEventListener('submit', async function (e) {

    //intercetta solo submit sui filtri risalendo al "genitore" (<form class="filters">)
    const form = e.target.closest('form.filters');
    if (!form) return;

    //previene il comportamento nativo del browser
    e.preventDefault();

    //prima era un GET quindi la pagina era già pronta, adesso è un POST quindi deve ricreare l'indirizzo
    const url = new URL(form.action, window.location.origin);   //ricava la pagina di destinazione ({$BASE_URL}/home(following))
    const params = new URLSearchParams(new FormData(form));     //legge tutti i campi del form
    // quando cambi filtri riparti sempre da pagina 1
    params.set('page', '1');
    url.search = params.toString();                             //scrive la URL completa, quella che si vedrebbe senza il js

    try {
        //manda la richiesta HTTP (GET, tramite la URL)
        const response = await fetch(url.toString());

        if (!response.ok) return;

        //stringa che contiene l'HTML di risposta
        const html = await response.text();

        //per trattarlo come html
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');

        //della pagina che gli rimanda il server prende solo post e info su paginazione
        const newPosts = doc.querySelector('.posts');
        const newPaginationWrapper = doc.querySelector('.pagination-wrapper');  //nuova
        const currentWrapper = document.querySelector('.pagination-wrapper');   //vecchia

        if (!newPosts) return;

        //sostituisce con i nuovi post
        document.querySelector('.posts').innerHTML = newPosts.innerHTML;

        if (currentWrapper) {       //se prima c'era paginazione e ora ne arriva una nuova sostituiscila, altrimenti rimuovi
            if (newPaginationWrapper) {
                currentWrapper.innerHTML = newPaginationWrapper.innerHTML;
            } else {
                currentWrapper.remove();
            }
        } else if (newPaginationWrapper) {      // se prima non c'era paginazione ma ora sì, inseriscila dopo i post
            const postsEl = document.querySelector('.posts');
            if (postsEl) {
                postsEl.insertAdjacentElement('afterend', newPaginationWrapper);
            }
        }

        //torna all'inizio della pagina
        window.scrollTo({ top: 0, behavior: 'smooth' });

    } catch (err) {
        console.error('Errore caricamento filtri:', err);
    }
});

//gestione del reset dei filtri
//ascolta i click nella pagina
document.addEventListener('click', async function (e) {
    //e.target è l'elemento HTML su cui l'utente clicca
    //closest risale nei "genitori" dell'elemento, se trova .a.button.secondary (unico di quella classe nella pagina) e lo mette in link
    const resetLink = e.target.closest('a.button.secondary');
    if (!resetLink) return;

    //blocca il comportamento nativo, cioè il browser non ricarica la pagina
    e.preventDefault();

    //chiede la pagina cliccata dall'utente al server (link = URL della pagina)
    const response = await fetch(resetLink.href);

    //se ritorna un errore esce
    if (!response.ok) return;

    //contiene l'html come stringa (risposta server)
    const html = await response.text();

    //trasforma la stringa in html navigabile
    const parser = new DOMParser();
    const doc = parser.parseFromString(html, 'text/html');

    //dalla nuova pagina prende solo i post, la paginazione e resetta i filtri
    const newPosts = doc.querySelector('.posts');
    const newPaginationWrapper = doc.querySelector('.pagination-wrapper');
    const currentWrapper = document.querySelector('.pagination-wrapper');
    const newFilters = doc.querySelector('form.filters');

    if (newPosts) {
        document.querySelector('.posts').innerHTML = newPosts.innerHTML;
    }

    // aggiorna la paginazione: se nella risposta non c'è, rimuovi quella vecchia
    if (currentWrapper) {
        if (newPaginationWrapper) {
            currentWrapper.innerHTML = newPaginationWrapper.innerHTML;
        } else {
            currentWrapper.remove();
        }
    } else if (newPaginationWrapper) {
        // se prima non c'era paginazione ma ora sì, inseriscila dopo i post
        const postsEl = document.querySelector('.posts');
        if (postsEl) {
            postsEl.insertAdjacentElement('afterend', newPaginationWrapper);
        }
    }

    if (newFilters) {
        document.querySelector('form.filters').innerHTML = newFilters.innerHTML;
    }

    //torna all'inizio della pagina
    window.scrollTo({ top: 0, behavior: 'smooth' });
});