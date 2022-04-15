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
    <img class="bg" src="/img/bg.svg" alt="bg">
    <a href="/taglist"><img class="arrow" src="/img/Back.svg" alt="back"></a>
    <section class="header_text">
        <h1 class="header_h1">Tag aanmaken</h1>
        <h2 class="error_msg">
            {{ session('success') }}
        </h2>
    </section>
    <section class="login_form">
    <form action="/post-newTag" method="POST" autocomplete="off">
        @csrf
        <label for="TagName" class="label_input">Tag Name</label>
        <input type="text" id="TagName" class="input" placeholder="Tag Name" name="TagName" required autofocus>
        @if ($errors->has('TagName'))
            <span class="text-danger">{{ $errors->first('TagName') }}</span>
        @endif
        <label for="TagData" class="label_input">Tag Data</label>
        <input type="text" id="TagData"class="input" placeholder="Tag Data" name="TagData" required autofocus>
        @if ($errors->has('TagData'))
            <span class="text-danger">{{ $errors->first('TagData') }}</span>
        @endif
        <section class="button_logIn">
            <button>Tag toevoegen</Button>
        </section>
        <h2 class="header_h2">Selecteer het veld tagdata veld en scan de tag om info toe te voegen. Heeft u geen tag bij de hand vult dan data in naar u wens. Dit kan u later altijd veranderen.</h2>
        <!--<button type="submit" class="button_logIn">
            Tag Toevoegen
        </button>-->
    </form>
  </section>
</body>
</html>