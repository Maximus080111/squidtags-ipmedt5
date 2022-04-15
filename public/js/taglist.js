window.onload = function() {
    for (let i = 0; i < UserTagList.length; i++) {
        // console.log(UserTagList[i]["id"]);
        //a
           
        var tagItem = document.createElement("a");
        tagItem.href = "/tag/"+UserTagList[i]["id"];

        var buttonItem = document.createElement("button");
        buttonItem.className = "card_tag";

        var H2Item = document.createElement("h1");
        H2Item.className = "card_tag_text";
        H2Item.innerHTML = UserTagList[i]["TagName"];

        var H2Item2 = document.createElement("h2");
        H2Item2.innerHTML = "Tag Data: " + UserTagList[i]['TagData'];
        H2Item2.className = "card_tag_text_data";

        var imgItem = document.createElement("img");
        imgItem.className = "card_tag_img";
        imgItem.src = "/img/tag_taglist.svg";

        buttonItem.appendChild(H2Item);
        buttonItem.appendChild(H2Item2);
        buttonItem.appendChild(imgItem);
        tagItem.appendChild(buttonItem);
        document.getElementById("js--tagList").appendChild(tagItem);
    }
    if(UserTagList.length == 0){
        var TextElement = document.createElement("h1");
        TextElement.innerHTML = "U heeft nog geen tags geregistreerd";
        TextElement.className = "noTagText";
        document.getElementById("js--tagList").appendChild(TextElement);
    }
};


// id="email_address_fout" inputveld 1

// id="password_fout" inputveld 2

// <section class="mssg_fail">
//         <h1 class="mssg_fail_h1">Oeps!</h1>
//         <p class="mssg_fail_p">Het lijkt erop dat er iets is fout gegaan met je wachtwoord en/of email. Check of je beide velden goed heb ingevuld</p>
// </section>

// <a href="tag">
// <button class="card_tag">
//     <h2 class="card_tag_text">Tag van Thomas</h2>
//     <img class="card_tag_img" src="img/rfid.png" alt="">
// </button>
// </a>