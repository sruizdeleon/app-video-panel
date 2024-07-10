<main>
  <div class="container">
    <?php if (session()->getFlashdata('msg')) : ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>
    <section>
      <h2>My profile</h2>
      <img src="<?= esc($user->avatar); ?>" alt="Avatar" class="img-thumbnail rounded-circle" style="width:20%">
      <div class="form-group">
        <h5>Nombre</h5>
        <p><?= esc($user->name); ?></p>
      </div>
      <div class="form-group">
        <h5>Apellidos</h5>
        <p><?= esc($user->surname); ?></p>
      </div>
      <div class="form-group">
        <h5>Email</h5>
        <p><?= esc($user->email); ?></p>
      </div>
      <a class="btn btn-primary" href="<?= base_url('/management/edit/users/' . $user->id) ?>">Edit</a>
    </section>
  </div>
</main>