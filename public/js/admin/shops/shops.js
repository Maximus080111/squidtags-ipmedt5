window.onload = function() {
    let shopList = [];
    let shopElements = []
    for (let i = 0; i < shopData.length; i++) {
        console.log(shopData[i]);
        let shopLength = shopList.length;
        if(shopData[i]["id"] != 1){
            if(!shopList.includes(shopData[i]["StoreName"])) {
                shopList[shopLength] = shopData[i]["StoreName"];
                var tagItem = document.createElement("a");
                tagItem.href = "/admin/shop/"+shopData[i]["StoreName"];
        
                var buttonItem = document.createElement("button");
                buttonItem.className = "card_tag_shops";
        
                var H2Item = document.createElement("h2");
                H2Item.className = "card_tag_text";
                H2Item.innerHTML = shopData[i]["StoreName"];
                
                var deleteItem = document.createElement("a");
                deleteItem.href = "/admin/shop/remove/"+shopData[i]["id"]

                var imgItem = document.createElement("img");
                imgItem.className = "card_tag_img";
                imgItem.src = "/img/trash.svg";
                imgItem.alt = "trash";
    
                var rmItem = document.createElement("a");
                rmItem.href = "/admin/shop/remove/"+shopData[i]["id"];
                
                deleteItem.appendChild(imgItem);
                buttonItem.appendChild(H2Item);
                buttonItem.appendChild(deleteItem);
                tagItem.appendChild(buttonItem);
                document.getElementById("js--tagList").appendChild(tagItem);
                shopElements[shopElements.length] = tagItem;
            }
        }
    }
    if(shopData.length == 0){
        var TextElement = document.createElement("h1");
        TextElement.innerHTML = "U heeft nog geen tags geregistreerd";
        TextElement.className = "noTagText";
        document.getElementById("js--tagList").appendChild(TextElement);
    }
    console.log(shopList);

    let searchBar = document.getElementById("js--searchBar");

    searchBar.addEventListener('input', searchUpdate);

    function searchUpdate() {
        let value = document.getElementById("js--searchBar").value;
        for (let o = 0; o < shopElements.length; o++){
            let shopName = shopElements[o].childNodes[0].childNodes[0].innerHTML.toLowerCase();
            console.log(shopName);
            if(shopName.includes(value.toLowerCase())){
                shopElements[o].style.display = "";
            } else {
                shopElements[o].style.display = "none";
            }

        }
    }
};