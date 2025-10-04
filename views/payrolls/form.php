<?php include './views/layouts/header.php'; ?>

<h2><?= isset($payroll) ? "Edit Salary" : "Add Salary" ?></h2>

<form method="POST" action="">
  <div class="mb-3">
    <label class="form-label">Employee</label>
    <select name="employee_id" class="form-select" required>
      <option value="">-- Select Employee --</option>
      <?php foreach ($employees as $emp): ?>
        <option value="<?= $emp['id'] ?>"
          <?= isset($payroll['employee_id']) && $payroll['employee_id'] == $emp['id'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($emp['name']) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="mb-3">
    <label class="form-label">Basic Salary</label>
    <input type="number" step="0.01" name="basic_salary" class="form-control"
           value="<?= $payroll['basic_salary'] ?? '' ?>" required>
  </div>

  <button type="submit" class="btn btn-success">Save</button>
  <a href="index.php?page=payrolls" class="btn btn-secondary">Cancel</a>
</form>

<?php include './views/layouts/footer.php'; ?>
