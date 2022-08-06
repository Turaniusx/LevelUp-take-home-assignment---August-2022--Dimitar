<?php 
    if (isset($_POST['confirmButton'])) {
        
        
        $number_entered = $_POST['numberEntered'];
        function validateNumber($number_entered){
        global $type;
        

        $cardType = [
            'visa' => "/^4[0-9]{12}(?:[0-9]{3})?$/",
            'mastercard' => "/^5[1-5][0-9]{14}$/",
            'amex' => "/^3[47][0-9]{13}$/"
        ];
        if (preg_match($cardType['visa'], $number_entered)) {
            $type = 'Visa';
        } else if (preg_match($cardType['mastercard'], $number_entered)) {
            $type = 'MasterCard';
        } else if (preg_match($cardType['amex'], $number_entered)) {
            $type = 'Amex';
        } else {
            return false;
        }
    }   
        $expDate = $_POST['expDate'];
        function validateDate($expDate){ //a func to check if user input of date is expired or not
        
            global $expired, $notExpired;

            $currentDate = date('m/Y');
            $currentTime = strtotime($currentDate);
            if ($currentTime > $expDate) {
                $expired = "expired";
            } else {
                $notExpired = "not expired";
            }
              
       }
       
    validateNumber($number_entered);
    validateDate($expDate);
  
}
    
