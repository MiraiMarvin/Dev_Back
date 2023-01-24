const chest = document.getElementById('image-pp');

    console.log(id)

const urlParams = new URLSearchParams(window.location.search);
urlParams.set('id', id);

chest.addEventListener('click',function () {

    window.location.href = 'Profil.php?' + urlParams ;
});