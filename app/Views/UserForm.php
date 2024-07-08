<main>
  <div class="container">
    <h2>Register</h2>
    <?php if (session()->getFlashdata('msg')) : ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>
    <form action="<?= base_url("/management/create/users"); ?>" method="post">
      <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="name" class="form-control" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="surname">Apellidos:</label>
        <input type="surname" class="form-control" id="surname" name="surname" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="avatar">Avatar:</label>
        <input type="avatar" class="form-control" id="avatar" name="avatar" placeholder="E.g.: https://miavatar.com">
      </div>
      <button type="submit" class="btn btn-primary">Register</button>
    </form>
  </div>
</main>