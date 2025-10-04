<?php include './views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Payrolls</h2>
  <a href="index.php?page=payrolls&action=create" class="btn btn-primary">+ Add Salary</a>
</div>

<table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th>#</th>
      <th>Employee</th>
      <th>Basic Salary</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($payrolls as $pay): ?>
      <tr>
        <td><?= $pay['id'] ?></td>
        <td><?= htmlspecialchars($pay['employee_name']) ?></td>
        <td>$<?= number_format($pay['basic_salary'], 2) ?></td>
        <td>
          <a href="index.php?page=payrolls&action=edit&id=<?= $pay['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="index.php?page=payrolls&action=delete&id=<?= $pay['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete salary?')">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include './views/layouts/footer.php'; ?>
