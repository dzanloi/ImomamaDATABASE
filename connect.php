<?php 
    $connection = new mysqli('localhost', 'root','', 'dbcarreonf2');
    if(!$connection) {
        die(mysqli_error($mysqli));
    }
?>