window.onload = function() {
    console.log(ShopInfo["id"]);
    for (let i = 0; i < UserWachtrijen.length; i++) {
        if(UserWachtrijen[i]["shopID"] == ShopInfo["id"]){
            console.log("User Already in queue");
            document.getElementById("js--infoText").innerHTML = "U staat al in de wachtrij wilt u de wachtrij verlaten?";
            document.getElementById("js--queue-Ja").href = "/shops/"+ShopInfo["StoreName"]+"/"+ ShopInfo["id"] +"/wachtrij/leave";
        }
    }
};