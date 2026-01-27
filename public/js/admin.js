//nasconde tutte le sezioni dei materiali tranne quella il cui Id gli viene dato in ingresso
function showTab(id) {
    document.querySelectorAll('.material-section')          // prende tutti gli elementi della pagina con classe .material-section
        .forEach(s => s.style.display = 'none');            // nasconde tutte le sezioni 
    document.getElementById(id).style.display = 'block';    // rende visibile quella che gli viene passata in input
}