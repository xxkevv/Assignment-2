<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['Login'];
    $password = $_POST['password'];
    
    // Database connection
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "Root_Flower";
    
    $conn = mysqli_connect($servername, $db_username, $db_password, $dbname);
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    
    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $row['role'];
        $_SESSION['user_id'] = $row['id'];
        
        mysqli_close($conn);
        
        if ($row['role'] == 'admin') {
            header("Location: adminview.php");
            exit();
        } else {
            header("Location: profile.php");
            exit();
        }
    } else {
        mysqli_close($conn);
        $_SESSION['login_error'] = "Wrong Username or Password!";
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>
