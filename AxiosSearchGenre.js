const select = document.querySelector('#my-select');
var value = select.value;
console.log(value)



axios.get('https://api.themoviedb.org/3/discover/movie?api_key=a8871525bb27f1c83641251be4509be6&language=fr-FR&page=1&with_genres='+value)
    .then(function (response) {
        // traiter la réponse de l'API
        const moviesgenre = response.data.results;


        for (var i = 0; i < moviesgenre.length; i++){


            var div = document.createElement("div");
            div.className ="search-card";
            document.getElementById("right_search_genre").appendChild(div);



            var title = document.createElement("h3");
            title.className ="title_search";
            title.innerHTML = moviesgenre[i].title;
            div.appendChild(title);


            var img = document.createElement("img");
            div.appendChild(img);
            img.className ="image_search";

            var moviesimg = 'https://image.tmdb.org/t/p/w500' + moviesgenre[i].poster_path;
            img.src = moviesimg;
            img.alt = "affiche film";


            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set('id', moviesgenre[i].id);

            div.addEventListener('click', function() {


                // Redirige vers la page cible en passant les informations dans l'URL
                window.location.href = 'single_movies.php?' + urlParams ;

            });


        }



    })
    .catch(function (error) {
        // gérer les erreur
    });
