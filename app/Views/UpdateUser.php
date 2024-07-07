<main>
  <div class="container">
    <h2>Edit User</h2>
    <form action="<?= base_url('users-management/editUser/' . $userToUpdate->id) ?>" method="post">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= esc($userToUpdate->name) ?>">
      </div>
      <div class="form-group">
        <label for="surname">Surname</label>
        <input type="text" class="form-control" id="surname" name="surname" value="<?= esc($userToUpdate->surname) ?>">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= esc($userToUpdate->email) ?>">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" value="">
      </div>
      <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="url" class="form-control" id="avatar" name="avatar" value="<?= esc($userToUpdate->avatar) ?>">
      </div>
      <div class="form-group">
        <label for="role">Role</label>
        <select class="form-control" id="role" name="role">
          <option value="user" <?= $userToUpdate->role == 'user' ? 'selected' : '' ?>>User</option>
          <option value="admin" <?= $userToUpdate->role == 'admin' ? 'selected' : '' ?>>Admin</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
  </div>
</main>