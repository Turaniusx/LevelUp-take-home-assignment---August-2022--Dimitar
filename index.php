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
                    <input type="text" name="ownerNameInput" class="ownerNameInput" placeholder="e.g. John/Jane Doe">
                </div>
                
                <div class="formGroup">
                    <p class="cardNumberP">Card Number</p>
                    <input type="text" minlength="14" maxlength="16" name="numberEntered" class="cardNumberInput"
                    placeholder="e.g. 1234 5678 9123 0000" id="cardNumber-el">
                    
                    
                </div>
                <div class="formGroup">
                    <p class="cvvP">CVV</p>
                    <input type="text" name="cvvInput" max="4" min="1" maxlength="4" id="cvv" class="cvvInput" placeholder="e.g. 123">
                </div>
                <div class="formGroup" id="expirationDate">
                <p class="expDateP">Expiration Date</p>
                <input type="text" maxlength="5" class="dateSelector" name="expDate" placeholder="MM/YY">
                
                
                </div>
            <div class="formGroup" id="creditCards">
                <img src="images/visa-logo.png" alt="visa" class="visa">
                <img src="images/MasterCard-Logo1.png" alt="mastercard" class="mastercard">
                <img src="images/amex_card.jpg" alt="amex" class="amex">
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
                     if (validateNumber($number_entered) !== false){
                        echo "<p>$type detected, Credit card number is valid!</p>";
                        
                    }else {
                        echo  "<p>Invalid card number!\t</p>";
                        
                    }
                    if (empty($number_entered && $expDate)){
                        echo " ". "<p>/Fill in the form</p>";
                    }
                    if (validateDate($expDate) !== false) {
                        echo "<p>$expired</p>";
                    } else {
                        echo "<p>$notExpired</p>";
                    }
                    
                   
                    
                }
        
                
                
            ?>
            </div>
                     
    </div>
                     
    
    <script src="jscript.js">

    </script>

</body>