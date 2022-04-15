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
    <a href="/admin/shop"><img class="back_arrow" src="/img/Back.svg" alt="back arrow"></a>
    <section class="header_list">
        <h1>{{ $data["shopName"] }}</h1>
        <h2>{{ $data["shops"]->Adress }}</h2>
    </section>
    <form  id="form" action="/post-shop-update" method="POST" class="login_form" autocomplete="off">
        @csrf
        <label for="Adress">Adress</label>
        <input type="text" id="Adress" placeholder="Adress" name="Adress" value="{{ $data['shops']->Adress }}" required autofocus autocomplete="false">
        @if ($errors->has('Adress'))
            <span class="text-danger">{{ $errors->first('Adress') }}</span>
        @endif
        <label for="MaxVisit">Max. bezoekers</label>
        <input type="number" id="MaxVisit" placeholder="Max. bezoekers" name="MaxVisit" required value="{{ $data['shops']->MaxVisit }}" autocomplete="false">
        @if ($errors->has('MaxVisit'))
            <span class="text-danger">{{ $errors->first('MaxVisit') }}</span>
        @endif
        <label for="AverageTime">AverageTime</label>
        <input type="number" id="AverageTime" placeholder="AverageTime" name="AverageTime" required value="{{ $data['shops']->AverageTime }}" autocomplete="false">
        @if ($errors->has('AverageTime'))
            <span class="text-danger">{{ $errors->first('AverageTime') }}</span>
        @endif
        <label for="ImgLink">ImgLink</label>
        <input type="text" id="ImgLink" placeholder="ImgLink" name="ImgLink" required value="{{ $data['shops']->ImgLink }}" autocomplete="false">
        @if ($errors->has('ImgLink'))
            <span class="text-danger">{{ $errors->first('ImgLink') }}</span>
        @endif
        <label style="display:none;" for="id" class="label_input">id</label>
        <input style="display:none;"  type="text" id="id" class="input" placeholder="id" name="id" required value="{{ $data['shops']->id }}" autocomplete="false">
        @if ($errors->has('ImgLink'))
            <span style="display:none;" class="text-danger">{{ $errors->first('ImgLink') }}</span>
        @endif
        <section class="update">
            <a href="/distributions">
                <button type="submit" class="account_button">Update</button>
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