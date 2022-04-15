<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/home.css">
    <script src="/js/taglist.js"></script>
    <title>Squidtags</title>
</head>
<body>
<script>    
    var UserTagList = {!! json_encode($taglist, JSON_HEX_TAG) !!};
</script>
    <img class="bg" src="img/bg.svg" alt="bg">
    <a href="/dashboard"><img class="arrow" src="/img/Back.svg" alt="back"></a>
    <section class="header_text">
        <h1 class="header_h1">Tags</h1>
        <p>aantal: {{$tagAmount}}</p>
    </section>
    <p class="access_denied" > {{ session('success') }} </p>
    <a href="/tag/newTag">
        <img class="add" src="img/add.svg" alt="">
    </a>
    <section class="taglist" id="js--tagList"></section>
</body>
</html>