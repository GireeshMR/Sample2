<?php

/******************** IPL interface Started **************************/

interface IPL{
    public const year = 2021;
    public function display();
}

/******************** IPL interface ended **************************/

# trait Playes contains the player name and main Skill of the Player
trait Players{
    
    Private $Player_name;
    Private $Player_type;

    #getter and setter methods of Player_name
    public function setPlayer_name($Player_name)
    {
        $this->Player_name[count($Player_name)] = $Player_name;
    }
    public function getPlayer_name()
    {
       return $this->Player_name ;
    }

    #getter and setter methods of Player_type
    public function setPlayer_type($Player_type)
    {
        $this->Player_type[count($Player_type)] = $Player_type;
    }
    public function getPlayer_type($Player_type)
    {
        return $this->Player_type;
    }

} //end of Trait PLayer

//**************** Teams Class Started*********************

class teams{
    private $Team_name;
    private $captain;
    private $matches_played;
    private $matches_won;
    private $matches_lost;
    private $Points;
    use Players;

    #cunstructor for teams
    public function __construct($Team_name)
    {
        $this->Team_name = $Team_name;
        //$n=readline("Enter the number of Players in $Team_name ");
       
        # try and catch block if the value of $n is less than 10
       /* try{
            if($n<11)
        {
            $message ="Total number of players should be greater than 10 in ".$this->getTeam_name();
            throw new Exception();
        }
        }
        catch (Exception $e1)
        {   echo "You have entered a wrong number \n";
            $n=readline("Enter the total number of players (value must be greater than 10 )");
        }*/

        /* *********For Taking input of all the Players name in the Team******
        for($i=0;$i<$n;$i++)
        {   
            $this->Player_name[$i] = readline("Enter the name of Player ".($i+1)." ");
            $this->Player_type[$i] = readline("Enter the skill of".$this->Player_name[$i] ."(Batting or Bowling or All rounder)");
        }
        */
        
        //***echo"Enter the Captain Name of ". $this->getTeam_name() ." ";
       
        #initializing the $captain variable
        //***$this->setCaptain(readline());
        
        #initializing the $matchesplayed variable
        $this->matches_played=0;
        
        #intializing the Matches won
        $this->matches_won = 0;
        
        #intializing the Matches lost
        $this->matches_lost = $this->matches_played - $this->matches_won; 
        
        #intializing the points of the team
        $this->Points=$this->matches_won*2;
        
    }

    #getter and setter methods of Team_name
    public function getTeam_name()
    {
        return $this->Team_name;
    }
    public function setTeam_name($Team_name)
    {
        $this->Team_name =$Team_name;
    }

    #getter and setter methods of Captain
    public function getCaptain()
    {
       return $this->captain;
    }
    public function setCaptain($captain)
    {
        $this->captain=$captain;
    }

    #getter and setter methods of $Matches_played
    public function getMatches_played()
    {
        return $this->matches_played;
    }
    public function setMatches_played($Matches_played)
    {
        $this->matches_played=$Matches_played;
    }
    #updating variable if the match is won
    public function setMatch_Won()
    {
        $this->matches_won++;
        $this->matches_played++;
        $this->Points+=2;
    }
    public function getMatches_won()
    {
        return $this->matches_won;
    }
    public function getMatches_lost()
    {
        return $this->matches_lost;
    }

    #updating variable if the match is lost
    
    public function setMatch_lost()
    {
        $this->matches_lost++;
        $this->matches_played++;
        
    }

    # function to display all the players is the team
    
    public function display_players()
    {
        echo"The list of Players in $this->Team_name \n";
        $n=count($this->Player_type);
        for($i=0;$i<$n;$i++)
        {
            echo"$this->Player_name\n";
        }

    }

    #function to display Team Details

    public function display_Team_stats()
    {
        echo"*********** $this->Team_name ************\n";
        echo"Mathes Played = $this->matches_played \n";
        echo"Matches Won   = $this->matches_won\n";
        echo"Matches Lost  = $this->matches_lost\n";
        echo"Team Points   = $this->Points\n";


    }

