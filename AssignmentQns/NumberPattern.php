<?php

$num = (int)readline("Enter the number\n");
for ($i=1; $i <=$num ; $i++) {
    for($j=0;$j<$i;$j++) 
   {
       echo"$i";
   }
   echo"\n";
}

for ($i=1; $i <=$num ; $i++) {
    for($j=1;$j<=$i;$j++) 
   {
       echo"$j";
   }
   echo"\n";
}


?>