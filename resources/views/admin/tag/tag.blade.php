<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/home.css">
    <script src="/js/admin/tags/tag.js"></script>
    <title>Squidtags</title>
</head>
<body>
<script>    
    var userData = {!! json_encode($data["users"], JSON_HEX_TAG) !!};
    var shopData = {!! json_encode($data["shops"], JSON_HEX_TAG) !!};
    var tagData = {!! json_encode($data["tags"], JSON_HEX_TAG) !!};
    var wachtrijData = {!! json_encode($data["wachtrij"], JSON_HEX_TAG) !!};
</script>
    <img class="bg" src="/img/bg.svg" alt="bg">
    <a href="/admin"><img class="arrow" src="/img/arrow.svg" alt="back"></a>
    <section class="header_text">
        <h1 class="header_h1">Tags</h1>
    </section>
    <input class="searchbar" id="js--searchBar" type="text" placeholder="Search email"></input>
    <section class="taglist" id="js--tagList">
    </section>
</body>
</html>