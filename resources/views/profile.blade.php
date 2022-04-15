<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/profile.css">
    <title>Squidtags</title>
    <script src="/js/profile.js"></script>
</head>
<body>
    <img class="bg" src="img/bg.svg" alt="bg">
    <a href="/dashboard">
        <img class="arrow" src="img/arrow.svg" alt="back">
    </a>
    <h1 class="profile_title">profiel</h1>
    <section class="profile">
        <img id="profilePicture" class="picture" src="{{ $user->profilePicture }}" alt="">
        <!-- <img class="pencil_picture" src="/img/pencil.svg" alt="pencil">
        <section class="category">
            <h2 class="header">naam:</h2>
            <p class="text">{{$user->fname}} {{$user->lname}}</p>
            <img class="pencil" src="/img/pencil.svg" alt="pencil">
        </section>
        <section class="category">
            <h2 class="header">email:</h2>
            <p class="text">{{$user->email}}</p>
            <img class="pencil" src="/img/pencil.svg" alt="pencil">
        </section> -->
        <form  id="form" action="/profileUpdate" method="POST" class="login_form" autocomplete="off">
            @csrf
            <label for="profilePicture">Profiel Foto</label>
            <input type="text" id="profilePictureInput" placeholder="Profiel Foto" name="profilePicture" required value="{{ $user->profilePicture }}" autocomplete="false">
            @if ($errors->has('profilePicture'))
                <span class="text-danger">{{ $errors->first('profilePicture') }}</span>
            @endif
            <label for="Email">Email</label>
            <input type="email" id="Email" placeholder="Email" name="Email" value="{{ $user->email }}" required autofocus autocomplete="false">
            @if ($errors->has('Email'))
                <span class="text-danger">{{ $errors->first('Email') }}</span>
            @endif
            <label for="PhoneNumber">Telefoon Nummer</label>
            <input type="tel" id="PhoneNumber" pattern="[0-9]{10}" placeholder="Telefoon Nummer" name="PhoneNumber" required value="{{ $user->phoneNumber }}" autocomplete="false">
            @if ($errors->has('PhoneNumber'))
                <span class="text-danger">{{ $errors->first('PhoneNumber') }}</span>
            @endif
            <label for="Name">Name</label>
            <input type="text" id="Name" placeholder="Name" name="Name" required value="{{ $user->fname }} {{ $user->lname }}" autocomplete="false">
            @if ($errors->has('Name'))
                <span class="text-danger">{{ $errors->first('Name') }}</span>
            @endif
            <section class="buttons">
                <button type="submit" class="button">Update</button>
            </section>
        </form> 
        <a href="/logout"><button class="logout_button">Log uit</button></a>
    </section>
</body>
</html>