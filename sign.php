+<?php

$name= $_POST['name'];
$password=$_POST['pw'];


$con=new mysqli("localhost" , "root" , "" , "airline");
if($con->connect_error){
    die('Connection Failed:'.$connect_error);
}else{
   $stmt = $con->prepare("INSERT INTO login (`name`, `password`) VALUES(?,?)");

    $stmt ->bind_param("ss",$name, $password);
    $stmt ->execute();
    echo 'signup successful';
    header("Location:air.html");
    $stmt ->close();
    $con -> close();
}
?>