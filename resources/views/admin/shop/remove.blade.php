<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/home.css">
    <title>Squidtags</title>
</head>
<body>
    <script>
        console.log({!! json_encode($data['shopData'], JSON_HEX_TAG) !!})
    </script>
    <section class="header">
        <h1>Weet u zeker dat u de winkelbranche {{ $data["shopData"]->StoreName }} wilt verwijderen</h1>
        <a href="/admin/shop/"><img class="back_arrow" src="/img/Back.svg" alt="back arrow"></a>
        <img class="tag" src="/img/rfid.png" alt="rfid_tag">
    </section>
    <section class="info">
        <br>
        <a href="/admin/shop/remove/{{ $data['shopData']->id }}/confirm"><button>Ja</button></a>
        <a href="/admin/shop/remove/{{ $data['shopData']->id }}/deny"><button>Nee</button></a>
    </section>
</body>
</html>