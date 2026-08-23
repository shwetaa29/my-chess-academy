<?php include 'header.php'; ?>
<?php
require_once 'config.php';

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $age = intval($_POST['age']);
    $course = $_POST['course'];
    $experience = $_POST['experience'];

    // Server-side validation
    $errors = [];
    if (strlen($name) < 2) $errors[] = "Name must be at least 2 characters.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email address.";
    if (!preg_match('/^[0-9]{10}$/', $phone)) $errors[] = "Phone must be 10 digits.";
    if ($age < 5 || $age > 100) $errors[] = "Age must be between 5 and 100.";
    if (empty($course)) $errors[] = "Please select a course.";
    if (empty($experience)) $errors[] = "Please select experience level.";

    if (empty($errors)) {
        // Check if email already exists
        $check = $conn->prepare("SELECT id FROM registrations WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();
        if ($check->num_rows > 0) {
            $error = "Email already registered!";
        } else {
            $stmt = $conn->prepare("INSERT INTO registrations (name, email, phone, age, course, experience_level) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssiss", $name, $email, $phone, $age, $course, $experience);
            if ($stmt->execute()) {
                $success = "Registration successful! We'll contact you soon.";
            } else {
                $error = "Registration failed. Please try again.";
            }
            $stmt->close();
        }
        $check->close();
    } else {
        $error = implode("<br>", $errors);
    }
}
?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <h2 class="text-center mb-4">Student Registration</h2>
        <?php if ($success): ?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php elseif ($error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form id="registrationForm" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name *</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email *</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone (10 digits) *</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age *</label>
                <input type="number" class="form-control" id="age" name="age" min="5" max="100" required>
            </div>
            <div class="mb-3">
                <label for="course" class="form-label">Course *</label>
                <select class="form-select" id="course" name="course" required>
                    <option value="">Select a course</option>
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                    <option value="Masterclass">Masterclass</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="experience" class="form-label">Experience Level *</label>
                <select class="form-select" id="experience" name="experience" required>
                    <option value="">Select</option>
                    <option value="Beginner">Beginner (No experience)</option>
                    <option value="Intermediate">Intermediate (Knows rules)</option>
                    <option value="Advanced">Advanced (Tournament player)</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Register <i class="fas fa-check"></i></button>
        </form>
    </div>
</div>
<?php include 'footer.php'; ?>