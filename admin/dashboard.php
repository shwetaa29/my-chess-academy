<?php
require_once '../config.php';
require_once 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background: linear-gradient(135deg, #1a2a3a, #0f1a24);
        }
        .btn-primary {
            background: #ffc107;
            border: none;
        }
        .btn-primary:hover {
            background: #e0a800;
        }
        .table {
            border-radius: 15px;
            overflow: hidden;
        }
        .table-dark th {
            background-color: #1a2a3a;
        }
        .btn-sm {
            border-radius: 50px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-dark">
    <div class="container">
        <span class="navbar-brand"><i class="fas fa-chess-king"></i> Chess Academy Admin</span>
        <div>
            <a href="dashboard.php" class="btn btn-outline-light me-2 active">Registrations</a>
            <a href="messages.php" class="btn btn-outline-light me-2">Messages</a>
            <a href="logout.php" class="btn btn-outline-light"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>
</nav>
    <div class="container mt-4">
        <h2>All Registrations</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Age</th><th>Course</th><th>Experience</th><th>Date</th><th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $conn->query("SELECT * FROM registrations ORDER BY id DESC");
                    while ($row = $result->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= $row['phone'] ?></td>
                        <td><?= $row['age'] ?></td>
                        <td><?= $row['course'] ?></td>
                        <td><?= $row['experience_level'] ?></td>
                        <td><?= $row['registration_date'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this registration?')"><i class="fas fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>