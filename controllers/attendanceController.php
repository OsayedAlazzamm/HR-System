<?php
require './config/config.php';

$action = $_GET['action'] ?? 'index';

switch ($action) {

    case 'index':
        $employees = $conn->query("SELECT * FROM employees")->fetchAll(PDO::FETCH_ASSOC);

        $employeeFilter = $_GET['employee_id'] ?? null;

        if ($employeeFilter) {
            $stmt = $conn->prepare("
                SELECT a.*, e.name AS employee_name 
                FROM attendance a
                JOIN employees e ON a.employee_id = e.id
                WHERE e.id = :employee_id
                ORDER BY a.date DESC
            ");
            $stmt->execute(['employee_id' => $employeeFilter]);
        } else {
            $stmt = $conn->query("
                SELECT a.*, e.name AS employee_name 
                FROM attendance a
                JOIN employees e ON a.employee_id = e.id
                ORDER BY a.date DESC
            ");
        }

        $attendances = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include './views/attendance/index.php';
        break;

    case 'create':
        $employees = $conn->query("SELECT * FROM employees")->fetchAll(PDO::FETCH_ASSOC);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $conn->prepare("INSERT INTO attendance (employee_id, date, status) VALUES (:employee_id, :date, :status)");
            $stmt->execute([
                'employee_id' => $_POST['employee_id'],
                'date' => $_POST['date'],
                'status' => $_POST['status']
            ]);
            header("Location: index.php?page=attendance");
            exit;
        }

        include './views/attendance/mark.php';
        break;


    case 'edit':
        $id = $_GET['id'] ?? null;
        if (!$id) { header("Location: index.php?page=attendance"); exit; }

        $stmt = $conn->prepare("
            SELECT a.*, e.name AS employee_name 
            FROM attendance a
            JOIN employees e ON a.employee_id = e.id
            WHERE a.id = :id
        ");
        $stmt->execute(['id' => $id]);
        $attendance = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $conn->prepare("
                UPDATE attendance 
                SET date = :date, status = :status
                WHERE id = :id
            ");
            $stmt->execute([
                'date' => $_POST['date'],
                'status' => $_POST['status'],
                'id' => $id
            ]);
            header("Location: index.php?page=attendance");
            exit;
        }

        include './views/attendance/mark.php';
        break;

    case 'delete':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $stmt = $conn->prepare("DELETE FROM attendance WHERE id = :id");
            $stmt->execute(['id' => $id]);
        }
        header("Location: index.php?page=attendance");
        exit;
}
