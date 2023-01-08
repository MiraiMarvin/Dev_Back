<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="dist/style.css" rel="stylesheet">
    <title>SearchGenre</title>
</head>
<body class="bg-black">

<?php include('header.php'); ?>

<div class=" ">
    <form class="items-center text-center">
        <select id="my-select" class="text-white text-2xl bg-black  border border-white items-center text-center">
            <option value="28">action</option>
            <option value="12">aventure</option>
            <option value="16">animation</option>
            <option value="35">Comedy</option>
            <option value="80">crime</option>
            <option value="99">documentary</option>
            <option value="18">drama</option>
            <option value="10751">family</option>
            <option value="14">Fantasy</option>
            <option value="36">History</option>
        </select>
        <button type="submit" class="text-white" id="search-button">rechercher</button>
    </form>
</div>

    <div class="w-9/12 flex flex-wrap gap-8 items-center text-center justify-evenly " id="right_search_genre">

    </div>
<script src="Axios-search.js" type="module"></script>
<script src="AxiosSearchGenre.js" type="module"></script>

</body>
</html>