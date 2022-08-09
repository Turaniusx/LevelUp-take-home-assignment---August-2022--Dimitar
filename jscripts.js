var card_entered = document.getElementById('numberEntered-el').value;


function checker(){
    
    let request = new XMLHttpRequest();
    
    request.open('GET', 'index.php', true);
    
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
            card_entered = new RegExp('/^4[0-9]{12}(?:[0-9]{3})?$/')
            if (match(card_entered) == true) {
                var output = this.responseText;
                output += "&#10004;&#65039;"
                document.getElementById('validate').innerHTML = output;
            }
            
        } else {
            output += "&#10060;";
        }
    }
    request.send();
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