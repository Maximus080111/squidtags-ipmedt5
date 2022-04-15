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
    <img class="bg" src="/img/bg.svg" alt="bg">
    <a href="/taglist"><img class="arrow" src="/img/arrow.svg" alt="back"></a>

    <section class="header_text">
        <img class="tag_img_change" src="/img/tag_taglist.svg" alt="rfid_tag">
    </section>
    <section class="section_info">
        <h2 class="tag_comfirm">Weet u zeker dat u de tag "{{ $tagData->TagName }}" wilt ontkoppelen</h2>
        <section class="section_button">
            <a href="/tag/{{ $tagData->id }}/ontkoppel/confirm"><button class="tag_button">Ja</button></a>
            <a href="/tag/{{ $tagData->id }}/ontkoppel/deny"><button class="tag_button">Nee</button></a>
        </section>
    </section>
</body>
</html>