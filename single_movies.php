<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="dist/style.css" rel="stylesheet">
    <title>Single_page_movies</title>
</head>
<body class="bg-black">
<section class="w-full " >
    <div class="flex flex-row justify-between h-20 items-center">
        <h1 class="text-white font-Akira text-5xl px-5">SpyMovies</h1>
        <div class="font-Bahn text-2xl font-medium">
            <a class="text-white px-2.5">Log In</a>
            <a class="text-white px-2.5">Register</a>
        </div>
    </div>
</section>
<section class="single_page_main">
    <div id="single_pic"> </div>
    <div id="single_desc"></div>
    <div id="single_genre"></div>

</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.2/axios.min.js" integrity="sha512-QTnb9BQkG4fBYIt9JGvYmxPpd6TBeKp6lsUrtiVQsrJ9sb33Bn9s0wMQO9qVBFbPX3xHRAsBHvXlcsrnJjExjg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="Axios-search.js" type="module"></script>
<script src=single_search.js type="module"></script>
</body>
</html>