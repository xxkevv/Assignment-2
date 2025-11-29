<?php
/**
 * Filename: create_enquiry.php
 * Author: Kevinn Jose, Jiang Yu, Vincent, Ahmed
 * Description: Admin page to create a new enquiry.
 * Date: 2025
 */
// Redirect if accessed directly
if (basename($_SERVER['PHP_SELF']) == 'create_enquiry.php' && !isset($_SERVER['HTTP_REFERER'])) {
    header("Location: adminview.php?page=enquiry");
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
        'firstname', 'lastname', 'email', 'phonenumber',
        'enquiry_type', 'priority', 'preferred_date', 'comments'
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

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO enquiry (
            firstname, lastname, email, phonenumber,
            enquiry_type, priority, preferred_date, comments
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        
        $stmt->bind_param(
            "ssssssss",
            $_POST['firstname'],
            $_POST['lastname'],
            $_POST['email'],
            $_POST['phonenumber'],
            $_POST['enquiry_type'],
            $_POST['priority'],
            $_POST['preferred_date'],
            $_POST['comments']
        );

        // Execute and check success
        if ($stmt->execute()) {
            $success = true;
        } else {
            $error = "Error saving enquiry: " . $stmt->error;
        }

        $stmt->close();
        mysqli_close($conn);

        // Redirect after successful submission to prevent resubmission
        if ($success) {
            header("Location: view_enquiry.php?success=1");
            exit();
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
            <h1 class="page-title">Create New Enquiry</h1>
            <a href="view_enquiry.php" class="back-btn">← Back to List</a>
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
                <label for="adress">Adress *</label>
                <input type="adress" id="adress" name="adress" required>
            </div>

             <div class="form-group">
                <label for="City">City *</label>
                <input type="city" id="city" name="city" required>
            </div>

            <div class="form-group">
                <label for="phonenumber">Phone Number *</label>
                <input type="tel" id="phonenumber" name="phonenumber" required>
            </div>

            <div class="form-group">
                <label for="enquiry_type">Enquiry Type *</label>
                <select id="enquiry_type" name="enquiry_type" required>
                    <option value="">Select Type</option>
                    <option value="General">General</option>
                    <option value="Support">Support</option>
                    <option value="Feedback">Feedback</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="priority">Priority *</label>
                <select id="priority" name="priority" required>
                    <option value="">Select Priority</option>
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                </select>
            </div>

            <div class="form-group">
                <label for="preferred_date">Preferred Date *</label>
                <input type="date" id="preferred_date" name="preferred_date" required>
            </div>

            <div class="form-group">
                <label for="comments">Message *</label>
                <textarea id="comments" name="comments" rows="4" required></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="submitt-btn">Save Enquiry</button>
                <a href="view_enquiry.php" class="cancell-btn">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
