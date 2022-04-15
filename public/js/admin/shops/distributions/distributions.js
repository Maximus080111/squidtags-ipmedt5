window.onload = function() {
    let distributionList = [];
    for (let i = 0; i < shopData.length; i++) {
        console.log(shopData[i]);
        if(shopData[i]["StoreName"] == shopName && shopData[i]["Adress"] != null) {
            var tagItem = document.createElement("a");
            tagItem.href = "/admin/shop/"+shopData[i]["StoreName"]+"/"+shopData[i]["id"];
    
            var buttonItem = document.createElement("button");
            buttonItem.className = "card_tag";
    
            var H2Item = document.createElement("h2");
            H2Item.className = "card_tag_text";
            H2Item.innerHTML = shopData[i]["StoreName"];
    
            var H2Item2 = document.createElement("h2");
            H2Item2.innerHTML = "Adress: " + shopData[i]['Adress'];
            H2Item2.className = "card_tag_text_data";
    
            var imgItem = document.createElement("img");
            imgItem.className = "card_tag_img";
            imgItem.src = shopData[i]["ImgLink"];
    
            buttonItem.appendChild(H2Item);
            buttonItem.appendChild(H2Item2);
            buttonItem.appendChild(imgItem);
            tagItem.appendChild(buttonItem);
            document.getElementById("js--tagList").appendChild(tagItem);
            distributionList[distributionList.length] = tagItem;
        }
    }
    if(distributionList.length == 0){
        var TextElement = document.createElement("h1");
        TextElement.innerHTML = "U heeft nog geen shops geregistreerd";
        TextElement.className = "noTagText";
        document.getElementById("js--tagList").appendChild(TextElement);
    }
    console.log(distributionList);

    let searchBar = document.getElementById("js--searchBar");

    searchBar.addEventListener('input', searchUpdate);

    function searchUpdate() {
        let value = document.getElementById("js--searchBar").value;
        for (let o = 0; o < distributionList.length; o++){
            let mail = distributionList[o].childNodes[0].childNodes[1].innerHTML.toLowerCase();
            console.log(mail);
            if(mail.includes(value.toLowerCase())){
                distributionList[o].style.display = "";
            } else {
                distributionList[o].style.display = "none";
            }

        }
    }
};