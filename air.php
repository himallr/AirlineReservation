<?php

$user= $_POST['user'];
$password=$_POST['pw'];

$con=new mysqli("localhost" , "root" , "" , "airline");
if($con->connect_error){
    die("connection failed : ".$conn->connect_error);
}
else{
    $stmt = $con->prepare("select * from login where name ='".$user."'");
    // $stmt ->bind_param("s",$user);
    $stmt ->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows>0)
    {
        $data = $stmt_result->fetch_assoc();
        if($data['password']=== $password)
        {
            echo "Login successful";
            header("Location:air.html");
        }else{
            echo "Invalid email";
        }
    }
    else{
        echo "invalid username";
    }
 }
?>