<?php 
$conn = mysqli_connect("localhost", "root", "", "employee");

$affectedRow = 0;
$xml = simplexml_load_file("employees.xml")
    or die("Error: Cannot create object");
    try {
    foreach ($xml->children()as $row){
    $employee_id = $row->EMPLOYEE_ID;
    $first_name =$row->FIRST_NAME;
    $last_name= $row->LAST_NAME;
    $email = $row->EMAIL;
    $phone_number = $row->PHONE_NUMBER;
    $hire_date= $row->HIRE_DATE;
    $job_id= $row->JOB_ID;
    $salary= $row->SALARY;

    $sql = "INSERT INTO emp (employee_id,first_name,last_name,email,phone_number,hire_date,job_id,salary) VALUES('".$employee_id."','".$first_name."','".$last_name."','".$email."','".$phone_number."','".$hire_date."','".$job_id."','".$salary."')";
    
    $result = mysqli_query($conn, $sql);
    
    if (! empty($result)) {
        $affectedRow ++;
    } else {
        $erorr_message = mysqli_error($conn) . "\n";
    }

    }
    
    } catch(Exception $e) {
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <header class="container-fluid d-flex flex-column align-items-center">
        <h2>
            INSERT XML TO MYSQL USING PHP
        </h2>
        <h1>
            XML data storing in Database
        </h1>
    </header>
    <form action="load.php" method="post" >
        <input type="submit">
    </form>
    <?php
    if ($affectedRow>0){
        $message = $affectedRow." records inserted";
    }
    else{
        $message = "No records inserted";
    }
    ?>

    <div class=" text-bg-success m-2 p-2 rounded container-fluid">
        <?php echo $message; ?>
    </div>
    <?php
    if (! empty($error)){?>
    <div class=" text-bg-error m-2 p-2 rounded container-fluid">
        <?php echo $error; ?>
    </div>
    <?php } ?>
</body>
</html>
<?php
