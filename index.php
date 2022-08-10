<?php  
    include 'server.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,400;8..144,500;8..144,600;8..144,700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credit Card Validation</title>
    <link rel="stylesheet" href="styles/Styles.css">
</head>
<body>
    <div class="purchase-form">
        <div class="paymentForm">
            <div class="innerForm">
                <div class="h1">
                  <h1>Confirm Purchase</h1>
                </div> 
                <form method="post" action="index.php">
                <div class="formGroup">
                    <p class="nameP">Name</p>
                    <input type="text" name="ownerNameInput" class="ownerNameInput" placeholder="e.g. John/Jane Doe" required>
                </div>
                
                <div class="formGroup">
                    <p class="cardNumberP">Card Number </p><label id="validate" class="cardOutput"></label>
                    <input type="text" minlength="14" maxlength="16" onkeyup="checker();" name="numberEntered" class="cardNumberInput"
                    placeholder="e.g. 1234 5678 9123 0000" id="numberEntered-el" required >
                    
                    
                    
                </div>
                <div class="formGroup">
                    <p class="cvvP">CVV</p>
                    <input type="text" name="cvvEntered" max="4" min="1" maxlength="4" id="cvv-el" class="cvvInput" placeholder="e.g. 123" required>
                </div>
                <div class="formGroup">
                    <p class="expDateP">Expiration Date</p>
                    <input type="text" maxlength="5" class="dateSelector" name="expDate" placeholder="MM/YY" id="expDate-el" required>
                </div>
                <div class="formGroup" id="creditCards">
                    <img src="images/visa_logo.png" alt="visa" class="visa">
                    <img src="images/mastercard_logo.png" alt="mastercard" class="mastercard">
                    <img src="images/amex_logo.jpg" alt="amex" class="amex">
                </div>
                <div class="formGroup">
                    <button type="submit" name="confirmButton" class="confirmButton" id="confirmPurchase">Confirm</button>
                </div>
            </form>
            </div>
        </div>  
            <div class="detector">
            <?php 
                if (isset($_POST['confirmButton'])){
                    if (validateCard($number_entered, $cvv_entered) !== false){
                        echo '<p style="color: #3ef238; font-weight: bold;">' . $typeOfCard . ' validated!</p>';
                    } else {
                        echo  '<p style="color: #fc250d; font-weight: bold;"><u>Your Credit Card is not valid!</u></p>';
                    }
                    if (validateDate($expDate) !== false) {
                        echo '<p style="color: #fc250d; font-weight: bold;"><u>' . $expired . '</u></p>';
                    }
                }
            ?>
            </div>
                     
    </div>
                     
    
    <script src='jscripts.js'>
        
    </script>

</body>