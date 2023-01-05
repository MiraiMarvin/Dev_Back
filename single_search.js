//const axios = require('axios');

//import axios from "./node_modules/axios";
const urlParams = new URLSearchParams(window.location.search);
const id = urlParams.get('id'); // Récupère la valeur du paramètre "id"

console.log(id)

axios.get('https://api.themoviedb.org/3/movie/'+id+'?api_key=a8871525bb27f1c83641251be4509be6&language=en-US')
    .then(function (response) {
        const movies_single = response.data;
        console.log(movies_single);



    })
    .catch(function (error) {
        // gérer les erreurs
    });









