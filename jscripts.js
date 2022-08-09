var card_entered = document.getElementById('numberEntered-el').value;
var date_entered = document.getElementById('expDate-el').value;
var cvv_entered = document.getElementById('cvv-el').value;

function ccValidation(){
    
    let request = new XMLHttpRequest();
    
    var vars = "numberEntered="+card_entered+"expDate="+date_entered+"cvvEntered="+cvv_entered;
    request.open('POST', 'server.php', true);
    
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
            var output = this.responseText;
            output += "&#10004;&#65039;"
            document.getElementById('validate').innerHTML = output;
        } else {
            output += "&#10060;";
        }
    }
    request.send(vars);
}










// readyState Values
    // 0: request not initialized
    // 1: server connection established
    // 2: request recieved
    // 3: processing request
    // 4: request finished and response is ready
    // HTTP Statuses
    // 200: "OK"
    // 403: "FORBIDDEN"
    // 404: "NOT FOUND"