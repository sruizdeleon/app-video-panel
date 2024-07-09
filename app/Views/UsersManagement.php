<main>
  <div class="container">
    <h2>Users Management</h2>
    <p>In this section you can manage users and their information.</p>
    <a href="<?= base_url('/management/create/users') ?>" class="btn btn-primary">Create new user</a>
    <?php if (session()->getFlashdata('msg')) : ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user) : ?>
          <tr>
            <th scope="row"><?= esc($user->id); ?></th>
            <td><?= esc($user->name); ?></td>
            <td><?= esc($user->email); ?></td>
            <td><?= esc($user->role); ?></td>
            <td>
              <a href="<?= base_url('/management/edit/users/' . $user->id) ?>" class="btn btn-primary">Edit</a>
              <a href="<?= base_url('/management/delete/users/' . $user->id) ?>" class="btn btn-danger">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
  </div>
</main>