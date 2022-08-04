<?php  
    include_once 'server.php';
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
    <link rel="stylesheet" type="text/css" href="styles/cssStyles.css">
    
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
                    <input type="text" name="ownerNameInput" class="ownerNameInput" placeholder="Full Name..">
                </div>
                
                <div class="formGroup">
                    <p class="cardNumberP">Card Number</p>
                    <input type="text" name="numberEntered" class="cardNumberInput">
                    
                    
                </div>
                <div class="formGroup">
                    <p class="cvvP">CVV</p>
                    <input type="text" name="cvvInput" max="4" min="1" maxlength="4" id="cvv" class="cvvInput">
                </div>
            <div class="formGroup" id="expirationDate">
                <p class="expDateP">Expiration Date</p>
                <select name="months" id="selectMonth" class="monthSelector">
                    <option value="01">January</option>
                    <option value="02">February </option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <select name="years" id="selectYear" class="yearSelector">
                    <option value="23"> 2023</option>
                    <option value="24"> 2024</option>
                    <option value="25"> 2025</option>
                    <option value="26"> 2026</option>
                    <option value="27"> 2027</option>
                    <option value="28"> 2028</option>
                </select>
                
            </div>
            <div class="formGroup" id="creditCards">
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
                        echo "<p><green> $type detected, Credit card number is valid!</green></p>";
                    }else {
                        echo  "<p><red>Invalid card number!</red></p>";
                    }
                    if (empty($number_entered)){
                        echo "<p><red>Fill in the form</red></p>";
                    }
                }
                
            ?>
            </div>
                     
    </div>
                     
    <br><br>
    <p style="text-align: center;">Example cards:</p>
    <div class="example_cards">
        <table class="table">
            <thead class="thread">
                <tr>
                    <th>Type</th>
                    <th>CVV</th>
                    <th>Card Number</th>
                </tr>
            </thead>
            <tbody>
                <tr class="trs">
                    <td>Visa</td>
                    <td>172</td>
                    <td>4790 1245 6612 0712</td>
                </tr>
                <tr>
                    <td>Master Card</td>
                    <td>045</td>
                    <td>5780 0571 5811 6632</td>
                </tr>
                <tr>
                    <td>American Express</td>
                    <td>3489</td>
                    <td>3451 832066 30356</td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="jscript.js">

    </script>

</body>