<?php include 'header.php'; ?>
<?php require_once 'config.php'; ?>

<?php
$success = '';
$error = '';
$name = $email = $message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    // Validation
    $errors = [];
    if (strlen($name) < 2) $errors[] = "Name must be at least 2 characters.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email address.";
    if (strlen($message) < 10) $errors[] = "Message must be at least 10 characters.";

    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);
        if ($stmt->execute()) {
            $success = "Thank you for your message! We'll get back to you soon.";
            $name = $email = $message = ''; // Clear form
        } else {
            $error = "Failed to send message. Please try again later.";
        }
        $stmt->close();
    } else {
        $error = implode("<br>", $errors);
    }
}
?>

<div class="row">
    <div class="col-md-5">
        <h2>Get in Touch</h2>
        <div class="mb-4">
            <p><i class="fas fa-map-marker-alt me-2" style="color: #ffc107;"></i> Fatorda-Goa</p>
            <p><i class="fas fa-phone me-2" style="color: #ffc107;"></i> +91 7721586325</p>
            <p><i class="fas fa-envelope me-2" style="color: #ffc107;"></i> shweta@chessacademy.com</p>
            <p><i class="fas fa-clock me-2" style="color: #ffc107;"></i> Mon-Fri 9am-6pm, Sat 10am-2pm</p>
        </div>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
    <div class="col-md-7">
        <h2>Send a Message</h2>
        <?php if ($success): ?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php elseif ($error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name *</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($name) ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email *</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message *</label>
                <textarea class="form-control" id="message" name="message" rows="5" required><?= htmlspecialchars($message) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send <i class="fas fa-paper-plane"></i></button>
        </form>
    </div>
</div>
<?php include 'footer.php'; ?>