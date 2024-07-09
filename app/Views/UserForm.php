<main>
  <div class="container">
    <?php if (session()->getFlashdata('msg')) : ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>
    <?php if (isset($user) && esc($user->role) && $user->role === 'admin') : ?>
      <?php if (isset($userToUpdate)) : ?>
        <?php if (esc($user->id) && esc($userToUpdate->id) && $userToUpdate->id == $user->id) : ?>
          <h2>My profile</h2>
          <form action="<?= base_url("/management/edit/users/" . $user->id); ?>" method="post">
        <?php else : ?>
          <h2>Edit User</h2>
          <form action="<?= base_url("/management/edit/users/" . $userToUpdate->id); ?>" method="post">
        <?php endif; ?>
      <?php else : ?>
        <h2>Create User</h2>
        <form action="<?= base_url("/management/create/users"); ?>" method="post">
      <?php endif; ?>
    <?php else : ?>
      <h2>My profile</h2>
      <form action="<?= base_url("/management/edit/users/" . $user->id); ?>" method="post">
    <?php endif; ?>
            <?php if (isset($user) && esc($user->role && $user->role === 'admin')) : ?>
              <div class="form-group">
                <label for="id">User id</label>
                <input class="form-control" type="number" name="id" id="id" value="<?= esc($userToUpdate->id); ?>">
              </div>
              <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role">
                  <option <?= esc($userToUpdate->role) === 'user' ? "selected" : ""; ?> value="user">User</option>
                  <option <?= esc($userToUpdate->role) === 'admin' ? "selected" : ""; ?> value="admin">Admin</option>
                </select>
              </div>
            <?php elseif (isset($user) && esc($user->id && $user->id > 0)) : ?>
              <input type="hidden" name="id" value="<?= esc($userToUpdate->id); ?>">
              <input type="hidden" name="role" value="<?= esc($userToUpdate->role); ?>">
            <?php endif; ?>
            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="name" class="form-control" id="name" name="name" value="<?= esc($userToUpdate->name); ?>">
            </div>
            <div class="form-group">
              <label for="surname">Apellidos</label>
              <input type="surname" class="form-control" id="surname" name="surname" value="<?= esc($userToUpdate->surname); ?>">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="<?= esc($userToUpdate->email); ?>">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
              <label for="avatar">Avatar</label>
              <input type="avatar" class="form-control" id="avatar" name="avatar" value="<?= esc($userToUpdate->avatar); ?>" placeholder="E.g.: https://miavatar.com">
            </div>
            <?php if (isset($user) && esc($user->id && $user->id > 0)) : ?>
              <button type="submit" class="btn btn-primary">Update</button>
            <?php else : ?>
              <button type="submit" class="btn btn-primary">Register</button>
            <?php endif; ?>
            </form>
  </div>
</main>