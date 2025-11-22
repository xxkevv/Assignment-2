<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Membership - Root & Flower</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Root_Flower";

    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $membership = null;
    $message = '';

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
        $id = (int)$_POST['id'];
        $firstname = trim($_POST['firstname']);
        $lastname = trim($_POST['lastname']);
        $email = trim($_POST['email']);
        $loginID = trim($_POST['loginID']);

        // Validate required fields
        if (empty($firstname) || empty($lastname) || empty($email) || empty($loginID)) {
            $message = "All fields are required!";
        } else {
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) {
                $message = "Database connection failed: " . mysqli_connect_error();
            } else {
                // Update record
                $stmt = $conn->prepare("UPDATE membership SET firstname=?, lastname=?, email=?, loginID=? WHERE id=?");
                $stmt->bind_param("ssssi", $firstname, $lastname, $email, $loginID, $id);
                
                if ($stmt->execute()) {
                    $message = "Membership updated successfully!";
                } else {
                    $message = "Error updating membership: " . $stmt->error;
                }
                
                $stmt->close();
                mysqli_close($conn);
            }
        }
    }

    // Fetch current membership data
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        $message = "Database connection failed: " . mysqli_connect_error();
    } else {
        $stmt = $conn->prepare("SELECT id, firstname, lastname, email, loginID FROM membership WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $membership = $result->fetch_assoc();
        
        $stmt->close();
        mysqli_close($conn);
    }
    ?>

    <div class="view-edit-container">
        <?php if ($membership): ?>
            <h1 class="page-title">Edit Membership</h1>
            
            <?php if ($message): ?>
                <div class="content-card" style="<?php echo strpos($message, 'successfully') !== false ? 'background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb;' : 'background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb;'; ?> padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>
            
            <div class="content-card">
                <form method="POST" action="" class="edit-form">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($membership['id']); ?>">
                    
                    <fieldset>
                        <legend>Personal Information</legend>
                        
                        <label for="firstname">First Name</label>
                        <input type="text" id="firstname" name="firstname" 
                               value="<?php echo htmlspecialchars($membership['firstname']); ?>" 
                               required>
                        
                        <label for="lastname">Last Name</label>
                        <input type="text" id="lastname" name="lastname" 
                               value="<?php echo htmlspecialchars($membership['lastname']); ?>" 
                               required>
                        
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" 
                               value="<?php echo htmlspecialchars($membership['email']); ?>" 
                               required>
                        
                        <label for="loginID">Login ID</label>
                        <input type="text" id="loginID" name="loginID" 
                               value="<?php echo htmlspecialchars($membership['loginID']); ?>" 
                               required>
                    </fieldset>
                    
                    <div class="form-actions">
                        <button type="submit" name="update" class="btn btn-save">Save Changes</button>
                        <a href="view_membership.php" class="btn btn-cancel">Cancel</a>
                    </div>
                </form>
            </div>
        <?php else: ?>
            <div class="content-card">
                <?php 
                if (empty($message)) {
                    echo "Membership not found or invalid ID.";
                } else {
                    echo htmlspecialchars($message);
                }
                ?>
            </div>
            <div class="form-actions">
                <a href="view_membership.php" class="btn btn-cancel">Back to Membership List</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>