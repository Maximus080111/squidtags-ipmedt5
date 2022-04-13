@extends('layout')
  
@section('content')
<a href="/"><img class="arrow" src="img/arrow.svg" alt="back"></a>
    <section class="header_text">
        <h1 class="header_h1">Log In</h1>
        <h2 class="error_msg">
            {{ session('success') }}
        </h2>
    </section>
    <section class="login_form">
        <form id="form" action="post-login" method="POST" autocomplete="off">
            @csrf
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email" placeholder="e-mail">
            @if ($errors->has('email'))
            <h2 class="text-danger">{{ $errors->first('email') }}</h2>
            @endif
            <label for="password">Wachtwoord</label>
            <input type="password" name="password" id="password" placeholder="wachtwoord">
            @if ($errors->has('password'))
            <h2 class="text-danger">{{ $errors->first('password') }}</h2>
            @endif
            <section class="button_logIn">
                <button>Log in</button>
            </section>
        </form>
    </section>
@endsection