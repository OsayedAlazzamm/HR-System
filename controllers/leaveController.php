<?php
require './config/config.php';

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'index':
        $stmt = $conn->query("
            SELECT leaves.*, employees.name AS employee_name
            FROM leaves
            JOIN employees ON leaves.employee_id = employees.id
            ORDER BY leaves.start_date DESC
        ");
        $leaves = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include './views/leaves/index.php';
        break;

    case 'create':
        $employees = $conn->query("SELECT * FROM employees")->fetchAll(PDO::FETCH_ASSOC);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $conn->prepare("INSERT INTO leaves (employee_id, start_date, end_date, status) VALUES (:employee_id, :start_date, :end_date, 'Pending')");
            $stmt->execute([
                'employee_id' => $_POST['employee_id'],
                'start_date' => $_POST['start_date'],
                'end_date' => $_POST['end_date']
            ]);
            header("Location: index.php?page=leaves");
            exit;
        }

        include './views/leaves/form.php';
        break;

    case 'approve':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $stmt = $conn->prepare("UPDATE leaves SET status = 'Approved' WHERE id = :id");
            $stmt->execute(['id' => $id]);
        }
        header("Location: index.php?page=leaves");
        exit;

    case 'reject':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $stmt = $conn->prepare("UPDATE leaves SET status = 'Rejected' WHERE id = :id");
            $stmt->execute(['id' => $id]);
        }
        header("Location: index.php?page=leaves");
        exit;
}