    #getter Function for Points
    public function getpoint()
    {
        return $this->Points;
    }


}
//**************** Teams Class ended*********************

//**************************** Matches Class Started ************************/

class matches implements IPL{
    private static $initial_Date = array("Day"=>01,"Month"=>"Apr","Year"=>IPL::year);
   
    private static $normal_match_no = 1;
    private static $Qualifier_match_no = 1;
    private static $final_match_no = 1;
    private $var;

    private $Match_type;
    private $Match_No;
    private $Team1;
    private $Team2;
    private $venue;
    private $Date = array("Day"=>0,"Month"=>"Apr","Year"=>IPL::year);
    private $time = array("hour"=>7,"minutes"=>30);
    private $result = " Match is not yet played ";
    private $winner = " Match is not yet played ";

/***************Constructor for Matches***************** */
    
    public function __construct($Team1,$Team2,$Match_type,$venue)
    {   $monthS =array("Apr","May","June");
        $count=1;
        if($Match_type == "Normal")
        {
            $Match_No = matches::$normal_match_no++;
        }
            if($Match_type == "Playoff")
        {   $Match_No = matches::$Qualifier_match_no++;
        }
        else if($Match_type == "Final")
        {
            $Match_No = matches::$final_match_no++;
        }
            
            $this->Match_type = $Match_type ;
            $this->Team1 = $Team1->getTeam_name();
            $this->Team2 = $Team2->getTeam_name();
            $this->venue = $venue;
            if(matches::$initial_Date["Day"]<=30)
            {
                matches::$initial_Date["Day"]+=2;
                $this->Date = matches::$initial_Date;
            }
            else
            {
                matches::$initial_Date["Day"] = 1;
                matches::$initial_Date["month"] = $monthS[$count++];

            }
            if(rand(1,2)==1)
            {
                $this->Winner = $this->Team1;
                $this->result = $Team1->getTeam_name(). " Won the match ";
                $this->var=1;
            }
            else
            {
            $this->Winner= $this->Team2;
            $this->result = $Team2->getTeam_name(). " Won the match ";
            $this->var=2;
           
        }  
    }
    public function getVar(){
        return $this->var;

    }
    public function getWinner(){
        return $this->winner;
    }

 

   #overriding display() of IPL interface
    public function display()
    {
      echo"************* Match Details **************\n";  
    }


    /****************Function overloading ******************/

    public function __call($name,$args)
    {
        if($args==1 && method_exists($this,$fun=($name)."1"))
        {
            return call_user_func_array($name,$args);
        }
        else{
            echo"The method is not Exists\n";
            exit;
        }
        
    }

    public function match_details1($match_no)
    {   $this->display();
        echo "IPL 2021 Match $this->Match_No\n";
        echo $this->Team1." v/s ".$this->Team2."\n";
        echo "Venu: $this->venue\n";
        echo "Date: ".$this->Date["Day"] ." " .$this->Date["Month"]." " . $this->Date["Year"]."\n";
        echo "Time: ". $this->time["hour"]." : ".$this->time["minutes"]."\n";
        echo "Result: ".$this->result ."\n\n";

    }

    public function match_details($match_type,$match_no)
    {
        $this->display();
        if($match_type == "Normal")
        {echo "IPL 2021 Match $this->Match_No\n";
        }
        else if($match_type == "Playoff")
        {
            echo "IPL 2021 Playoff Match $this->Match_No\n";
        }
        else if($match_type== "Final")
        {
            echo "IPL 2021 Final Match\n";
        }
        else
        throw new Exception();
        

        echo $this->Team1." v/s ".$this->Team2."\n";

        echo "Venu: $this->venue\n";
        echo "Date: ".$this->Date["Day"] ." " .$this->Date["Month"]." " . $this->Date["Year"]."\n";
        echo "Time: ". $this->time["hour"]." : ".$this->time["minutes"]." pm\n";
        echo "Result: ".$this->result."\n\n";

    }

}

