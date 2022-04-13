@extends('layout')
  
@section('content')
    <a href="/"><img class="back_arrow" src="img/Back.svg" alt="back_arrow"></a>
    <section class="account_top">
        <h1 class="account_h1">Log In</h1>
    </section>
    <section class="mssg_fail">
        <h1 class="mssg_fail_h1">Oeps!</h1>
        <p class="mssg_fail_p">Het lijkt erop dat er iets is fout gegaan met je wachtwoord en/of email. Check of je beide velden goed heb ingevuld</p>
    </section>
    <form action="post-login" method="POST" class="form" autocomplete="off">
        @csrf
        <label for="email_address" class="label_input">E-Mail Address</label>
        <input type="text" id="email_address_fout" placeholder="  Ongeldig email" class="input_fail" name="email" required autofocus autocomplete="false">
        @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
        <label for="password" class="label_input">Password</label>
        <input type="password" id="password_fout" class="input_fail" placeholder="  Ongeldig wachtwoord" name="password" required autocomplete="false">
        @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
        <div class="text-center">
            <button type="submit" class="account_button">Log in</button>
        </div>
    </form>
    <!-- <a href=><button type="submit" class="account_button">Log In</button></a> -->
    <h2 class="log_bottom_h2">Heb je nog geen account?</h2>
    <p class="log_bottom_p"><a href="/registration"> Maak account aan</a></p>
@endsection