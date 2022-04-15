<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/shops.css">
    <script src="{{ $data['jsUrl'] }}"></script>
    <title>Squidtags</title>
</head>
<body>
<script>    
    var ShopList = {!! json_encode($ShopList, JSON_HEX_TAG) !!};
</script>
    <img class="bg" src="/img/bg.svg" alt="bg">
    <a href="/dashboard"><img class="arrow" src="/img/arrow.svg" alt="back"></a>
    <section class="header_text">
        <h1 class="header_h1">Alle beschikbare Winkels</h1>
    </section>
    <section class="grid" id="js--shopList">
        <a class="item-0">
            <p>advertentie</p>
            <img class="mini_img" src="/img/logo_apple.svg" alt="">
        </a>
    </section>
</body>
</html>