/*************************Matches Class ended ***********************/

//Swapping to elements
function swap( &$var1 ,&$var2)
{
   $temp = $var1;
   $var1 = $var2;
   $var2 = $temp;
}

//Creating partition for QuickSortOfTeams

function partition (&$Team, $low, $high)
{
    
    $pivot = $Team[$high]->getpoint();  
 
    $i = ($low - 1);   

    for ($j = $low; $j <= $high- 1; $j++)
    {
        
        if ($Team[$j]->getpoint() < $pivot)
        {
            $i++;   
            swap ($Team[$i] , $Team[$j]);
        }
    }
    swap ($Team[$i + 1] ,$Team[$high]);
    return ($i + 1);
}

//Quick sort function to sort Array of teams based on Points

function QuickSortTeams(&$Team,$low,$high)
{
    if ($low < $high)
    {
        
        $pi = partition($Team, $low, $high);

        QuickSortTeams($Team, $low, $pi - 1);  
        QuickSortTeams($Team, $pi + 1, $high); 
    }

}

// Function that can schedule matches and results on it's own

function generate_matches($n,&$Team)
{
    $matches = array();
    $Venue = array("bangalore","Mumbai","Chennai","Hyderabad");
    $i=0;    
    
    #********Creating Normal Matches**********

    for($j=0;$j<$n;$j++)
        {
            for($k=$j+1; $k<$n; $k++)
            {
                
        $matches[$i] = new matches($Team[$j],$Team[$k],"Normal",$Venue[rand(0,3)]);
             if(  $matches[$i]->getVar() == 1 )
             { 
                 $Team[$j]->setMatch_Won();
                 $Team[$k]->setMatch_lost();
             }
             else
             {
                $Team[$k]->setMatch_Won();
                $Team[$j]->setMatch_lost();
             }
             $i++;

        }
    }
    /********************Sorting Teams based on Points *******************/
    QuickSortTeams($Team,0,count($Team)-1);

    #********Creating final Matches**********
    $matches[$i] = new matches($Team[count($Team)-1],$Team[count($Team)-2],"Playoff",$Venue[rand(0,3)]);
    $matches[$i+1] = new matches($Team[count($Team)-3],$Team[count($Team)-4],"Playoff",$Venue[rand(0,3)]);
    if($matches[$i]->getVar()==1)
    {
        if($matches[$i+1]->getVar()==1)
        {
            $matches[$i+2]=new matches($Team[count($Team)-2],$Team[count($Team)-4],"Playoff",$Venue[rand(0,3)]);
            if($matches[$i+2]->getVar()==1)
            {
                $matches[$i+3]=new matches($Team[count($Team)-1],$Team[count($Team)-2],"Final",$Venue[rand(0,3)]);
            }        
            else
            $matches[$i+3]=new matches($Team[count($Team)-1],$Team[count($Team)-4],"Final",$Venue[rand(0,3)]);
        }
        else
        {   
               $matches[$i+2]=new matches($Team[count($Team)-2],$Team[count($Team)-3],"Playoff",$Venue[rand(0,3)]);
               if($matches[$i+2]->getVar()==1)
            {
                $matches[$i+3]=new matches($Team[count($Team)-1],$Team[count($Team)-2],"Final",$Venue[rand(0,3)]);
            }        
            else
            $matches[$i+3]=new matches($Team[count($Team)-1],$Team[count($Team)-3],"Final",$Venue[rand(0,3)]);
        }
    }
    else
    {
        if($matches[$i+1]->getVar()==1)
        {
            $matches[$i+2]=new matches($Team[count($Team)-1],$Team[count($Team)-4],"Playoff",$Venue[rand(0,3)]);
            if($matches[$i+2]->getVar()==1)
            {
                $matches[$i+3]=new matches($Team[count($Team)-2],$Team[count($Team)-1],"Final",$Venue[rand(0,3)]);
            }        
            else
            $matches[$i+3]=new matches($Team[count($Team)-2],$Team[count($Team)-4],"Final",$Venue[rand(0,3)]);        
        }
        else
        {   
               $matches[$i+2]=new matches($Team[count($Team)-1],$Team[count($Team)-3],"Playoff",$Venue[rand(0,3)]);
               if($matches[$i+2]->getVar()==1)
            {
                $matches[$i+3]=new matches($Team[count($Team)-2],$Team[count($Team)-1],"Final",$Venue[rand(0,3)]);
            }        
            else
            $matches[$i+3]=new matches($Team[count($Team)-2],$Team[count($Team)-4],"Final",$Venue[rand(0,3)]);
        }

    }
    return $matches;
}

