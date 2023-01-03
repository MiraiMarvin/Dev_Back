//const axios = require('axios');

//import axios from "./node_modules/axios";

const input = document.getElementById('search-input');
const button = document.getElementById('search-button');
const cont_search = document.getElementById('right_search');


const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const search = urlParams.get('search')

console.log(search)


axios.get('https://api.themoviedb.org/3/search/movie?api_key=a8871525bb27f1c83641251be4509be6&language=en-US&query='+search+'&page=1&include_adult=false')
    .then(function (response) {
        // traiter la réponse de l'API
        const movies = response.data.results;
        for (var i = 0; i < movies.length; i++){
            console.log(movies[i]);

            var div = document.createElement("div");
            div.className ="search-card";
            document.getElementById("right_search").appendChild(div);

            var title = document.createElement("h2");
            title.className ="title_search";
            title.innerHTML = movies[i].title;
            div.appendChild(title);

            var img = document.createElement("img");
            div.appendChild(img);
            img.className ="image_search";
            var moviesimg = 'https://image.tmdb.org/t/p/w500' + movies[i].poster_path;
            img.src = moviesimg;
            img.alt = "affiche film";


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
for (var i = 0; i < movies.length; i++)

movies.forEach((element) => {
            console.log({ element });
            var div = document.createElement('div');

            div.className = 'search-card';
            var title = "<h2>" movies.element.original_title "</h2>";
            div.innerHTML = title;
*/