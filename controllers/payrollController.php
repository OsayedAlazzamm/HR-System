<?php
require './config/config.php';

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'index':
        $stmt = $conn->query("
            SELECT payrolls.*, employees.name AS employee_name
            FROM payrolls
            JOIN employees ON payrolls.employee_id = employees.id
            ORDER BY payrolls.id DESC
        ");
        $payrolls = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include './views/payrolls/index.php';
        break;

    case 'create':
        $employees = $conn->query("SELECT * FROM employees")->fetchAll(PDO::FETCH_ASSOC);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $conn->prepare("INSERT INTO payrolls (employee_id, basic_salary) VALUES (:employee_id, :basic_salary)");
            $stmt->execute([
                'employee_id' => $_POST['employee_id'],
                'basic_salary' => $_POST['basic_salary']
            ]);
            header("Location: index.php?page=payrolls");
            exit;
        }

        include './views/payrolls/form.php';
        break;

    case 'edit':
        $id = $_GET['id'] ?? null;
        if (!$id) { header("Location: index.php?page=payrolls"); exit; }

        $employees = $conn->query("SELECT * FROM employees")->fetchAll(PDO::FETCH_ASSOC);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $conn->prepare("UPDATE payrolls SET employee_id = :employee_id, basic_salary = :basic_salary WHERE id = :id");
            $stmt->execute([
                'employee_id' => $_POST['employee_id'],
                'basic_salary' => $_POST['basic_salary'],
                'id' => $id
            ]);
            header("Location: index.php?page=payrolls");
            exit;
        }

        $stmt = $conn->prepare("SELECT * FROM payrolls WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $payroll = $stmt->fetch(PDO::FETCH_ASSOC);

        include './views/payrolls/form.php';
        break;

    case 'delete':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $stmt = $conn->prepare("DELETE FROM payrolls WHERE id = :id");
            $stmt->execute(['id' => $id]);
        }
        header("Location: index.php?page=payrolls");
        exit;

    case 'view':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $stmt = $conn->prepare("
                SELECT payrolls.*, employees.name AS employee_name
                FROM payrolls
                JOIN employees ON payrolls.employee_id = employees.id
                WHERE payrolls.id = :id
            ");
            $stmt->execute(['id' => $id]);
            $payroll = $stmt->fetch(PDO::FETCH_ASSOC);

            include './views/payrolls/form.php';
        }
        break;
}