/*********************** Displaying Points Details **********************/

function Display_Points_Table($Teams)
{
    echo"********************Points Table*********************\n";
    echo "Team Name     Matches played       Matches won       Matcheslost           Team Points\n";
    
    foreach(array_reverse($Teams) as $Team)
    {
        echo $Team->getTeam_name()."                      ".$Team->getMatches_played()."                  ".$Team->getMatches_won().
        "                 ".$Team->getMatches_played()-$Team->getMatches_Won()."                    ".$Team->getpoint()."\n";
    }
    echo "\n\n";
}

/********************* function for Displaying all the teams **********************/

function display_Teams_Name($Teams)
{$i=1;
    foreach($Teams as $Team)
    {
        echo "$i ". $Team->getTeam_name()."\n";
        $i++;
    }
}


/***************************Main block *****************************/

#creating Array of Teams



$Team = array();
$n = readline(" Enter the number of teams ");    
for($i=0;$i<$n;$i++)    
    {   
        $Team_name = readline("Enter name of the Team ");
        $Team[$i] = new teams($Team_name);
    }
   $matches = array();
   $matches = generate_matches($n,$Team);
do{$value=true;
    echo"\n\n";
    echo "Enter 1 to print all the Team Names in IPL 2021 \n";
    echo "Enter 2 for Displaying specific Team Stats\n";
    echo "Enter 3 fro Match Details\n";
    echo "Enter 4  for points Details\n";
    echo "Enter 5 to exit\n\n";
    //echo "Enter 5  Player list in a team\n";(optional)
    $choice = readline();
    echo "\n\n";
    try{
    switch($choice)
    {
        case 1:
            echo"\n\n";
            display_Teams_Name($Team);
            echo"\n\n";    
        break;
        case 2:
            $TName = readline("Enter Team name");
            echo"\n\n";
            foreach($Team as $Teams)
            {
                if($Teams->getTeam_name() == $TName )
                {
                    $Teams->display_Team_stats();
                    break;
                }
            }
            echo"\n\n";
            break;
        case 3:
            
            $match_type = readline('Enter match type ("Normal","Playoff","Final") ');
            if($match_type == "Normal")
            {   $match_no = readline("Enter match number Normal 1 to ". count($matches)-4);
                echo"\n\n";
                $matches[$match_no-1]->match_details($match_type,$match_no);
            }
            else if($match_type == "Playoff")
            {$match_no = readline("Enter Playoff match number from 1 to 3");
                echo"\n\n";
                $matches[count($matches)-1-(4-$match_no)]->match_details($match_type,$match_no);
            }
            else if($match_type == "Final")
            {
                echo"\n\n";
                $matches[count($matches)-1]->match_details($match_type,$match_no);
            }
            else
            throw new Exception("Enter valid Match number\n");
            echo"\n\n";
            break;
        case 4:
            echo"\n\n";
            Display_Points_Table($Team);
            break;
        case 5: 
            $value = false;
            break;
    }    

   }
   catch(Exception $E1)
   {
         echo"Enter valid Data!!!  \n";
   }
}while($value);


?>