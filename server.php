<?php 
    if (isset($_POST['confirmButton'])) {
        
        $number_entered = $_POST['numberEntered'];
        function validateNumber($number_entered){
        global $type;

        $cardType = [
            'visa' => "/^4[0-9]{12}(?:[0-9]{3})?$/",
            'mastercard' => "/^5[1-5][0-9]{14}$/",
            'amex' => "/^3[47][0-9]{13}$/",
        ];
        if (preg_match($cardType['visa'], $number_entered) == true) {
            $type = "visa";
            return 'visa';
        } else if (preg_match($cardType['mastercard'], $number_entered) == true) {
            $type = "mastercard";
            return 'mastercard';
        } else if (preg_match($cardType['amex'], $number_entered) == true) {
            $type = "amex";
            return 'amex';
            
        } else {
            return false;
        }
    }
    validateNumber($number_entered);
  
    }
    
