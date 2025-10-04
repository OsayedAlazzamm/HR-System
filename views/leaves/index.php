<?php include './views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Leaves</h2>
  <a href="index.php?page=leaves&action=create" class="btn btn-primary">+ Request Leave</a>
</div>

<table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th>#</th>
      <th>Employee</th>
      <th>Start Date</th>
      <th>End Date</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($leaves as $leave): ?>
      <tr>
        <td><?= $leave['id'] ?></td>
        <td><?= htmlspecialchars($leave['employee_name']) ?></td>
        <td><?= $leave['start_date'] ?></td>
        <td><?= $leave['end_date'] ?></td>
        <td>
          <span class="badge 
            <?php if ($leave['status'] === 'Pending') echo 'bg-warning';
                  elseif ($leave['status'] === 'Approved') echo 'bg-success';
                  else echo 'bg-danger'; ?>">
            <?= $leave['status'] ?>
          </span>
        </td>
        <td>
          <?php if ($leave['status'] === 'Pending'): ?>
            <a href="index.php?page=leaves&action=approve&id=<?= $leave['id'] ?>" class="btn btn-sm btn-success">Approve</a>
            <a href="index.php?page=leaves&action=reject&id=<?= $leave['id'] ?>" class="btn btn-sm btn-danger">Reject</a>
          <?php else: ?>
            <em>No actions</em>
          <?php endif; ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include './views/layouts/footer.php'; ?>
