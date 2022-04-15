<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css">
    <script src="/js/login.js"></script>
    <title>Squidtags</title>
</head>
<body>
    <script>
        function back(){ 
            history.back();
        }
    </script>
    <img class="bg" src="/img/bg.svg" alt="bg">
    <a onclick="back()"><img class="arrow clickable" src="/img/Back.svg" alt="back"></a>
    <section class="header_text">
        <h1 class="header_h1">Tag aanpassen</h1>
        <h2 class="error_msg">
            {{ session('success') }}
        </h2>
    </section>
    <section class="login_form">
        <form action="/post-changeTag" method="POST" class="form" autocomplete="off">
            @csrf
            <label for="NewTagName" class="label_input">Nieuwe tag name</label>
            <input type="text" id="NewTagName" class="input" placeholder="NewTag Name" name="NewTagName" required autofocus>
            @if ($errors->has('NewTagName'))
                <span class="text-danger">{{ $errors->first('NewTagName') }}</span>
            @endif
            <label for="NewTagData" class="label_input">Nieuwe tag data</label>
            <input type="text" id="NewTagData"class="input" placeholder="NewTag Data" name="NewTagData" value="{{ $tagData->TagData }}" required autofocus>
            @if ($errors->has('NewTagData'))
                <span class="text-danger">{{ $errors->first('NewTagData') }}</span>
            @endif
            <label style="display: none;" for="TagID" class="label_input">Nieuwe tag data</label>
            <input style="display: none;" type="text" id="TagID" class="input" placeholder="TagID" value="{{ $tagData->id }}" name="TagID" required autofocus>
            @if ($errors->has('tagID'))
                <span style="display: none;" class="text-danger">{{ $errors->first('tagID') }}</span>
            @endif
            <section type="submit" class="button_logIn">
                <button>Bewerken</button>
            </section>
        </form>
    </section>
</body>
</html>