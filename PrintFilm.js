
for (var i = 0; i < maVariableJS.length; i++){
     var search = maVariableJS[i].api_id;
    axios.get('https://api.themoviedb.org/3/movie/'+search+'?api_key=a8871525bb27f1c83641251be4509be6&language=en-US')
        .then(function (response) {
            const movies_single = response.data;
            console.log(movies_single)

            var main = document.createElement("div");
            main.className ="mainlistfilm";
            document.getElementById("main_contain").appendChild(main);

            var img = document.createElement("img");
            img.className ="img_album";
            main.appendChild(img);
            var moviesimg = 'https://image.tmdb.org/t/p/w500' + movies_single.poster_path;
            img.src = moviesimg;
            img.alt = "affiche film";

            var title = document.createElement("h3");
            title.className ="title_search";
            title.innerHTML = movies_single.title;
            main.appendChild(title);
            var over = document.createElement("div");
            over.className ="text-single_alb";
            over.innerHTML = movies_single.overview;
            main.appendChild(over);
            var button = document.createElement("button");
            button.className ="del_film";
            main.appendChild(button);
















        })
        .catch(function (error) {
            // gérer les erreurs
        });


}