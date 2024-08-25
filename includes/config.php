<?php
    define("DB_SERVER","localhost:4306");
    define("DB_USER","root");
    define("DB_PASS","");
    define("DB_NAME","loginsystem");
    $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);   
    if(mysqli_connect_errno())
    {
        echo "Failed to connect MYSQL". mysqli_connect_error();
    } 
?>