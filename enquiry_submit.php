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

    $name = $_GET['name'];
    $email = $_GET['email'];
    $mobile = $_GET['mobile'];
    $city = $_GET['city'];
    $product = $_GET['product'];
    $quantity = $_GET['quantity'];
    $message = $_GET['message'];

    // fetch all the values from the form
    $sql = "INSERT INTO enquiry (name, email, mobile, city, product, quantity, message) VALUES ('$name', '$email', '$mobile', '$city', '$product', '$quantity', '$message')";
    $result= mysqli_query($conn, $sql);
    if(!$result){
        echo "error:" .mysqli_error($conn);
        exit;
    }
    else{
        echo "Enquiry Details<br> Name: " .$name ."<br> Email: " .$email ."<br>Mobile: " .$mobile ."<br>City: " .$city ."<br>Product: " .$product ."<br>Quantity: " .$quantity ."<br>Message: " .$message;
        echo "<br>Thank you for your enquiry. We will get back to you soon.";
    }
    
    mysqli_close($conn);
?>