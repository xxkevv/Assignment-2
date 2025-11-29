<?php
/**
 * Filename: connection.php
 * Author: Kevinn Jose, Jiang Yu, Vincent, Ahmed
 * Description: Database connection script.
 * Date: 2025
 */
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);

$sql = "CREATE DATABASE IF NOT EXISTS Root_Flower";

mysqli_query($conn, $sql);
mysqli_close($conn);
?>