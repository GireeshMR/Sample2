<?php
$String1 = readline("Enter the string\n");
$Sarray = preg_split("/\s/", $String1);
echo "array of $String1\n";
print_r($Sarray);
?>