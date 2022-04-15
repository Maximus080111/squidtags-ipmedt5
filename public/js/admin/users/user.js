window.onload = function() {
    let userList = [];
    for (let i = 0; i < userData.length; i++) {
        console.log(userData[i]);
        var tagItem = document.createElement("a");
        tagItem.href = "/admin/user/"+userData[i]["id"];

        var buttonItem = document.createElement("button");
        buttonItem.className = "card_tag_users";

        var H2Item = document.createElement("h2");
        H2Item.innerHTML = "Naam: " + userData[i]['fname'] + " " + userData[i]['lname'];
        H2Item.className = "card_tag_text";

        var H2Item2 = document.createElement("h2");
        H2Item2.innerHTML = "Email: " + userData[i]['email'];
        H2Item2.className = "card_tag_text_1";

        var imgItem = document.createElement("img");
        imgItem.className = "card_tag_img";
        imgItem.src = userData[i]["profilePicture"];

        buttonItem.appendChild(H2Item);
        buttonItem.appendChild(H2Item2);
        buttonItem.appendChild(imgItem);
        tagItem.appendChild(buttonItem);
        document.getElementById("js--tagList").appendChild(tagItem);
        userList[userList.length] = tagItem;
    }
    if(userData.length == 0){
        var TextElement = document.createElement("h1");
        TextElement.innerHTML = "U heeft nog geen gebruikers geregistreerd";
        TextElement.className = "noTagText";
        document.getElementById("js--tagList").appendChild(TextElement);
    }
    console.log(userList);

    let searchBar = document.getElementById("js--searchBar");

    searchBar.addEventListener('input', searchUpdate);

    function searchUpdate() {
        let value = document.getElementById("js--searchBar").value;
        for (let o = 0; o < userList.length; o++){
            let mail = userList[o].childNodes[0].childNodes[2].innerHTML.split(":")[1].toLowerCase();
            if(mail.includes(value.toLowerCase())){
                userList[o].style.display = "";
            } else {
                userList[o].style.display = "none";
            }

        }
    }
};