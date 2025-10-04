<?php include './views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Departments</h2>
  <a href="index.php?page=departments&action=create" class="btn btn-primary">+ Add Department</a>
</div>

<table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($departments as $dept): ?>
      <tr>
        <td><?= $dept['id'] ?></td>
        <td><?= htmlspecialchars($dept['name']) ?></td>
        <td>
          <a href="index.php?page=departments&action=edit&id=<?= $dept['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="index.php?page=departments&action=delete&id=<?= $dept['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include './views/layouts/footer.php'; ?>
