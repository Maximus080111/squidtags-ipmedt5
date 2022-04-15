<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/homepage.css">
    <script src="#"></script>
    <title>Squidtags</title>
</head>
<body class="overlay_account">
    <img class="bg" src="img/bg.svg" alt="bg">
    <section class="profile">
        <h2>Hallo,</h2>
        <h1>Admin</h1>
    </section>
    <section class="shortcuts">
        <h1 class="header_section">Wat wilt u doen?</h1>
        <section class="grid_admin">
            <div class="lc_blue_admin">
                <p class="lc_p_admin_blue">Users bekijken</p>
                <img class="lc_img_admin" src="img/icon_recent_store.svg" alt="icon queue">
                <a href="/admin/user">
                    <span class="link"></span>
                </a>
            </div>
            <div class="lc_1_admin">
                <p class="lc_p_admin">Winkels bewerken</p>
                <img class="lc_img_admin" src="img/icon_store.svg" alt="icon queue">
                <a href="/admin/shop">
                    <span class="link"></span>
                </a>
            </div>
            <div class="lc_2_admin">
                <p class="lc_p_admin">Tags bewerken</p>
                <img class="lc_img_admin" src="img/icon_tag.svg" alt="icon queue">
                <a href="/admin/tag">
                    <span class="link"></span>
                </a>
            </div>
            <a href="/logout" class="logout_admin">Log uit</a>
        </section>
    </section>
</body>
</html>