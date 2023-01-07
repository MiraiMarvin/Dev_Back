//const axios = require('axios');

//import axios from "./node_modules/axios";
const urlParams = new URLSearchParams(window.location.search);
const id = urlParams.get('id'); // Récupère la valeur du paramètre "id"



axios.get('https://api.themoviedb.org/3/movie/'+id+'?api_key=a8871525bb27f1c83641251be4509be6&language=en-US')
    .then(function (response) {
        const movies_single = response.data;
        console.log(movies_single)

        var img = document.createElement("img");
        document.getElementById("single_pic").appendChild(img);
        img.className ="pic-single";

        var pic_sing = 'https://image.tmdb.org/t/p/w500' + movies_single.poster_path;
        img.src = pic_sing;
        img.alt = "affiche film";


        var title = document.createElement("h2");
        title.className ="";
        title.innerHTML = movies_single.title;
        document.getElementById("single_desc").appendChild(title);
        var over = document.createElement("div");
        over.className ="text-single";
        over.innerHTML = movies_single.overview;
        document.getElementById("single_desc").appendChild(over);

        for (var i = 0; i < movies_single.genres.length; i++){

            var genre = document.createElement("p");
            genre.className ="genre-single";
            genre.innerHTML = movies_single.genres[i].name;
            document.getElementById("single_genre").appendChild(genre);
        }





    })
    .catch(function (error) {
        // gérer les erreurs
    });









