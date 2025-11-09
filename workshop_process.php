<!DOCTYPE html>
<html lang="en">
<title>
    <title>Workshop Process</title>
</title>

<body>
    <h1>Welcome</h1>
    
    <?php
    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "Root_Flower";

    $conn = mysqli_connect($servername, $username, $db_password, $dbname);

    if (!$conn) {
        die("Connection failed: ". mysqli_connect_error());
    }

    $firstname = $_POST["fname"];
    $lastname = $_POST["lname"];
    $email = $_POST["email"];
    $street = $_POST["street"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $postcode = $_POST["postcode"];
    $loginID = $_POST["loginID"];
    $password = $_POST["password"];
    $membershipType = $_POST["membershipType"];
    $interests = isset($_POST["interests"]) ? implode(", ", $_POST["interests"]) : "";
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    $participants = $_POST["participants"];
    $comments = isset($_POST["comments"]) ? $_POST["comments"] : "";

    $sql = "INSERT INTO workshop (firstname, lastname, email, street, city, state, postcode, loginID, password, membershiptype, interests, phone, dateofbirth, participants, comments)
            VALUES ('$firstname', '$lastname', '$email', '$street', '$city', '$state', '$postcode', '$loginID', '$password', '$membershipType', '$interests', '$phone', '$dob', '$participants', '$comments')";

    mysqli_query($conn, $sql);
    mysqli_close($conn);
    ?>
</body>
</html>