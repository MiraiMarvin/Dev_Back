var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];


// Fonction d'ouverture de la modale
function openModal() {
    modal.style.display = "block";
}

// Fonction de fermeture de la modale
function closeModal() {
    modal.style.display = "none";
}

// Ouvre la modale lorsque le bouton est cliqué
btn.onclick = function() {
    openModal();
}

// Ferme la modale lorsque le bouton de fermeture est cliqué
span.onclick = function() {
    closeModal();
}

// Ferme la modale lorsque l'utilisateur clique en dehors de la modale
window.onclick = function(event) {
    if (event.target == modal) {
        closeModal();
    }
}


