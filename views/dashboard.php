<?php include './views/layouts/header.php'; ?>

<h2 class="mb-4">Dashboard</h2>

<div class="row">
  <div class="col-md-4">
    <div class="card text-center shadow p-3">
      <h5>Total Employees</h5>
      <h2><?= $totalEmployees ?></h2>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card text-center shadow p-3">
      <h5>Total Departments</h5>
      <h2><?= $totalDepartments ?></h2>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card text-center shadow p-3">
      <h5>Pending Leaves</h5>
      <h2><?= $pendingLeaves ?></h2>
    </div>
  </div>
</div>

<hr class="my-4">

<h3>Employees by Department</h3>
<table class="table table-bordered table-striped mt-3">
  <thead class="table-dark">
    <tr>
      <th>Department</th>
      <th>Employees</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($employeesByDept as $dept): ?>
      <tr>
        <td><?= htmlspecialchars($dept['department_name']) ?></td>
        <td><?= $dept['total_employees'] ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include './views/layouts/footer.php'; ?>
