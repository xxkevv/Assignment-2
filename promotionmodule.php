<?php
// Promotion Module - admin manage promotions (create / edit / delete / list)
if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'admin') {
	header('Location: login.php');
	exit();
}

$servername = "localhost";
$db_user = "root";
$db_pass = "";
$dbname = "Root_Flower";

$conn = mysqli_connect($servername, $db_user, $db_pass, $dbname);
if (!$conn) {
	die('Connection failed: '. mysqli_connect_error());
}

// Ensure promotions table exists
$createPromos = "CREATE TABLE IF NOT EXISTS promotions (
	id INT(6) AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(100) NOT NULL,
	description TEXT NOT NULL,
	image VARCHAR(255) DEFAULT NULL,
	discount_percentage INT DEFAULT NULL,
	start_date DATE DEFAULT NULL,
	end_date DATE DEFAULT NULL,
	category VARCHAR(50) DEFAULT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
mysqli_query($conn, $createPromos);

$message = '';

// Handle delete
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
	$delId = intval($_POST['delete_id']);
	
	// Get image to unlink
	$stmt = $conn->prepare('SELECT image FROM promotions WHERE id = ?');
	$stmt->bind_param('i', $delId);
	$stmt->execute();
	$res = $stmt->get_result();
	$row = $res->fetch_assoc();
	$stmt->close();
	
	if ($row && !empty($row['image']) && file_exists($row['image'])) {
		@unlink($row['image']);
	}
	
	// Delete promotion
	$del = $conn->prepare('DELETE FROM promotions WHERE id = ?');
	$del->bind_param('i', $delId);
	
	if ($del->execute()) {
		$message = 'Promotion deleted successfully.';
	} else {
		$message = 'Failed to delete promotion: ' . $del->error;
	}
	$del->close();
}

// Handle create
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'create') {
	$title = mysqli_real_escape_string($conn, $_POST['title'] ?? '');
	$description = mysqli_real_escape_string($conn, $_POST['description'] ?? '');
	$category = mysqli_real_escape_string($conn, $_POST['category'] ?? '');
	$discount = isset($_POST['discount']) ? intval($_POST['discount']) : NULL;
	$start_date = !empty($_POST['start_date']) ? $_POST['start_date'] : NULL;
	$end_date = !empty($_POST['end_date']) ? $_POST['end_date'] : NULL;
	
	$imagePath = NULL;
	
	if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
		$tmp = $_FILES['image']['tmp_name'];
		$name = basename($_FILES['image']['name']);
		$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
		$allowed = ['jpg', 'jpeg', 'png', 'gif'];
		
		if (in_array($ext, $allowed)) {
			$newName = 'promo_' . time() . '.' . $ext;
			$dest = 'IMAGE/' . $newName;
			
			if (move_uploaded_file($tmp, $dest)) {
				$imagePath = $dest;
			}
		}
	}
	
	$stmt = $conn->prepare('INSERT INTO promotions (title, description, image, discount_percentage, start_date, end_date, category) VALUES (?, ?, ?, ?, ?, ?, ?)');
	$stmt->bind_param('sssisss', $title, $description, $imagePath, $discount, $start_date, $end_date, $category);
	
	if ($stmt->execute()) {
		$message = 'Promotion created successfully.';
	} else {
		$message = 'Failed to create promotion: ' . $stmt->error;
	}
	$stmt->close();
}

// Handle edit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'edit' && isset($_POST['promo_id'])) {
	$pid = intval($_POST['promo_id']);
	$title = mysqli_real_escape_string($conn, $_POST['title'] ?? '');
	$description = mysqli_real_escape_string($conn, $_POST['description'] ?? '');
	$category = mysqli_real_escape_string($conn, $_POST['category'] ?? '');
	$discount = isset($_POST['discount']) ? intval($_POST['discount']) : NULL;
	$start_date = !empty($_POST['start_date']) ? $_POST['start_date'] : NULL;
	$end_date = !empty($_POST['end_date']) ? $_POST['end_date'] : NULL;
	
	// Fetch existing image
	$imgStmt = $conn->prepare('SELECT image FROM promotions WHERE id = ?');
	$imgStmt->bind_param('i', $pid);
	$imgStmt->execute();
	$res = $imgStmt->get_result();
	$r = $res->fetch_assoc();
	$imgStmt->close();
	
	$imagePath = $r['image'] ?? NULL;
	
	if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
		$tmp = $_FILES['image']['tmp_name'];
		$name = basename($_FILES['image']['name']);
		$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
		$allowed = ['jpg', 'jpeg', 'png', 'gif'];
		
		if (in_array($ext, $allowed)) {
			// Remove old image
			if (!empty($imagePath) && file_exists($imagePath)) {
				@unlink($imagePath);
			}
			
			$newName = 'promo_' . time() . '.' . $ext;
			$dest = 'IMAGE/' . $newName;
			
			if (move_uploaded_file($tmp, $dest)) {
				$imagePath = $dest;
			}
		}
	}
	
	$upd = $conn->prepare('UPDATE promotions SET title=?, description=?, image=?, discount_percentage=?, start_date=?, end_date=?, category=? WHERE id=?');
	$upd->bind_param('sssisssi', $title, $description, $imagePath, $discount, $start_date, $end_date, $category, $pid);
	
	if ($upd->execute()) {
		$message = 'Promotion updated successfully.';
	} else {
		$message = 'Failed to update promotion: ' . $upd->error;
	}
	$upd->close();
}

// Fetch all promotions
$res = mysqli_query($conn, 'SELECT * FROM promotions ORDER BY created_at DESC');
$promotions = mysqli_fetch_all($res, MYSQLI_ASSOC);
?>

