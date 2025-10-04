<?php include './views/layouts/header.php'; ?>

<h2><?= isset($department) ? "Edit Department" : "Add Department" ?></h2>

<form method="POST" action="">
  <div class="mb-3">
    <label class="form-label">Department Name</label>
    <input type="text" name="name" class="form-control" 
           value="<?= isset($department) ? htmlspecialchars($department['name']) : '' ?>" required>
  </div>
  <button type="submit" class="btn btn-success">Save</button>
  <a href="index.php?page=departments" class="btn btn-secondary">Cancel</a>
</form>

<?php include './views/layouts/footer.php'; ?>
