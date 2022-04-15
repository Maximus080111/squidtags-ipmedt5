@extends('admin.shop.distributions.store.store')
  
@section('shop')
    <div class="overlay_account"></div>
    <a href="/"><img class="back_arrow" src="img/Back.svg" alt="back_arrow"></a>
    <section class="account_top">
        <h1 class="account_h1">Log In</h1>
    </section>
    <form  id="form" action="post-shop-update" method="POST" class="form" autocomplete="off">
        @csrf
        <label for="Adress" class="label_input">Adress</label>
        <input type="text" id="Adress" placeholder="Adress" class="input" name="Adress" value="{{ $data['shops']->Adress }}" required autofocus autocomplete="false">
        @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
        <label for="password" class="label_input">Password</label>
        <input type="password" id="password" class="input" placeholder="  password" name="password" required autocomplete="false">
        @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
        <div class="text-center">
            <button type="submit" class="account_button">Log in</button>
        </div>
    </form>
    <h2 class="log_bottom_h2">Heb je nog geen account?</h2>
    <p class="log_bottom_p"><a href="/registration"> Maak account aan</a></p>
@endsection

<!--
    Adress
    MaxVisit
    AverageTime
    ImgLink
-->