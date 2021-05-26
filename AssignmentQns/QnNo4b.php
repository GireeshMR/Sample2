<?php 
#Factorial of a number using loops
$n = readline("Enter the number\n");
$result=1;
for($i=1;$i<=$n;$i++)
{
    $result=$result*$i;

}
echo "Factorial of $n = $result\n";

?>