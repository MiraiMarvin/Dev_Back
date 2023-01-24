var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];



function openModal() {
    modal.style.display = "block";
}

function closeModal() {
    modal.style.display = "none";
}

btn.onclick = function() {
    openModal();
}


span.onclick = function() {
    closeModal();
}

window.onclick = function(event) {
    if (event.target == modal) {
        closeModal();
    }
}




