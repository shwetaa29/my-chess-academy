<?php
require_once '../config.php';
require_once 'auth.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM registrations WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$registration = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $course = $_POST['course'];
    $experience = $_POST['experience'];

    $update = $conn->prepare("UPDATE registrations SET name=?, email=?, phone=?, age=?, course=?, experience_level=? WHERE id=?");
    $update->bind_param("sssissi", $name, $email, $phone, $age, $course, $experience, $id);
    if ($update->execute()) {
        header("Location: dashboard.php?msg=updated");
        exit;
    } else {
        $error = "Update failed.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Registration</h2>
        <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
        <form method="POST">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($registration['name']) ?>" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?= $registration['email'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" value="<?= $registration['phone'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Age</label>
                <input type="number" name="age" class="form-control" value="<?= $registration['age'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Course</label>
                <select name="course" class="form-select" required>
                    <option value="Beginner" <?= $registration['course'] == 'Beginner' ? 'selected' : '' ?>>Beginner</option>
                    <option value="Intermediate" <?= $registration['course'] == 'Intermediate' ? 'selected' : '' ?>>Intermediate</option>
                    <option value="Advanced" <?= $registration['course'] == 'Advanced' ? 'selected' : '' ?>>Advanced</option>
                    <option value="Masterclass" <?= $registration['course'] == 'Masterclass' ? 'selected' : '' ?>>Masterclass</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Experience Level</label>
                <select name="experience" class="form-select" required>
                    <option value="Beginner" <?= $registration['experience_level'] == 'Beginner' ? 'selected' : '' ?>>Beginner</option>
                    <option value="Intermediate" <?= $registration['experience_level'] == 'Intermediate' ? 'selected' : '' ?>>Intermediate</option>
                    <option value="Advanced" <?= $registration['experience_level'] == 'Advanced' ? 'selected' : '' ?>>Advanced</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>