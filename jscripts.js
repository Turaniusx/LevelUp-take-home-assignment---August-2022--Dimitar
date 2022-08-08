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
        if (request.readyState == 4 && request.status == 200){
            var return_data = JSON.parse(request.responseText);
            document.getElementById('validate').textContent = return_data;
        }
    }
    request.send(vars);
}