<?php


require 'teams.php';

interface IPL{
    public const year = 2021;
    public function display();
}

class matches123 implements IPL{
    private static $initial_Date = array("Day"=>01,"Month"=>"JAN","Year"=>IPL::year);
    private static $intial_Match_Time = array("hour"=>7,"minutes"=>30);
    private static $normal_match_no = 1;
    private static $Qualifier_match_no = 1;
    private static $semifinal_match_no = 2;

    private $Match_type;
    private $Match_No;
    private $Team1;
    private $Team2;
    private $venue;
    private $Date = array("Day"=>0,"Month"=>"null","Year"=>IPL::year);
    private $time = array("hour"=>0,"minutes"=>0);
    private $result = " Match is not yet played ";
    private $winner = " Match is not yet played ";
//ignore
    
    public function __construct($Team1,$Team2,$Match_type)
    {   
        if($Match_type == "Normal")
        {

        }
    }

   #overriding display() of IPL interface
    public function display()
    {
      echo"************* Match Details **************\n";  
    }

    public function __call($name,$args)
    {
        if($args==1 && method_exists($this,$fun=$name))
        {
            return call_user_func_array($name,$args);
        }
        else{
            echo"The method is not Exists\n";
            exit;
        }
        
    }
    public function match_details()
    {
        $this->display();


    }

}
class custException extends Exception{
    
}

//crate teams
//schedule matches
//display match details


?>