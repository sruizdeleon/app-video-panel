<main class="container">
  <?php if (session()->getFlashdata('msg')) : ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
  <?php endif; ?>
  <?php if (isset($videoToUpdate) && is_array($videoToUpdate) && esc($videoToUpdate['id'] && $videoToUpdate['id'] > 0)) : ?>
    <h1>Update video</h1>
    <form id="editVideoForm" name="editVideoForm" action="<?= base_url('/management/edit/videos/' . $videoToUpdate['id']) ?>" method="post">
    <?php else : ?>
      <h1>Create video</h1>
      <form id="createVideoForm" name="createVideoForm" action="<?= base_url('/management/create/videos') ?>" method="post">
      <?php endif; ?>
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= isset($videoToUpdate) && is_array($videoToUpdate) && array_key_exists('title', $videoToUpdate) ? esc($videoToUpdate['title']) : ""; ?>">
      </div>
      <div class="mb-3">
        <label for="url" class="form-label">URL</label>
        <input type="url" class="form-control" id="url" name="url" value="<?= isset($videoToUpdate) && is_array($videoToUpdate) && array_key_exists('url', $videoToUpdate) ? esc($videoToUpdate['url']) : ""; ?>">
      </div>
      <?php if (isset($user) && $user->role == 'admin') : ?>
        <div class="mb-3">
          <label for="date" class="form-label">Date</label>
          <input type="date" class="form-control" id="date" name="date" value="<?= isset($videoToUpdate) && is_array($videoToUpdate) && array_key_exists('date', $videoToUpdate) ? esc($videoToUpdate['date']) : ""; ?>">
        </div>
        <div class="mb-3">
          <label for="user_id" class="form-label">User Id</label>
          <input type="number" class="form-control" id="user_id" name="user_id" value="<?= isset($videoToUpdate) && is_array($videoToUpdate) && array_key_exists('user_id', $videoToUpdate) ? esc($videoToUpdate['user_id']) : ""; ?>">
        </div>
      <?php endif; ?>
      <?php if (isset($videoToUpdate) && is_array($videoToUpdate) && esc($videoToUpdate['id'] && $videoToUpdate['id'] > 0)) : ?>
        <button type="submit" class="btn btn-primary">Update</button>
      <?php else : ?>
        <button type="submit" class="btn btn-primary">Create</button>
      <?php endif; ?>
      </form>
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
<script type="text/javascript" src="/app-video-panel/public/js/validations/Video.js"></script>
</body>