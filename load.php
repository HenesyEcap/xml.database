<?php
//Start php code
//Load xml file into xml_data variable
$xml_data = simplexml_load_file("employees.xml") or
die("Error: Object Creation failure");

//Use foreach loop to display data and for sub elements access,
//We will use children() function

foreach ($xml_data->children() as $data)
{
    //display each element in xml file
    echo "Employee ID : ", $data->EMPLOYEE_ID . "<br> ";
    echo "First_name : ", $data->FIRST_NAME . "<br> ";
    echo "Last name : ", $data->LAST_NAME . "<br> ";
    echo "Email : ", $data->EMAIL . "<br> ";
    echo "Phone Number : ", $data->PHONE_NUMBER . "<br> ";
    echo "Hire Date : ", $data->HIRE_DATE . "<br>";
    echo "Job ID : ", $data->JOB_ID . "<br>";
    echo "Salary : ", $data->SALARY. "<br>";
    echo "-----------------------------------------";
    echo "<br>";
}
?>