<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="dist/style.css" rel="stylesheet">
    <title>SpyMovies</title>
</head>
<body class="bg-black">

<section class="w-full h-screen bg-[url('../image/bannerpromo.png')] bg-no-repeat bg-cover" >
    <div class="flex flex-row justify-between h-20 items-center">
        <h1 class="text-white font-Akira text-5xl px-5">SpyMovies</h1>
        <div class="font-Bahn text-2xl font-medium">
            <a class="text-white px-2.5">Log In</a>
            <a class="text-white px-2.5">Register</a>
        </div>
    </div>
</section>
<section class="w-full h-screen flex flex-col">
    <div>
        <h2 class="font-Akira text-3xl text-white">Movies</h2>
        <form id="search-form" class="bg-black ">
            <label for="search-input">Rechercher un film</label>
            <input type="text" id="search-input" name="search" class="bg-black border border-white text-white" >
            <button type="submit" class="text-white" id="search-button">Go</button>
        </form>


    </div>

    <div class="flex flex-row w-full">
        <div class="w-3/12 flex flex-row">
            <div class="w-1/2"></div>
                <a>romance</a>
                <a>anime</a>
                <a>western</a>
                <a>science-fiction</a>
                <a></a>
            <div class="border-r-2 border-white w-1/2">
                <a>Horreur</a>
                <a>Comédie</a>
                <a>Action</a>
                <a>Thriller</a>
                <a>Fantastique</a>
            </div>

        </div>
        <div class="w-9/12 flex flex-wrap gap-8 items-center text-center" id="right_search">


        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.2/axios.min.js" integrity="sha512-QTnb9BQkG4fBYIt9JGvYmxPpd6TBeKp6lsUrtiVQsrJ9sb33Bn9s0wMQO9qVBFbPX3xHRAsBHvXlcsrnJjExjg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="Axios-search.js" type="module"></script>

</body>
</html>