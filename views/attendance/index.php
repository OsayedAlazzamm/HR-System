<?php include './views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Attendance Records</h2>
  <a href="index.php?page=attendance&action=create" class="btn btn-primary">+ Mark Attendance</a>
</div>

<form method="GET" class="row mb-3">
  <input type="hidden" name="page" value="attendance">
  
  <div class="col-md-6">
    <select name="employee_id" class="form-select" onchange="this.form.submit()">
      <option value="">-- All Employees --</option>
      <?php foreach ($employees as $emp): ?>
        <option value="<?= $emp['id'] ?>" 
          <?= (isset($_GET['employee_id']) && $_GET['employee_id'] == $emp['id']) ? 'selected' : '' ?>>
          <?= htmlspecialchars($emp['name']) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

</form>

<table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th>#</th>
      <th>Employee</th>
      <th>Date</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($attendances as $att): ?>
      <tr>
        <td><?= $att['id'] ?></td>
        <td><?= htmlspecialchars($att['employee_name']) ?></td>
        <td><?= $att['date'] ?></td>
        <td>
          <span class="badge <?= $att['status'] == 'Present' ? 'bg-success' : 'bg-danger' ?>">
            <?= $att['status'] ?>
          </span>
        </td>
        <td>
          <a href="index.php?page=attendance&action=edit&id=<?= $att['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="index.php?page=attendance&action=delete&id=<?= $att['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete attendance?')">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include './views/layouts/footer.php'; ?>
