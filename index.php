<?php
session_start();

require './config/config.php';

$page = $_GET['page'] ?? 'login';

switch ($page) {
    case 'login':
        require 'controllers/authController.php';
        break;

    case 'logout':
        session_destroy();
        header("Location: index.php?page=login");
        exit;


    case 'departments':
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php?page=login");
        exit;
    }
    require 'controllers/DepartmentController.php';
    break;

    case 'employees':
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php?page=login");
        exit;
    }
    require 'controllers/EmployeeController.php';
    break;

    case 'attendance':
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php?page=login");
        exit;
    }
    require 'controllers/AttendanceController.php';
    break;

    case 'leaves':
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php?page=login");
        exit;
    }
    require 'controllers/LeaveController.php';
    break;

    case 'payrolls':
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php?page=login");
        exit;
    }
    require 'controllers/PayrollController.php';
    break;

    case 'dashboard':
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php?page=login");
        exit;
    }
    require 'controllers/DashboardController.php';
    break;


    default:
        header("Location: index.php?page=login");
        exit;
}
