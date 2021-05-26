
<?php
#Factorial of a number using recurtion
function factorial($n)
{   
    if($n == 0)
    {
        return 1;
    }
    return $n * factorial($n-1);
}

$n = readline("Enter the number\n");
echo "Factorial of $n =".factorial($n);
?>