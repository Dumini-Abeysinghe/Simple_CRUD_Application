<?php
    include("dbconnection.php");

    if(isset($_GET["action"]) && $_GET["action"] == "delete"){
        $id = $_GET["id"];
        mysqli_query($conn, "DELETE FROM crudoperation WHERE id=$id");
        header ("Location: view.php");
        exit;
    }

    if(isset($_GET["action"]) && $_GET["action"] == "edit"){
        $id = $_GET["id"];
        $result = mysqli_query($conn, "SELECT * FROM crudoperation WHERE id=$id");
        $row = mysqli_fetch_assoc($result);
        ?>

        <h2>Edit Record</h2>
        <form method="post" action="view.php?action=update&id=<?php echo $id; ?>">
        Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>
        Email: <input type="text" name="email" value="<?php echo $row['email']; ?>"><br><br>
        Address: <input type="text" name="address" value="<?php echo $row['address']; ?>"><br><br>
        <input type="submit" value="Update">
        </form>
        <br>
        <a href="view.php">Back to Records</a>
        <?php 
        exit;
    }

    if(isset($_GET["action"]) && $_GET["action"]  == "update"){
        $id = $_GET["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $address = $_POST["address"];

        mysqli_query($conn, "UPDATE crudoperation SET name='$name', email='$email', address='$address' WHERE id=$id");
        header("Location: view.php");
        exit;
    }

    $query = mysqli_query($conn, "SELECT * FROM crudoperation");

    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            echo "ID: " . $row["id"] . "<br>";
            echo "Name: " . $row["name"] . "<br>";
            echo "Email: " . $row["email"] . "<br>";
            echo "Address: " . $row["address"] . "<br>";

            echo "<a href='view.php?action=edit&id=".$row['id']."'>Edit</a> | ";
            echo "<a href='view.php?action=delete&id=".$row['id']."' onclick=\"return confirm('Are you sure you want to delete this record?')\">Delete</a>";    
            echo "<hr>";
        }
    }
    else{
        echo"no records found";
    }

    mysqli_close($conn);
?>