<?php
$host ="localhost";
$user="root";
$password="";
$database="tdw";
$connection=mysqli_connect($host,$user,$password,$database);


    $requete1 = $_POST['text1'];

    if (mysqli_query($connection, $requete1)) {
        
    } else {
    }
    
    $connection->close();

?>