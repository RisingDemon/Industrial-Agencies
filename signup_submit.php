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
    $password = $_GET['password'];
    $con_password = $_GET['con_password'];

    echo $name;
    //check if email already exists
    $sql= "SELECT * FROM register WHERE email='$email'";
    $result= mysqli_query($conn, $sql);
    if(!$result){
        echo "error:" .mysqli_error($conn);
        exit;
    }
    $row = mysqli_fetch_assoc($result);
    if($email == $row['email']){
        echo "<br>email already exists";
        // create a button to redirect to login page
        echo "<br><br><button onclick=\"location.href='Home.html'\">Back</button>";
        exit;
    }
    // check if password and confirm password are same
    if($password != $con_password){
        echo " password and confirm password are not same";
        // create a button to redirect to login page
        echo "<br><br><button onclick=\"location.href='Home.html'\">Home</button>";
        exit;
    }
    $sql= "INSERT INTO register(name, email, mobile, password, confirmpass) values ('$name', '$email', '$mobile', '$password', '$con_password')";

    $result= mysqli_query($conn, $sql);
    if(!$result){
        echo "error:" .mysqli_error($conn);
        exit;
    }
    echo "registration successful";

    echo "<button onclick=\"location.href='Home.html'\">OK</button>";

    mysqli_close($conn);
?>