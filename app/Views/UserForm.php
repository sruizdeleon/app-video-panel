<main>
  <div class="container">
    <?php if (session()->getFlashdata('msg')) : ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>
    <?php if (isset($user) && esc($user->role) && $user->role === 'admin') : ?>
      <?php if (isset($userToUpdate)) : ?>
        <?php if (esc($user->id) && esc($userToUpdate->id) && $userToUpdate->id == $user->id) : ?>
          <h2>My profile</h2>
          <form id="editUserAdminForm" name="editUserAdminForm" action="<?= base_url("/management/edit/users/" . $user->id); ?>" method="post">
          <?php else : ?>
            <h2>Edit User</h2>
            <form id="editUserAdminForm" name="editUserAdminForm" action="<?= base_url("/management/edit/users/" . $userToUpdate->id); ?>" method="post">
            <?php endif; ?>
          <?php else : ?>
            <h2>Create User</h2>
            <form id="editUserAdminForm" name="editUserAdminForm" action="<?= base_url("/management/create/users"); ?>" method="post">
            <?php endif; ?>
          <?php else : ?>
            <h2>My profile</h2>
            <form id="editUserAdminForm" name="editUserAdminForm" action="<?= base_url("/management/edit/users/" . $user->id); ?>" method="post">
            <?php endif; ?>
            <?php if (isset($user) && esc($user->role && $user->role === 'admin')) : ?>
              <?php if (isset($userToUpdate) && esc($userToUpdate->id)) : ?>
                <div class="form-group">
                  <label for="id">User id</label>
                  <input class="form-control" type="number" name="id" id="id" value="<?= isset($userToUpdate) ? esc($userToUpdate->id) : "" ; ?>">
                </div>
              <?php endif; ?>
              <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role">
                  <option <?= (isset($userToUpdate) && esc($userToUpdate->role) === 'user') ? "selected" : ""; ?> value="user">User</option>
                  <option <?= (isset($userToUpdate) && esc($userToUpdate->role) === 'admin') ? "selected" : ""; ?> value="admin">Admin</option>
                </select>
              </div>
            <?php elseif (isset($user) && esc($user->id && $user->id > 0)) : ?>
              <input type="hidden" name="id" value="<?= isset($userToUpdate) ? esc($userToUpdate->id) : ""; ?>">
              <input type="hidden" name="role" value="<?= isset($userToUpdate) ? esc($userToUpdate->role) : ""; ?>">
            <?php endif; ?>
            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="name" class="form-control" id="name" name="name" autocomplete="name" value="<?= isset($userToUpdate) ? esc($userToUpdate->name) : ""; ?>">
            </div>
            <div class="form-group">
              <label for="surname">Apellidos</label>
              <input type="surname" class="form-control" id="surname" name="surname" autocomplete="family-name" value="<?= isset($userToUpdate) ? esc($userToUpdate->surname) : ""; ?>">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" autocomplete="username" value="<?= isset($userToUpdate) ? esc($userToUpdate->email) : ""; ?>">
            </div>
            <div class="form-group">
              <label for="avatar">Avatar</label>
              <input type="avatar" class="form-control" id="avatar" name="avatar" value="<?= isset($userToUpdate) ? esc($userToUpdate->avatar) : ""; ?>" placeholder="E.g.: https://miavatar.com">
            </div>
            <div id="passwordContainer"></div>
            <?php if (isset($userToUpdate) && esc($userToUpdate->id)) : ?>
              <br>
              <button type="button" id="buttonEditPassword" class="btn btn-warning" style="display: block;">Edit Password</button>
              <button type="button" id="buttonRemovePassword" class="btn btn-warning" style="display: none;">Remove Password Fields</button>
              <br>
            <?php else : ?>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" autocomplete="new-password">
                <span id="btn-password" class="fa fa-fw fa-eye password-icon show-password"></span>
              </div>
              <div class="form-group">
                <label for="password_confirmation">Confirm your password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" autocomplete="new-password">
                <span id="btn-password-confirmation" class="fa fa-fw fa-eye password-icon show-password"></span>
              </div>
              <br>
            <?php endif; ?>
            <?php if (isset($userToUpdate) && esc($userToUpdate->id > 0)) : ?>
              <button type="submit" class="btn btn-primary">Update</button>
            <?php else : ?>
              <button type="submit" class="btn btn-primary">Create</button>
            <?php endif; ?>
            </form>
  </div>
</main>
<style>
  .password-icon {
    float: right;
    position: relative;
    margin: -25px 10px 0 0;
    cursor: pointer;
  }

  label.error {
    color: red;
    font-size: small;
  }
</style>
<script type="text/javascript" src="/app-video-panel/public/js/validations/User.js"></script>
<script type="text/javascript" src="/app-video-panel/public/js/events/password/PasswordFields.js"></script>
</body>