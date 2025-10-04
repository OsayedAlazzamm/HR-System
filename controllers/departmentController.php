<?php
require './config/config.php';

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'index':
        $stmt = $conn->query("SELECT * FROM departments ORDER BY id DESC");
        $departments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include './views/departments/index.php';
        break;

    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $conn->prepare("INSERT INTO departments (name) VALUES (:name)");
            $stmt->execute(['name' => $_POST['name']]);
            header("Location: index.php?page=departments");
            exit;
        }
        include './views/departments/form.php';
        break;

    case 'edit':
        $id = $_GET['id'] ?? null;
        if (!$id) { header("Location: index.php?page=departments"); exit; }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $conn->prepare("UPDATE departments SET name = :name WHERE id = :id");
            $stmt->execute(['name' => $_POST['name'], 'id' => $id]);
            header("Location: index.php?page=departments");
            exit;
        }

        $stmt = $conn->prepare("SELECT * FROM departments WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $department = $stmt->fetch(PDO::FETCH_ASSOC);

        include './views/departments/form.php';
        break;

    case 'delete':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $stmt = $conn->prepare("DELETE FROM departments WHERE id = :id");
            $stmt->execute(['id' => $id]);
        }
        header("Location: index.php?page=departments");
        exit;
}
