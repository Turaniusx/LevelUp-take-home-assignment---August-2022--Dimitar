<?php 
    if (isset($_POST['confirmButton'])) {
        
        $cvv_entered = $_POST['cvvEntered'];
        $number_entered = $_POST['numberEntered'];
        function validateCard($number_entered, $cvv_entered){
        global $typeOfCard, $typeOfCvv;
        
        
        $cvvType = [
            'visa' => "/^[0-9]{3}$/",
            'mastercard' => "/^[0-9]{3}$/",
            'amex' => "/^[0-9]{3,4}$/"
        ];
        $cardType = [
            'visa' => "/^4[0-9]{12}(?:[0-9]{3})?$/",
            'mastercard' => "/^5[1-5][0-9]{14}$/",
            'amex' => "/^3[47][0-9]{13}$/"
        ];
        if (preg_match($cardType['visa'], $number_entered)) {
            $typeOfCard = 'Visa';
        } else if (preg_match($cardType['mastercard'], $number_entered)) {
            $typeOfCard = 'MasterCard';
        } else if (preg_match($cardType['amex'], $number_entered)) {
            $typeOfCard = 'Amex';
        } else {
            return false;
        }

        if (preg_match($cvvType['visa'], $cvv_entered)) {
            $typeOfCvv = 'Visa';
        } else if (preg_match($cvvType['mastercard'], $cvv_entered)){
            $typeOfCvv = 'Mastercard';
        } else if (preg_match($cvvType['amex'], $cvv_entered)) {
            $typeOfCvv = 'Amex';
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
       
    validateCard($number_entered, $cvv_entered);
    validateDate($expDate);
  
}
    
