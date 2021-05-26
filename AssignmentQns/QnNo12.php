<?php

$string = readline("Enter the String ");
if (preg_match('/^([A-Z]){5}([0-9]){4}([A-Z]){1}?$/', $string)) {
    echo "The given string is PAN card number";
} elseif (preg_match('/[0-9]{10}/', $string) && strlen($string) == 10) {
    echo "The given String is Phone number";
} elseif (preg_match('/[0-9]{12}/', $string) && strlen($string) == 12) {
    echo "The given String is an Aadhar card Number";
} elseif (preg_match('/[0-9]{16}/', $string) && strlen($string) == 16) {
    echo " The given String is Credit Card Number";
}
elseif (preg_match('/^([\w]+)(\.[\w]+)*@([\w]+\.)+[a-z]{2,3}$/', $string)) {
    echo "The Sting is an Email";
} 
else
echo "The string is random sentance"
?>