
for (var i = 0; i < maVariableJS.length; i++){
     var search = maVariableJS[i].api_id;
        var id_film = maVariableJS[i].id;
        console.log(id_film)

    axios.get('https://api.themoviedb.org/3/movie/'+search+'?api_key=a8871525bb27f1c83641251be4509be6&language=en-US')
        .then(function (response) {
            const movies_single = response.data;
            console.log(movies_single)
                let myVar = movies_single.id;



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
            var rate = document.createElement("div");
            rate.className ="rate";
            rate.innerHTML = movies_single.vote_average;
            main.appendChild(rate);
            var form = document.createElement("form");
            form.className = "formdel";
            form.method = "POST";
            main.appendChild(form);
            var button = document.createElement("input");
            button.className ="del_film";
            button.type = "submit";
            button.innerHTML = 'supprimer';
            form.appendChild(button);
            var hidden = document.createElement("input");
            hidden.type = "hidden";
            hidden.id = "myVar";
            hidden.name = "myVar";
            hidden.value = myVar;
            form.appendChild(hidden);



        })
        .catch(function (error) {

        });


}