let select = document.getElementById('my-select');
const movieContainer = document.getElementById('right_search_genre')

async function getMoviesByGenre(ID) {
    try {
        const response = await fetch(`https://api.themoviedb.org/3/discover/movie?api_key=a8871525bb27f1c83641251be4509be6&language=fr-FR&page=1&with_genres=${ID}`);
        const data = await response.json();

        movieContainer.innerHTML = "";
        for (const movie of data.results) {
            movieContainer.innerHTML +=
                `<a href="single_movies.php?id=${movie.id}">
                <div class="search-card">
                        <h3 class="title_search">${movie.title}</h3>
                        <img class="image_search" src="https://image.tmdb.org/t/p/w500${movie.poster_path}" alt="affiche film">
                      </div>
                </a>`;
        }
    } catch (error) {
        movieContainer.innerHTML = `<p>${error.message}</p>`;
    }
}

select.addEventListener("change", function(){
    let genreId = select.value;
    getMoviesByGenre(genreId)
});
