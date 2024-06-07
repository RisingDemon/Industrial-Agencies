<?php
    $db_hostname="127.0.0.1";
    $db_username="root";
    $db_password="";
    $db_name="industrysignup";

    $conn=mysqli_connect($db_hostname, $db_username, $db_password, $db_name);

    if(!$conn)
    {
        echo "connection failed:" .mysqli_connect_error();
        exit;
    }

    $email = $_GET['email'];
    $password = $_GET['password'];

    // fetch email and password from database
    $sql= "SELECT * FROM register WHERE email='$email' AND password='$password'";
    $result= mysqli_query($conn, $sql);
    if(!$result){
        echo "error:" .mysqli_error($conn);
        exit;
    }
    $row = mysqli_fetch_assoc($result);
    // compare email and password with database values
    if($email == $row['email'] && $password == $row['password']){
        echo "login successful";
        // redirect to home page
        header("Location: Home.html");
    }
    else{
        echo "login failed";
        // create a button to redirect to login page
        echo "<button onclick=\"location.href='Home.html'\">Back</button>";

    }
    mysqli_close($conn);
?>