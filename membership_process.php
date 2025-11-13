<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Root Flower is a flower shop based in Kuching, Sarawak Malaysia">
    <meta name="keywords" content="Flower, Root Flower, Kuching, Sarawak, Malaysia">
    <meta name="author" content="Kevinn Jose, Jiang Yu, Vincent, Ahmed">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Membership Process Form - Root Flower</title>
</head>

<body>

    <div class="membershipprocess">
    <div class="msprocesscontainer">
    <div class="msprocesscard">
    <h1>Welcome <?php echo $_POST["fname"];?></h1> 

    <p>Your membership has been processed</p>
    <br>

    <div class="confirmation-table">
        <table>
            <tr>
                <th>Name:</th>
                <td><?php echo $_POST["fname"] . " " . $_POST["lname"];?></td>
            </tr>

            
            <tr>
                <th>Email:</th>
                <td><?php echo $_POST["email"]; ?></td>
            </tr>

            <tr>
                <th>Login ID:</th>
                <td><?php echo $_POST["loginID"]; ?></td>
            </tr>
        </table>

        <div class="button-membership-process">
        <a href="index.php"">Back to Website</a>
        </div>
    </div>
    </div>
    </div>
    </div>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Root_Flower";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: ". mysqli_connect_error());
    }

    $firstname = $_POST["fname"];
    $lastname = $_POST["lname"];
    $email = $_POST["email"];
    $loginID = $_POST["loginID"];
    $password = $_POST["password"];
    $hasp = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO user(firstname, lastname, email, loginID, password)
            VALUES ('$firstname', '$lastname', '$email', '$loginID', '$hasp')";

    mysqli_query($conn, $sql);
	mysqli_close($conn);
    ?>

</body>
</html>