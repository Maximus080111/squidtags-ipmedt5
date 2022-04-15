window.onload = function() {
    let tagList = [];
    for (let i = 0; i < tagData.length; i++) {
        console.log(tagData[i]);
        var tagItem = document.createElement("a");
        tagItem.href = "/admin/tag/"+tagData[i]["id"];

        var ownerID = tagData[i]["user_id"];
        var ownerName;
        var ownerMail;
        for (let o = 0; o < userData.length; o++) {
            if(ownerID == userData[o]["id"]){
                ownerName = userData[o]["fname"] + " " + userData[o]["lname"];
                ownerMail = userData[o]["email"];
            }
        }

        var buttonItem = document.createElement("button");
        buttonItem.className = "card_tag_tags";

        var sectiongridItem = document.createElement("section");
        sectiongridItem.className = "grid-text";

        var H2Item = document.createElement("h2");
        H2Item.innerHTML = "Tag Naam: " + tagData[i]["TagName"];
        H2Item.className = "card_text_text";

        var H2Item2 = document.createElement("h2");
        H2Item2.innerHTML = "Data: " + tagData[i]['TagData'];
        H2Item2.className = "card_tag_text_data_1";

        var H2Item3 = document.createElement("h2");
        H2Item3.innerHTML = "Mail: " + ownerMail;
        H2Item3.className = "card_tag_text_data_2";

        var H2Item4 = document.createElement("h2");
        H2Item4.innerHTML = "Gebruikers Naam: " + ownerName;
        H2Item4.className = "card_tag_text_data_3";

        var imgItem = document.createElement("img");
        imgItem.className = "card_tag_img";
        imgItem.src = "/img/tag_taglist.svg";

        sectiongridItem.appendChild(H2Item2);
        sectiongridItem.appendChild(H2Item3);
        sectiongridItem.appendChild(H2Item4);
        sectiongridItem.appendChild(imgItem);
        sectiongridItem.appendChild(H2Item);
        buttonItem.appendChild(sectiongridItem);
        tagItem.appendChild(buttonItem);
        document.getElementById("js--tagList").appendChild(tagItem);
        tagList[tagList.length] = tagItem;
    }
    if(shopData.length == 0){
        var TextElement = document.createElement("h1");
        TextElement.innerHTML = "U heeft nog geen tags geregistreerd";
        TextElement.className = "noTagText";
        document.getElementById("js--tagList").appendChild(TextElement);
    }
    console.log(tagList);

    let searchBar = document.getElementById("js--searchBar");

    searchBar.addEventListener('input', searchUpdate);

    function searchUpdate() {
        let value = document.getElementById("js--searchBar").value;
        for (let o = 0; o < tagList.length; o++){
            let mail = tagList[o].childNodes[0].childNodes[0].childNodes[1].innerHTML.split(":")[1].toLowerCase();
            if(mail.includes(value.toLowerCase())){
                tagList[o].style.display = "";
            } else {
                tagList[o].style.display = "none";
            }

        }
    }
};