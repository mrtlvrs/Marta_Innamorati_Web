//rimane in ascolto dei click, quando l'utente clicca su "Carica altri" js invia una GET
document.addEventListener('click', async function (e) {

    //intercetta solo click sul bottone load more comments
    const button = e.target.closest('#load-more-comments');
    if (!button) return;

    //previene il comportamento di default del browser
    e.preventDefault();

    //ricava i dati trasmessi dal click sul bottone
    const creationId = button.dataset.creationId;
    let offset = parseInt(button.dataset.offset, 10);   //10 vuol dire decimale
    const total = parseInt(button.dataset.total, 10);

    try {
        //crea l'URL e lo lancia, questo URL è utilizzato solo da js
        const response = await fetch(`${BASE_URL}/creationComments?creation=${creationId}&offset=${offset}`);

        if (!response.ok) return;

        //riceve dal server l'html come stringa
        const html = await response.text();

        //se il server non ritorna nulla, non carica altri commenti
        if (html.trim() === '') {
            button.style.display = 'none';
            return;
        }

        //cerca la classe comments-list
        const commentsList = document.querySelector('#comments-list');
        if (!commentsList) return;

        //appende i nuovi commenti
        commentsList.insertAdjacentHTML('beforeend', html);

        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');
        const newComments = doc.querySelectorAll('.comment').length;    //conta quanti commenti sono arrivati

        //aggiorna offset nel DOM (attributo HTML) della pagina
        offset += newComments;
        button.dataset.offset = offset;

        //serve per non far comparire di nuovo il bottone "Carica altri" se non ci sono nuovi commenti
        if (offset >= total) {
            button.style.display = 'none';
        }

    } catch (err) {
        console.error('Errore caricamento commenti:', err);
    }
});