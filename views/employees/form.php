<?php include './views/layouts/header.php'; ?>

<h2><?= isset($employee) ? "Edit Employee" : "Add Employee" ?></h2>

<form method="POST" action="">
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control"
           value="<?= $employee['name'] ?? '' ?>" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control"
           value="<?= $employee['email'] ?? '' ?>" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Phone</label>
    <input type="text" name="phone" class="form-control"
           value="<?= $employee['phone'] ?? '' ?>">
  </div>

  <div class="mb-3">
    <label class="form-label">Department</label>
    <select name="department_id" class="form-select">
      <option value="">-- Select Department --</option>
      <?php foreach ($departments as $dept): ?>
        <option value="<?= $dept['id'] ?>"
          <?= isset($employee['department_id']) && $employee['department_id'] == $dept['id'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($dept['name']) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <button type="submit" class="btn btn-success">Save</button>
  <a href="index.php?page=employees" class="btn btn-secondary">Cancel</a>
</form>

<?php include './views/layouts/footer.php'; ?>
