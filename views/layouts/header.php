<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>HR System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php?page=dashboard">HR System</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php?page=dashboard">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?page=employees">Employees</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?page=departments">Departments</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?page=attendance">Attendance</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?page=leaves">Leaves</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?page=payrolls">Payroll</a></li>
        <li class="nav-item"><a class="nav-link text-danger" href="index.php?page=logout">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
