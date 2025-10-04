<?php include './views/layouts/header.php'; ?>

<h2><?= isset($attendance) ? "Edit Attendance" : "Add Attendance" ?></h2>

<form method="POST" action="">
  <?php if (isset($attendance)): ?>
    <div class="mb-3">
      <label class="form-label">Employee</label>
      <input type="text" class="form-control" value="<?= htmlspecialchars($attendance['employee_name']) ?>" readonly>
    </div>
  <?php else: ?>
    <div class="mb-3">
      <label class="form-label">Employee</label>
      <select name="employee_id" class="form-select" required>
        <option value="">-- Select Employee --</option>
        <?php foreach ($employees as $emp): ?>
          <option value="<?= $emp['id'] ?>"><?= htmlspecialchars($emp['name']) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  <?php endif; ?>

  <div class="mb-3">
    <label class="form-label">Date</label>
    <input type="date" name="date" class="form-control"
           value="<?= $attendance['date'] ?? '' ?>" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Status</label>
    <select name="status" class="form-select" required>
      <option value="Present" <?= (isset($attendance['status']) && $attendance['status'] == 'Present') ? 'selected' : '' ?>>Present</option>
      <option value="Absent" <?= (isset($attendance['status']) && $attendance['status'] == 'Absent') ? 'selected' : '' ?>>Absent</option>
    </select>
  </div>

  <button type="submit" class="btn btn-success">Save</button>
  <a href="index.php?page=attendance" class="btn btn-secondary">Cancel</a>
</form>

<?php include './views/layouts/footer.php'; ?>
