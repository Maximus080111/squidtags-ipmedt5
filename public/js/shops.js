window.onload = function() {
    console.log(ShopList);
    for (let i = 0; i < ShopList.length; i++) {
        console.log(ShopList[i]);
        if(ShopList[i]["Adress"] == null && ShopList[i]["StoreName"] != ""){
            // console.log(UserTagList[i]["id"]);
            var tagItem = document.createElement("a");
            // tagItem.href = "/shops/"+ShopList[i]["id"];
            tagItem.href = "/shops/"+ShopList[i]["StoreName"]
            tagItem.className = "item";

            var imgItem = document.createElement("img");
            imgItem.className = "mini_img";
            imgItem.src = ShopList[i]['ImgLink'];
            console.log(ShopList[i]['ImgLink']);

            var storeName = document.createElement("h3");
            storeName.innerHTML = ShopList[i]["StoreName"];
            storeName.className = "adres_winkel";

            tagItem.appendChild(imgItem);
            tagItem.appendChild(storeName);
            document.getElementById("js--shopList").appendChild(tagItem);
        }
    }
    if(ShopList.length == 0){
        var TextElement = document.createElement("h1");
        TextElement.innerHTML = "Er zijn nog geen winkels toegevoegd";
        TextElement.className = "noTagText";
        document.getElementById("js--tagList").appendChild(TextElement);
    }
};