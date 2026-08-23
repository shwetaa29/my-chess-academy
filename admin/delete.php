<?php
require_once '../config.php';
require_once 'auth.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM registrations WHERE id = ?");
$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    header("Location: dashboard.php?msg=deleted");
} else {
    echo "Error deleting record.";
}
exit;
?>