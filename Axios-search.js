//const axios = require('axios');

//import axios from "./node_modules/axios";

const input = document.getElementById('search-input');
const button = document.getElementById('search-button');

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const search = urlParams.get('search')
console.log(search)


axios.get('https://api.themoviedb.org/3/search/movie?api_key=a8871525bb27f1c83641251be4509be6&language=en-US&query='+search+'&page=1&include_adult=false')
    .then(function (response) {
        // traiter la réponse de l'API
        const movies = response.data.results;
        movies.forEach(elements){
            document.write('<h2 class="text-white text-2xl font-Bahn">elements.original_title</h1>')

        }




    })
    .catch(function (error) {
        // gérer les erreurs
    });




/*
button.addEventListener('click', function (event) {
    event.preventDefault(); // empêche l'envoi du formulaire

    const query = input.value; // récupère la valeur du champ de texte

});
*/