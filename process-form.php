<?php

$name = $_POST["name"];
$message = $_POST["message"];  

$host = "localhost";
$dbname = "message_db";
$username = "root";
$password = "";
        
$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);
        
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}           
        
$sql = "INSERT INTO message (name, body)
        VALUES (?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssii", $name, $message,);

mysqli_stmt_execute($stmt);

/* poděkování a přesměrování na určenou adresu */
echo "Děkujeme za zpětnou vazbu. <script>setTimeout(function(){location.href='https://yourAddress.html'} , 2000); </script>";