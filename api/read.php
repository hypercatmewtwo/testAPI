<?php
include_once 'config.php';

$query = "SELECT * FROM employees";
$stmt = $conn->prepare($query);
$stmt->execute();

$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($employees);
?>