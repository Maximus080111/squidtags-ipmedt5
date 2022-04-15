<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/homepage.css">
    <script src="js/main.js"></script>
    <title>Squidtags</title>
</head>
<body>
    <nav class="nav">
        <ul>
            <a href="#"><img src="img/home.svg" alt="Home"></a>
            <a href="/shops"><img src="img/store.svg" alt="store"></a>
            <a href="/taglist"><img src="img/tag.svg" alt="tags"></a>
            <a href="/profile"><img src="img/profile.svg" alt="profile"></a>
        </ul>
    </nav>
    <img class="bg" src="img/bg.svg" alt="bg">
    <section class="profile">
        <h2>Hallo,</h2>
        <h1>{{$user->fname}} {{$user->lname}}</h1>
        <a href="/profile"><img src="{{ $user->profilePicture }}" alt="profile"></a>
    </section>
    <h1>
    {{ session('success') }}
</h1>
    <section class="premium">
        <h1>Check out premium voordelen</h1>
        <img src="img/premium_tag.svg" alt="premium tag">
    </section>
    <section class="widgets">
        <h1>Widgets</h1>
        <section class="grid">
            <div class="lc_1">
                <p>aantal actieve wachtrijen</p>
                <img class="lc_img" src="img/icon_queue.svg" alt="icon queue">
                <h1>{{$data["amount"]}}</h1>
            </div>
            <div class="sc_1">
                <h2 class="sc_h2">Winkels</h2>
                <img class="sc_img" src="img/icon_store.svg" alt="icon store">
                <a href="/shops">
                    <span class="link"></span>
                </a>
            </div>
            <div class="sc_2">
                <h2 class="sc_h2">Tags</h2>
                <img class="sc_img" src="img/icon_tag.svg" alt="icon tag">
                <a href="/taglist">
                    <span class="link"></span>
                </a>
            </div>
            <div class="lc_2">
                <p>Laatst bezochte winkel</p>
                <img class="lc_img" src="img/icon_recent.svg" alt="icon recent">
                <h1>{{$data["lastVisit"]}}</h1>
            </div>
        </section>
    </section>
    <section>

    </section>
</body>
</html>