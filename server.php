<?php 
    if (isset($_POST['confirmButton'])) {
        
        $expDate = $_POST['expDate'];
        $cvv_entered = $_POST['cvvEntered'];
        $number_entered = $_POST['numberEntered'];

    function validateCard($number_entered, $cvv_entered){
            global $typeOfCard;
            
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
        if (preg_match($cardType['visa'], $number_entered) && preg_match($cvvType['visa'], $cvv_entered)) {
            $typeOfCard = 'Visa';
        } else if (preg_match($cardType['mastercard'], $number_entered) && preg_match($cvvType['mastercard'], $cvv_entered)) {
            $typeOfCard = 'MasterCard';
        } else if (preg_match($cardType['amex'], $number_entered) && preg_match($cvvType['amex'], $cvv_entered)) {
            $typeOfCard = 'Amex';
        } else {
            return false;
        }
    }  
    function validateDate($expDate){ 
            global $expired, $notExpired;
            
        $expDate = DateTime::createFromFormat('m/y', $_POST['expDate']);
        $currentDate = new DateTime('now');

        if ($expDate < $currentDate) {
            $expired = "expired";
        } else {
            $notExpired = "not expired";
        }
    }
    validateCard($number_entered, $cvv_entered);
    validateDate($expDate);
}

    
