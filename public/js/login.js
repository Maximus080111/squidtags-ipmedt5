window.onload = function() {
    errorMessage(data);
};

function errorMessage(data){
    if(data != null){
        const errorMessage = document.createElement("section");
        errorMessage.className = "mssg_fail";
        const newH1 = document.createElement("h1");
        newH1.className = "mssg_fail_h1";
        newH1.innerHTML = "Oeps!";
        const newP = document.createElement("p");
        newP.className = "mssg_fail_p";
        newP.innerHTML = data;
        errorMessage.appendChild(newH1);
        errorMessage.appendChild(newP);
        document.body.insertBefore(errorMessage, document.getElementById('form'));
        document.getElementById("email_address").className = "input_fail";
        document.getElementById("password").className = "input_fail";
    }
}

// id="email_address_fout" inputveld 1

// id="password_fout" inputveld 2

// <section class="mssg_fail">
//         <h1 class="mssg_fail_h1">Oeps!</h1>
//         <p class="mssg_fail_p">Het lijkt erop dat er iets is fout gegaan met je wachtwoord en/of email. Check of je beide velden goed heb ingevuld</p>
// </section>