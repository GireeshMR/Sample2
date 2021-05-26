<?php
$String1 =readline("Enter the string\n");
$String2 ="";
for($i =0;$i<strlen($String1)-1 ;$i++)
{
    $String2 =$String2.$String1[$i]." ";

}
$String2=$String2.$String1[$i];
echo"$String1 with Spaces\n$String2\n";

$Sarray = preg_split ("/\s/" , $String2);
echo"array after removing Spaces from $String2\n";
print_r($Sarray);

?>