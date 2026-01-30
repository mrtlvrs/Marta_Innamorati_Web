//ascolta i click nella pagina
document.addEventListener('click', async function (e) {
    //e.target è l'elemento HTML su cui l'utente clicca
    //closest risale nei "genitori" dell'elemento, se trova .pagination (classe) e lo mette in link
    const link = e.target.closest('.pagination a');
    if (!link) return;

    //solo nella pagina /saved
    if (!window.location.pathname.includes('/saved')) return;

    //blocca il comportamento nativo, cioè il browser non ricarica la pagina
    e.preventDefault();

    //chiede la pagina cliccata dall'utente al server (link = URL della pagina)
    const response = await fetch(link.href);

    //se ritorna un errore esce
    if (!response.ok) return;

    //contiene l'html come stringa
    const html = await response.text();

    //trasforma la stringa in html navigabile
    const parser = new DOMParser();
    const doc = parser.parseFromString(html, 'text/html');

    //dalla nuova pagina prende solo i post e la paginazione
    const newPosts = doc.querySelector('#saved-posts');
    const newPagination = doc.querySelector('.pagination');

    if (!newPosts || !newPagination) return;

    //sostituisce post e pagina nel vecchio html
    document.querySelector('#saved-posts').innerHTML = newPosts.innerHTML;
    document.querySelector('.pagination').innerHTML = newPagination.innerHTML;

    //torna all'inizio della pagina
    window.scrollTo({ top: 0, behavior: 'smooth' });
});