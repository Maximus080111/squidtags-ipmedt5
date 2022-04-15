<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/home.css">
    <script src="/js/shopInfo.js"></script>
    <title>Squidtags</title>
</head>
<body>
<script>    
    var ShopInfo = {!! json_encode($ShopInfo, JSON_HEX_TAG) !!};
    var UserWachtrijen = {!! json_encode($Wachtrijen, JSON_HEX_TAG) !!};
</script>
    <img class="bg" src="/img/bg.svg" alt="bg">
    <section class="header_text">
        <h1 class="shopinfo_h1">{{ $ShopInfo->StoreName }}</h1>
        <a href="/shops"><img class="back_arrow" src="/img/Back.svg" alt="back arrow"></a>
        <img class="tag" src="{{ $ShopInfo->ImgLink }}" alt="rfid_tag">
    </section>
    <section class="shopinfo">
        <h2 id="js--infoText" >Wilt u in de wachtrij staan voor de {{ $ShopInfo->StoreName }}</h2>
        <h3>Adres: {{ $ShopInfo->Adress }}</h3>
        <a id="js--queue-Ja" href="/shops/{{$ShopInfo->StoreName}}/{{ $ShopInfo->id }}/wachtrij"><button class="shopinfo_button">Ja</button></a>
        <a id="js--queue-Nee" href="/shops"><button class="shopinfo_button">Nee</button></a>
    </section>
</body>
</html>