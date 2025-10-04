<?php
require './config/config.php';

$totalEmployees = $conn->query("SELECT COUNT(*) FROM employees")->fetchColumn();

$totalDepartments = $conn->query("SELECT COUNT(*) FROM departments")->fetchColumn();

$pendingLeaves = $conn->query("SELECT COUNT(*) FROM leaves WHERE status = 'Pending'")->fetchColumn();

$stmt = $conn->query("
    SELECT d.name AS department_name, COUNT(e.id) AS total_employees
    FROM departments d
    LEFT JOIN employees e ON e.department_id = d.id
    GROUP BY d.id
");
$employeesByDept = $stmt->fetchAll(PDO::FETCH_ASSOC);

include './views/dashboard.php';
