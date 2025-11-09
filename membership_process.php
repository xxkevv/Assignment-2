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
    // Database configuration
    $servername = "localhost";
    $username = "root";
    $db_password = "";  // Ganti nama variable biar ga bentrok
    $dbname = "Root_Flower";

    // Create connection
    $conn = mysqli_connect($servername, $username, $db_password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: ". mysqli_connect_error());
    }

    // Get data from POST
    $firstname = $_POST["fname"];
    $lastname = $_POST["lname"];
    $email = $_POST["email"];
    $loginID = $_POST["loginID"];
    $password = $_POST["password"];

    // ========================================
    // PILIHAN 1: TANPA HASH (Simple - untuk belajar)
    // ========================================
    $sql = "INSERT INTO membership(firstname, lastname, email, loginID, password)
            VALUES ('$firstname', '$lastname', '$email', '$loginID', '$password')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>console.log('✅ Data berhasil disimpan!');</script>";
    } else {
        echo "<script>console.error('❌ Error: " . mysqli_error($conn) . "');</script>";
    }

    // ========================================
    // PILIHAN 2: PAKAI HASH (Nanti kalau mau lebih aman)
    // Uncomment 4 baris di bawah & comment yang di atas
    // ========================================
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // $stmt = $conn->prepare("INSERT INTO membership (firstname, lastname, email, loginID, password) VALUES (?, ?, ?, ?, ?)");
    // $stmt->bind_param("sssss", $firstname, $lastname, $email, $loginID, $hashed_password);
    // $stmt->execute();

    mysqli_close($conn);
    ?>

</body>
</html>