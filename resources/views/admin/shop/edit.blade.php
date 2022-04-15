<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/home.css">
    <script src="/js/admin/shops/distributions/distributions.js"></script>
    <title>Squidtags</title>
</head>
<body>
<script>    
    var userData = {!! json_encode($data["users"], JSON_HEX_TAG) !!};
    var shopData = {!! json_encode($data["shops"], JSON_HEX_TAG) !!};
    console.log(shopData);
    var tagData = {!! json_encode($data["tags"], JSON_HEX_TAG) !!};
    var wachtrijData = {!! json_encode($data["wachtrij"], JSON_HEX_TAG) !!};
    var shopName = {!! json_encode($data["shopName"], JSON_HEX_TAG) !!};;
    console.log(shopName);
</script>
    <section class="header_list">
        <a href="/admin/shop"><img class="back_arrow" src="/img/Back.svg" alt="back arrow"></a>
        <h1>{{ $data["shopName"] }}</h1>
        <h2>{{ $data["shops"]->Adress }}</h2>
    </section>
    <form  id="form" action="/post-shop-update" method="POST" class="form" autocomplete="off">
        <label for="ImgLink" class="label_input">ImgLink</label>
        <input type="text" id="ImgLink" class="input" placeholder="ImgLink" name="ImgLink" required value="{{ $data['shops']->ImgLink }}" autocomplete="false">
        @if ($errors->has('ImgLink'))
            <span class="text-danger">{{ $errors->first('ImgLink') }}</span>
        @endif
        <div class="text-center">
            <button type="submit" class="account_button">Update</button>
        </div>
    </form>
</body>
</html>

<!--
    Adress
    MaxVisit
    AverageTime
    ImgLink
-->