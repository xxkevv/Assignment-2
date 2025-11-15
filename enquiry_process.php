<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Root Flower is a flower shop based in Kuching, Sarawak Malaysia">
    <meta name="keywords" content="Flower, Root Flower, Kuching, Sarawak, Malaysia">
    <meta name="author" content="Kevinn Jose, Jiang Yu, Vincent, Ahmed">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Enquiry Process - Root Flower</title>
</head>

<body>

    <div class="process">
    <div class="processcontainer">
    <div class="processcard">
    <h1>Thank You <?php echo $_POST["firstname"]; ?>!</h1> 

    <p>Your enquiry has been submitted successfully</p>
    <br>

    <div class="confirmation-table">
        <table border="1">
            <tr>
                <th>Name:</th>
                <td><?php echo $_POST["firstname"] . " " . $_POST["lastname"]; ?></td>
            </tr>

            <tr>
                <th>Email:</th>
                <td><?php echo $_POST["email"]; ?></td>
            </tr>

            <tr>
                <th>Phone Number:</th>
                <td><?php echo $_POST["phonenumber"]; ?></td>
            </tr>

            <tr>
                <th>Address:</th>
                <td><?php echo $_POST["address"]; ?></td>
            </tr>

            <tr>
                <th>City:</th>
                <td><?php echo $_POST["city"]; ?></td>
            </tr>

            <tr>
                <th>Preferred Contact Method:</th>
                <td><?php echo $_POST["contactMethod"]; ?></td>
            </tr>

            <tr>
                <th>Services Interested In:</th>
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
                <th>Type of Enquiry:</th>
                <td><?php echo $_POST["enquiryType"]; ?></td>
            </tr>

            <tr>
                <th>Preferred Contact Date:</th>
                <td><?php echo $_POST["preferredDate"]; ?></td>
            </tr>

            <tr>
                <th>Enquiry Priority:</th>
                <td><?php echo $_POST["priority"] . "/5"; ?></td>
            </tr>

            <tr>
                <th>Your Message:</th>
                <td><?php echo $_POST["comments"]; ?></td>
            </tr>
        </table>

        <div class="button-enquiry-process">
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

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $phonenumber = $_POST["phonenumber"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $contact_method = $_POST["contactMethod"];
    $interests = isset($_POST["interests"]) ? implode(", ", $_POST["interests"]) : "";
    $enquiry_type = $_POST["enquiryType"];
    $preferred_date = $_POST["preferredDate"];
    $comments = $_POST["comments"];
    $priority = $_POST["priority"];

    $sql = "INSERT INTO enquiry (firstname, lastname, email, phonenumber, address, city, contact_method, interests, enquiry_type, preferred_date, comments, priority)
            VALUES ('$firstname', '$lastname', '$email', '$phonenumber', '$address', '$city', '$contact_method', '$interests', '$enquiry_type', '$preferred_date', '$comments', '$priority')";

    mysqli_query($conn, $sql);
    mysqli_close($conn);
    ?>

</body>
</html>