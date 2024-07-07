<main class="container">
  <?php if (session()->getFlashdata('msg')) : ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
  <?php endif; ?>
  <form action="<?= base_url('dashboard/updateVideo') ?>" method="post">
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title" value="<?= isset($video) && is_array($video) && array_key_exists('title', $video) ? esc($video['title']) : ""; ?>" required>
    </div>
    <div class="mb-3">
      <label for="url" class="form-label">URL</label>
      <input type="url" class="form-control" id="url" name="url" value="<?= isset($video) && is_array($video) && array_key_exists('url', $video) ? esc($video['url']) : ""; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</main>