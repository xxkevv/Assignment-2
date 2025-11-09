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