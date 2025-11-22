<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Root Flower is a flower shop based in Kuching, Sarawak Malaysia">
    <meta name="keywords" content="Flower, Root Flower, Kuching, Sarawak, Malaysia">
    <meta name="author" content="Kevinn Jose, Jiang Yu, Vincent, Ahmed">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Registration Process - Root Flower</title>
</head>

<body>

    <div class="process">
    <div class="processcontainer">
    <div class="processcard">
    <h1>Welcome <?php echo $_POST["fname"]; ?>!</h1> 

    <p>Your workshop registration has been processed successfully</p>
    <br>

    <div class="confirmation-table">
        <table>
            <tr>
                <th>Name:</th>
                <td><?php echo $_POST["fname"] . " " . $_POST["lname"]; ?></td>
            </tr>

            <tr>
                <th>Email:</th>
                <td><?php echo $_POST["email"]; ?></td>
            </tr>

            <tr>
                <th>Phone Number:</th>
                <td><?php echo $_POST["phone"]; ?></td>
            </tr>

            <tr>
                <th>Address:</th>
                <td>
                    <?php 
                    echo $_POST["street"] . ", " . 
                         $_POST["postcode"] . " " . 
                         $_POST["city"] . ", " . 
                         $_POST["state"];
                    ?>
                </td>
            </tr>

            <tr>
                <th>Date of Birth:</th>
                <td><?php echo $_POST["dob"]; ?></td>
            </tr>

            <tr>
                <th>Membership Type:</th>
                <td><?php echo $_POST["membershipType"]; ?></td>
            </tr>

            <tr>
                <th>Interests:</th>
                <td>
                    <?php 
                    if(isset($_POST["interests"])) {
                        echo implode(", ", $_POST["interests"]);
                    } else {
                        echo "None selected";
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <th>Number of Participants:</th>
                <td><?php echo $_POST["participants"]; ?></td>
            </tr>

            <?php if (!empty($_POST["comments"])): ?>
            <tr>
                <th>Additional Comments:</th>
                <td><?php echo $_POST["comments"]; ?></td>
            </tr>
            <?php endif; ?>
        </table>

        <div class="button-membership-process">
        <a href="index.php">Back to Website</a>
        </div>
    </div>
    </div>
    </div>
    </div>

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
    $membershipType = $_POST["membershipType"];
    $interests = isset($_POST["interests"]) ? implode(", ", $_POST["interests"]) : "";
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    $participants = $_POST["participants"];
    $comments = isset($_POST["comments"]) ? $_POST["comments"] : "";

    $sql = "INSERT INTO workshop (firstname, lastname, email, street, city, state, postcode, membershiptype, interests, phone, dateofbirth, participants, comments)
            VALUES ('$firstname', '$lastname', '$email', '$street', '$city', '$state', '$postcode', '$membershipType', '$interests', '$phone', '$dob', '$participants', '$comments')";

    mysqli_query($conn, $sql);
    mysqli_close($conn);
    ?>

</body>
</html>