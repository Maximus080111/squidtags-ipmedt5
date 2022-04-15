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
    console.log(shopName);
</script>
    <img class="bg" src="/img/bg.svg" alt="bg">
    <a href="/admin/shop"><img class="arrow" src="/img/Back.svg" alt="back arrow"></a>
    <section class="header_list">
        <h1>Winkel aanmaken</h1>
    </section>
    <form  id="form" action="/post-distribution-add" method="POST" class="login_form" autocomplete="off">
    @csrf
        <label for="Adress">Adress</label>
        <input type="text" id="Adress" placeholder="Adress" class="input" name="Adress" required autofocus autocomplete="false">
        @if ($errors->has('Adress'))
            <span class="text-danger">{{ $errors->first('Adress') }}</span>
        @endif
        <label for="MaxVisit">Max. bezoekers</label>
        <input type="number" id="MaxVisit" placeholder="Max. bezoekers" name="MaxVisit" required autocomplete="false">
        @if ($errors->has('MaxVisit'))
            <span class="text-danger">{{ $errors->first('MaxVisit') }}</span>
        @endif
        <label for="AverageTime">AverageTime</label>
        <input type="number" id="AverageTime" placeholder="AverageTime" name="AverageTime" required autocomplete="false">
        @if ($errors->has('AverageTime'))
            <span class="text-danger">{{ $errors->first('AverageTime') }}</span>
        @endif
        <label style="display:none;" for="StoreName">StoreName</label>
        <input style="display:none;"  type="text" id="StoreName" placeholder="StoreName" name="StoreName" value="{{ $data['shopName'] }}" required autocomplete="false">
        @if ($errors->has('StoreName'))
            <span style="display:none;" class="text-danger">{{ $errors->first('StoreName') }}</span>
        @endif
        <section class="update">
            <a href="/distributions">
                <button type="submit" class="account_button">Creeër</button>
            </a>
        </section>
    </form>
</body>
</html>

<!--
    Adress
    MaxVisit
    AverageTime
    ImgLink
-->