<?php
    include("dbconnection.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $address = $_POST["address"];

        $query = mysqli_query($conn, "INSERT INTO crudoperation (name, email, address) values ('$username', '$email', '$address')");

        if($query){
            echo "<script>alert('successfully created record')</script>";
        }
        else{
            echo"<script>alert('there was an error')</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Fill Form</h2>
    <form action="create.php" method="post">
        <input type="text" name="username" placeholder="enter name"><br><br>
        <input type="text" name="email" placeholder="enter email"><br><br>
        <input type="text" name="address" placeholder="enter address"><br><br>
        <input type="submit" name="create" value="create"><br><br>
    </form>
</body>
</html>