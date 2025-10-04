<?php include 'views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Employees</h2>
  <a href="index.php?page=employees&action=create" class="btn btn-primary">+ Add Employee</a>
</div>

<table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Department</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($employees as $emp): ?>
      <tr>
        <td><?= $emp['id'] ?></td>
        <td><?= htmlspecialchars($emp['name']) ?></td>
        <td><?= htmlspecialchars($emp['email']) ?></td>
        <td><?= htmlspecialchars($emp['phone']) ?></td>
        <td><?= htmlspecialchars($emp['department_name'] ?? '-') ?></td>
        <td>
          <a href="index.php?page=employees&action=edit&id=<?= $emp['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="index.php?page=employees&action=delete&id=<?= $emp['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include 'views/layouts/footer.php'; ?>
