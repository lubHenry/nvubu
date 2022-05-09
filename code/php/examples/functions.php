<?php
//detects and assigns short forms for thousands,millions,billions etc
if(!function_exists('numberShortner')){
    function numberShortener($number){
        $value = "";
        if($number<999){
            $value = $number;
        }elseif((1000000>$number)&&($number>999)){
            $value = (number_format(($number/1000),1))."K";
        }elseif (($number>=1000000)&&($number<1000000000)){
            $value = (number_format(($number/1000000),1))."M";
        }elseif ($number>=1000000000){
            $value = (number_format(($number/1000000000),1))."B";
        }

        return $value;
    }
}




?>