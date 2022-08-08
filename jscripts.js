function ccValidation(){
    var request;
    try{
        request = new XMLHttpRequest();
    } catch (tryMicrosoft) {
        try {
            request = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (otherMicrosoft) {
            try {
                request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch(failed){
                request = null;
            }
        }
    }
    var url = "server.php";
    var card_entered = document.getElementById('numberEntered-el').value;
    var date_entered = document.getElementById('expDate-el').value;
    var cvv_entered = document.getElementById('cvv-el').value;
    var vars = "numberEntered="+card_entered+"&expDate="+date_entered+"&cvvEntered="+cvv_entered;
    request.open("POST", url, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
            var return_data = JSON.parse(this.responseText);
            document.getElementById('validate').textContent = return_data;
        }
    }
    request.send(vars);
}

// readyState Values
    // 0: request not initialized
    // 1: server connection established
    // 2: request recieved
    // 3: processing request
    // 4: request finished and response is ready <- when we use onreadystatechange we wanna make sure we are on 4
    // HTTP Statuses
    // 200: "OK"
    // 403: "FORBIDDEN"
    // 404: "NOT FOUND"