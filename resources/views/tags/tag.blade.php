<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/home.css">
    <title>Squidtags</title>
</head>
<body>
    <script>
        window.onload = function(){
            var isAdmin = {!! json_encode($isAdmin, JSON_HEX_TAG) !!};
            if(isAdmin){
                document.getElementById("js--ontkoppel").style.display = "none";
            }
        }
        function back(){ 
            history.back();
        }
    </script>
    <img class="bg" src="/img/bg.svg" alt="bg">
    <a onclick="back()"><img class="arrow clickable" src="/img/arrow.svg" alt="back"></a>
    <section class="header_text">
        <h1 class="header_h1">{{$tagData->TagName}}</h1>
        <img class="tag_img_change_1" src="/img/tag_taglist.svg" alt="">
    </section>
    <section class="section_info">
        <h2>Wat wilt u doen met deze tag?</h2>
        <section class="section_button">
            <a id="js--ontkoppel" href="/tag/{{ $tagData->id }}/ontkoppel"><button class="tag_button">tag ontkoppelen</button></a>
            <a href="/tag/{{ $tagData->id }}/changeTag"><button class="tag_button">tag aanpassen</button></a>
        </section>
    </section>
</body>
</html>