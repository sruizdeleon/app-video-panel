<main class="container">
  <?php if (session()->getFlashdata('msg')) : ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
  <?php endif; ?>
  <?php if (isset($videoToUpdate) && is_array($videoToUpdate) && esc($videoToUpdate['id'] && $videoToUpdate['id'] > 0)) : ?>
    <form action="<?= base_url('/management/edit/videos/' . $videoToUpdate['id']) ?>" method="post">
  <?php else : ?>
    <form action="<?= base_url('/management/create/videos') ?>" method="post">
  <?php endif ; ?>
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title" value="<?= isset($videoToUpdate) && is_array($videoToUpdate) && array_key_exists('title', $videoToUpdate) ? esc($videoToUpdate['title']) : ""; ?>" required>
    </div>
    <div class="mb-3">
      <label for="url" class="form-label">URL</label>
      <input type="url" class="form-control" id="url" name="url" value="<?= isset($videoToUpdate) && is_array($videoToUpdate) && array_key_exists('url', $videoToUpdate) ? esc($videoToUpdate['url']) : ""; ?>" required>
    </div>
    <?php if (isset($user) && $user->role == 'admin') : ?>
      <div class="mb-3">
        <label for="date" class="form-label">Date</label>
        <input type="date" class="form-control" id="date" name="date" value="<?= isset($videoToUpdate) && is_array($videoToUpdate) && array_key_exists('date', $videoToUpdate) ? esc($videoToUpdate['date']) : ""; ?>" required>
      </div>
      <div class="mb-3">
        <label for="user_id" class="form-label">User Id</label>
        <input type="number" class="form-control" id="user_id" name="user_id" value="<?= isset($videoToUpdate) && is_array($videoToUpdate) && array_key_exists('user_id', $videoToUpdate) ? esc($videoToUpdate['user_id']) : ""; ?>" required>
      </div>
    <?php endif ; ?>
    <?php if (isset($videoToUpdate) && is_array($videoToUpdate) && esc($videoToUpdate['id'] && $videoToUpdate['id'] > 0)) : ?>
      <button type="submit" class="btn btn-primary">Update</button>
    <?php else : ?>
      <button type="submit" class="btn btn-primary">Create</button>
    <?php endif ; ?>
  </form>
</main>