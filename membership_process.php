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
    <h1>Welcome <?php echo $_GET["fname"];?></h1> 

    <p>Your membership has been processed</p>
    <br>

    <div class="confirmation-table">
        <table>
            <tr>
                <td>Name:</td>
                <td><?php echo $_GET["fname"];
                echo " ";
                echo $_GET["lname"];?></td>
            </tr>

            
            <tr>
                <td>Email:</td>
                <td><?php echo $_GET["email"]; ?>
            </tr>
        </table>

        <div class="button-group">
        <a href="index.php" class="back-button">Back to Website</a>
        </div>
    </div>
    </div>
    </div>
    </div>

</body>