<link rel="stylesheet" href="CSS/style.css">

<div class="admin-page">
	<div class="page-title-row">
		<h1 class="page-title">Promotion Module</h1>
	</div>

	<?php if (!empty($message)): ?>
		<div class="message-box success"><?php echo htmlspecialchars($message); ?></div>
	<?php endif; ?>

	<div class="promo-flex-container">
		<div class="promo-left">
			<h2>Create Promotion</h2>

			<form method="POST" enctype="multipart/form-data" class="form-group">
				<input type="hidden" name="action" value="create">

				<div class="form-field">
					<label>Title</label>
					<input name="title" required>
				</div>

				<div class="form-field">
					<label>Category</label>
					<input name="category">
				</div>

				<div class="form-field">
					<label>Discount %</label>
					<input type="number" name="discount" min="0" max="100">
				</div>

				<div class="form-row">
					<div class="form-field">
						<label>Start Date</label>
						<input type="date" name="start_date">
					</div>
					<div class="form-field">
						<label>End Date</label>
						<input type="date" name="end_date">
					</div>
				</div>

				<div class="form-field">
					<label>Description</label>
					<textarea name="description" rows="5" required></textarea>
				</div>

				<div class="form-field">
					<label>Image</label>
					<input type="file" name="image" accept="image/*">
				</div>

				<div class="form-buttons">
					<button class="btn-submit" type="submit">Create Promotion</button>
				</div>
			</form>
		</div>

		<div class="promo-right">
			<h2>Existing Promotions</h2>

			<div class="table-container">
				<table>
					<thead>
						<tr>
							<th>ID</th>
							<th>Title</th>
							<th>Category</th>
							<th>Discount</th>
							<th>Dates</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($promotions as $p): ?>
							<tr>
								<td><?php echo $p['id']; ?></td>
								<td><?php echo htmlspecialchars($p['title']); ?></td>
								<td><?php echo htmlspecialchars($p['category']); ?></td>
								<td><?php echo htmlspecialchars($p['discount_percentage'] ?? 'N/A'); ?>%</td>
								<td>
									<?php 
									$start = $p['start_date'] ? htmlspecialchars($p['start_date']) : 'N/A';
									$end = $p['end_date'] ? htmlspecialchars($p['end_date']) : 'N/A';
									echo "$start to $end";
									?>
								</td>

								<td>
									<div class="action-dropdown">
										<input type="checkbox" id="action-<?php echo $p['id']; ?>" class="action-toggle">
										<label for="action-<?php echo $p['id']; ?>" class="action-btn">⋮</label>

										<div class="dropdown-menu">
											<a href="#" class="dropdown-item view-btn" 
												onclick="document.getElementById('view-<?php echo $p['id']; ?>').classList.add('show-block'); return false;">
												View
											</a>
											<a href="#" class="dropdown-item edit-btn" 
												onclick="document.getElementById('edit-<?php echo $p['id']; ?>').classList.add('show-block'); return false;">
												Edit
											</a>
											<form method="POST" class="dropdown-form" onsubmit="return confirm('Are you sure you want to delete this promotion?');">
												<input type="hidden" name="delete_id" value="<?php echo $p['id']; ?>">
												<button type="submit" class="dropdown-item dropdown-delete-btn">Delete</button>
											</form>
										</div>
									</div>

									<!-- View Modal -->
									<div id="view-<?php echo $p['id']; ?>" class="modal-container">
										<strong><?php echo htmlspecialchars($p['title']); ?></strong>
										<p><?php echo nl2br(htmlspecialchars($p['description'])); ?></p>
										<?php if (!empty($p['image']) && file_exists($p['image'])): ?>
											<img src="<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['title']); ?>">
										<?php endif; ?>
										<div class="modal-actions">
											<button type="button" onclick="this.closest('.modal-container').classList.remove('show-block')">Close</button>
										</div>
									</div>

									<!-- Edit Modal -->
									<div id="edit-<?php echo $p['id']; ?>" class="modal-container">
										<form method="POST" enctype="multipart/form-data">
											<input type="hidden" name="action" value="edit">
											<input type="hidden" name="promo_id" value="<?php echo $p['id']; ?>">

											<div class="form-field">
												<label>Title</label>
												<input name="title" value="<?php echo htmlspecialchars($p['title']); ?>" required>
											</div>

											<div class="form-field">
												<label>Category</label>
												<input name="category" value="<?php echo htmlspecialchars($p['category']); ?>">
											</div>

											<div class="form-field">
												<label>Discount %</label>
												<input type="number" name="discount" min="0" max="100" value="<?php echo htmlspecialchars($p['discount_percentage']); ?>">
											</div>

											<div class="form-row">
												<div class="form-field">
													<label>Start Date</label>
													<input type="date" name="start_date" value="<?php echo htmlspecialchars($p['start_date']); ?>">
												</div>
												<div class="form-field">
													<label>End Date</label>
													<input type="date" name="end_date" value="<?php echo htmlspecialchars($p['end_date']); ?>">
												</div>
											</div>

											<div class="form-field">
												<label>Description</label>
												<textarea name="description" rows="4" required><?php echo htmlspecialchars($p['description']); ?></textarea>
											</div>

											<div class="form-field">
												<label>Replace Image</label>
												<input type="file" name="image" accept="image/*">
											</div>

											<div class="form-buttons">
												<button class="btn-submit" type="submit">Save Changes</button>
												<button type="button" class="btn-cancel" onclick="this.closest('.modal-container').classList.remove('show-block')">Cancel</button>
											</div>
										</form>
									</div>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php mysqli_close($conn); ?>

