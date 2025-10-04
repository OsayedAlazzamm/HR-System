<?php
require './config/config.php';

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'index':
        $stmt = $conn->query("
            SELECT employees.*, departments.name AS department_name 
            FROM employees 
            LEFT JOIN departments ON employees.department_id = departments.id
            ORDER BY employees.id DESC
        ");
        $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include './views/employees/index.php';
        break;

    case 'create':
        $departments = $conn->query("SELECT * FROM departments")->fetchAll(PDO::FETCH_ASSOC);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $conn->prepare("INSERT INTO employees (name, email, phone, department_id) VALUES (:name, :email, :phone, :department_id)");
            $stmt->execute([
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'department_id' => $_POST['department_id'] ?: null
            ]);
            header("Location: index.php?page=employees");
            exit;
        }
        include './views/employees/form.php';
        break;

    case 'edit':
        $id = $_GET['id'] ?? null;
        if (!$id) { header("Location: index.php?page=employees"); exit; }

        $departments = $conn->query("SELECT * FROM departments")->fetchAll(PDO::FETCH_ASSOC);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $conn->prepare("UPDATE employees SET name = :name, email = :email, phone = :phone, department_id = :department_id WHERE id = :id");
            $stmt->execute([
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'department_id' => $_POST['department_id'] ?: null,
                'id' => $id
            ]);
            header("Location: index.php?page=employees");
            exit;
        }

        $stmt = $conn->prepare("SELECT * FROM employees WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $employee = $stmt->fetch(PDO::FETCH_ASSOC);

        include './views/employees/form.php';
        break;

    case 'delete':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $stmt = $conn->prepare("DELETE FROM employees WHERE id = :id");
            $stmt->execute(['id' => $id]);
        }
        header("Location: index.php?page=employees");
        exit;
}
