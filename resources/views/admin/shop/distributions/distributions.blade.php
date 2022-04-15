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
    var tagData = {!! json_encode($data["tags"], JSON_HEX_TAG) !!};
    var wachtrijData = {!! json_encode($data["wachtrij"], JSON_HEX_TAG) !!};
    var shopName = {!! json_encode($data["shopName"], JSON_HEX_TAG) !!};;
    console.log(shopName);
</script>
    <section class="header_list">
    <a href="/admin/shop/{{ $data['shopName'] }}/add"><img class="add" src="/img/add.svg" alt="add"></a>
        <h1>Distributies</h1>
        <h2>{{ session('success') }}</h2>
    </section>
    <input id="js--searchBar" type="text" class="searchbar" placeholder="Search adress"></input>
    <section class="tag_list" id="js--tagList">
    </section>
</body>
</html>