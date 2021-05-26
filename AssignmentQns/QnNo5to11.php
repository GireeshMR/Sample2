<?php

function addRow(&$emp1, &$i)
{
    $emp1["emp_id"][$i] = readline("Enter the new employee ID ");
    $emp1["emp_name"][$i] = readline("Enter the employee Name ");
    $emp1["emp_loc"][$i] = readline("Enter the employee location ");
    $emp1["emp_sal"][$i] = readline("Enter the employee salary ");
    $emp1["emp_team"][$i] = readline("Enter the employee team Name ");
}

function search($deatails)
{
    if (preg_match_all("/\d+/", $deatails, $arrays)); {
        print_r($arrays);

        return $arrays[0][0];
    }
}

function get_emp_details_1($employee_ID, $array)
{
    if (array_search($employee_ID, $array["emp_id"]) || $array["emp_id"][0] == $employee_ID) {
        $i = array_search($employee_ID, $array["emp_id"]);
        return ($array["emp_name"][$i] . " from " . $array["emp_loc"][$i] . " works in " . $array["emp_team"][$i] . " earn Rs." . $array["emp_sal"][$i]);
    } else
        return "$employee_ID is not present in the organization";
}


function get_emp_details_2($employee_ID, $array)
{
    if (array_key_exists($employee_ID, $array)) {
        $i = array_search($employee_ID, $array);
        return ($array[$employee_ID]["emp_name"] . " from " . $array[$employee_ID]["emp_loc"] . " works in " . $array[$employee_ID]["team"] . " earn Rs." . $array[$employee_ID]["emp_sal"]);
    } else
        return "$employee_ID is not present in the organization";
}

//main program

$emp1 = array(
    "emp_id" => array(),
    "emp_name" => array(),
    "emp_loc" => array(),
    "emp_sal" => array(),
    "emp_team" => array()
);

$i = 0;
$n = readline("Enter the number of employees in the organization ");

for ($j = 0; $j < $n; $j++) {
    addRow($emp1, $j);
}


$emp2 = array();

for ($v = 0; $v < $n; $v++) {
    $emp2[$emp1["emp_id"][$v]] = array();
    $emp2[$emp1["emp_id"][$v]]["emp_name"] = $emp1["emp_name"][$v];
    $emp2[$emp1["emp_id"][$v]]["emp_loc"] = $emp1["emp_loc"][$v];
    $emp2[$emp1["emp_id"][$v]]["emp_sal"] = $emp1["emp_sal"][$v];
    $emp2[$emp1["emp_id"][$v]]["team"] = $emp1["emp_name"][$v];
}

$employeeID = readline("enter employee id to search details ");
$detail_1 = get_emp_details_1($employeeID, $emp1);
echo "Detail_1 = $detail_1 \n";

if (array_search($employeeID, $emp1["emp_id"]) || $emp1["emp_id"][0] == $employeeID) {
    echo "Length of Detail_1 is " . strlen($detail_1) . "\n";
    echo "Salary of $employeeID is " . search($detail_1) . "\n";
}

$employeeID = readline("enter employee ID to search details ");
$detail_2 = get_emp_details_2($employeeID, $emp2);
echo "Detail_2 = $detail_2 \n";

if (array_key_exists($employeeID, $emp2)) {
    echo "Length of Detail_2 is " . strlen($detail_2) . "\n";
    echo "Salary of $employeeID is " . search($detail_2) . "\n";
}

$combination = $detail_1 . " " . $detail_2;
echo "Combination of both the Detail_1 and Detail_2 \n $combination \n";
$Detail_array = array($detail_1, $detail_2);
echo "Details array\n";
print_r($Detail_array);
$Assoc_Detail_array = array("detail_1" => $detail_1, "detail_2" => $detail_2);
echo "Associative array of Details \n";
print_r($Assoc_Detail_array);
?>