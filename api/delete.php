<?php
include_once 'config.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id)) {
    $query = "DELETE FROM employees WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $data->id);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Employee deleted successfully."]);
    } else {
        echo json_encode(["message" => "Failed to delete employee."]);
    }
} else {
    echo json_encode(["message" => "Incomplete data."]);
}
?>