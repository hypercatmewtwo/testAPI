<?php
include_once 'config.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id)) {
    $query = "UPDATE employees SET 
        emp_id = :emp_id, 
        full_name = :full_name, 
        job_title = :job_title, 
        department = :department, 
        gender = :gender, 
        age = :age, 
        hire_date = :hire_date, 
        annual_salary = :annual_salary, 
        bonus = :bonus, 
        city = :city 
        WHERE id = :id";
    
    $stmt = $conn->prepare($query);

    $stmt->bindParam(":emp_id", $data->emp_id);
    $stmt->bindParam(":full_name", $data->full_name);
    $stmt->bindParam(":job_title", $data->job_title);
    $stmt->bindParam(":department", $data->department);
    $stmt->bindParam(":gender", $data->gender);
    $stmt->bindParam(":age", $data->age);
    $stmt->bindParam(":hire_date", $data->hire_date);
    $stmt->bindParam(":annual_salary", $data->annual_salary);
    $stmt->bindParam(":bonus", $data->bonus);
    $stmt->bindParam(":city", $data->city);
    $stmt->bindParam(":id", $data->id);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Employee updated successfully."]);
    } else {
        echo json_encode(["message" => "Failed to update employee."]);
    }
} else {
    echo json_encode(["message" => "Incomplete data."]);
}
?>