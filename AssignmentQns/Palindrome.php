<?php
    $string = readline("enter the string \n");
    $j= strlen($string)-1;
    $count=0;

    for ($i=0; $i <=$j ; $i++) 
    {
        if($string[$i]!=$string[$j])
        {
            $count=1;
            break;
        }
        $j--;
    }
        if($count==1)
        echo"$string is not palindrome \n";
        else
        echo"$string is palindrome \n";

?>