<?php
$con=new mysqli("localhost" , "root" , "" , "airline");

$id=$_POST['id'];
$f_from= $_POST['f_from'];
$f_to=$_POST['f_to'];
$checkin = $_POST['checkin'];
$checkout=$_POST['checkout'];
$seats=$_POST['seats'];
$gender=$_POST['gender'];
$class=$_POST['class'];

// $sql= "INSERT INTO reservation ('f_from', 'f_to', 'checkin', 'checkout', 'seats', 'gender', 'class', 'id') VALUES($f_from, $f_to, $checkin, $checkout, $seats, $gender, $class, $id)";

// $rs=mysqli_query($con,$sql) or die(mysqli_error());

// if($rs)
// {
//     echo"<h1>booked</h1>";
// 
//}
if($con->connect_error){
    die('Connection Failed:'.$connext_error);
}else{
   $stmt = $con->prepare("INSERT INTO reservation (`f_from`, `f_to`, `checkin`, `checkout`, `seats`, `gender`, `class`, `id`) VALUES(?,?,?,?,?,?,?,?)");

    $stmt ->bind_param("ssddissi",$f_from, $f_to, $checkin, $checkout, $seats, $gender, $class, $id);
    $stmt ->execute();
    echo 'successful';
    header("Location:book.html");
    $stmt ->close();
    $con -> close();
}
?>