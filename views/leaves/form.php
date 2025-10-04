<?php include './views/layouts/header.php'; ?>

<h2>Request Leave</h2>

<form method="POST" action="">
  <div class="mb-3">
    <label class="form-label">Employee</label>
    <select name="employee_id" class="form-select" required>
      <option value="">-- Select Employee --</option>
      <?php foreach ($employees as $emp): ?>
        <option value="<?= $emp['id'] ?>"><?= htmlspecialchars($emp['name']) ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="mb-3">
    <label class="form-label">Start Date</label>
    <input type="date" name="start_date" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">End Date</label>
    <input type="date" name="end_date" class="form-control" required>
  </div>

  <button type="submit" class="btn btn-success">Submit</button>
  <a href="index.php?page=leaves" class="btn btn-secondary">Cancel</a>
</form>

<?php include './views/layouts/footer.php'; ?>
