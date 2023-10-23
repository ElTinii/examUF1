/**
 * Mostra el modal de confirmar l'eliminació d'un article
 * @param integer id ID de l'article a eliminar
 */
function show_confirm(id){
    if (id != 0) {
        $('#confirm-modal').modal('show');
        $('#confirmDelete').attr("href", `delete.php?id=${id}`)
    }
    else {
        $('#confirm-modal').modal('show');
        $('#message').text("Do you want to discard this new post?")
        $('#confirmDelete').attr("href", `index.php`)
    }
}