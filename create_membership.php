<?php
// Redirect if accessed directly
if (basename($_SERVER['PHP_SELF']) == 'create_membership.php' && !isset($_SERVER['HTTP_REFERER'])) {
    header("Location: adminview.php?page=membership");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Root_Flower";

$success = false;
$error = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate required fields
    $requiredFields = [
        'firstname', 'lastname', 'email', 'loginID', 'password'
    ];
    $missingFields = [];
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $missingFields[] = $field;
        }
    }

    if (!empty($missingFields)) {
        $error = "Please fill in all required fields: " . implode(', ', $missingFields);
    } else {
        // Connect to database
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Insert into membership table
        $stmt1 = $conn->prepare("INSERT INTO membership (
            firstname, lastname, email, loginID, password
        ) VALUES (?, ?, ?, ?, ?)");
        $stmt1->bind_param(
            "sssss",
            $_POST['firstname'],
            $_POST['lastname'],
            $_POST['email'],
            $_POST['loginID'],
            $_POST['password']
        );
        $success1 = $stmt1->execute();
        $stmt1->close();

        // Insert into user table (role default user)
        $stmt2 = $conn->prepare("INSERT INTO user (
            username, password, role
        ) VALUES (?, ?, 'user')");
        $stmt2->bind_param(
            "ss",
            $_POST['loginID'],
            $_POST['password']
        );
        $success2 = $stmt2->execute();
        $stmt2->close();

        mysqli_close($conn);

        if ($success1 && $success2) {
            header("Location: view_membership.php?success=1");
            exit();
        } else {
            $error = "Error saving membership or user.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Enquiry - Root & Flower</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div class="admin-page">
        <div class="page-title-row">
            <h1 class="page-title">Create New Membership</h1>
            <a href="view_membership.php" class="back-btn">← Back to List</a>
        </div>

        <?php if (!empty($error)): ?>
            <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST" action="" class="enquiry-form">
            <div class="form-group">
                <label for="firstname">First Name *</label>
                <input type="text" id="firstname" name="firstname" required pattern="^[A-Za-zÀ-ÖØ-öø-ÿ' -]+$" title="Letters, spaces, apostrophes and hyphens only">
            </div>

            <div class="form-group">
                <label for="lastname">Last Name *</label>
                <input type="text" id="lastname" name="lastname" required pattern="^[A-Za-zÀ-ÖØ-öø-ÿ' -]+$" title="Letters, spaces, apostrophes and hyphens only">
            </div>

            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="loginID">Login ID *</label>
                <input type="text" id="loginID" name="loginID" required pattern="^[A-Za-z0-9]+$" title="Letters and numbers only">
            </div>

            <div class="form-group">
                <label for="password">Password *</label>
                <input type="password" id="password" name="password" required pattern="^[A-Za-z0-9]+$" title="Letters and numbers only">
            </div>

            <div class="form-actions">
                <button type="submit" class="submitt-btn">Save Membership</button>
                <a href="view_membership.php" class="cancell-btn">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>