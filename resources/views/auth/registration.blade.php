@extends('layout')
  
@section('content')
<a href="/"><img class="arrow" src="img/arrow.svg" alt="back"></a>
    <section class="header_text">
        <h1 class="header_account">Account aanmaken</h1>
    </section>
    <section class="login_form">
        <form action="/post-registration" method="POST" autocomplete="off">
            @csrf
            <label for="fname">Voornaam</label>
            <input type="text" id="fname" placeholder="Voornaam" name="fname" required autofocus>
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
            <label for="lname">Achternaam</label>
            <input type="text" id="lname" placeholder="Achternaam" name="lname" required autofocus>
            @if ($errors->has('lname'))
                <span class="text-danger">{{ $errors->first('lname') }}</span>
            @endif
            <label for="phoneNumber">Telefoonnummer</label>
            <input type="tel" id="phoneNumber" pattern="[0-9]{10}" placeholder="0611223344" name="phoneNumber" required autofocus>
            @if ($errors->has('phoneNumber'))
                <span class="text-danger">{{ $errors->first('phoneNumber') }}</span>
            @endif
            <label for="email_address">E-mail</label>
            <input type="text" autocomplete="off" id="email_address" placeholder="E-mail" name="email" required autofocus>
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
            <label for="password">Wachtwoord</label>
            <input type="password" autocomplete="off" id="password" placeholder="Wachtwoord" name="password" required>
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
            <section class="button_account">
                <button type="submit">Account aanmaken</button>
            </section>
        </form>
    </section>
@endsection