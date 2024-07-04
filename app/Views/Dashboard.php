<main>
  <section class="container">
    <h1>Welcome, <?session('user')->name;?></h1>
    <?php if (session()->getFlashdata('msg')) : ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>
    <!-- 16:9 aspect ratio -->
    <article class="container">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="https://www.youtube.com/watch?v=jnjjzATOgIM"></iframe>
      </div>
      <h2><? session('video')->title; ?></h2>
    </article>
    <article class="container">
      <form action="<?= base_url("changeVideo"); ?>" method="post">
        <h3>Change your video</h3>
        <div class="form-group">
          <label for="title">Video title</label>
          <input placeholder="New title" id="title" name="title" class="form-control" type="text">
        </div>
        <div class="form-group">
          <label for="url">Video URL</label>
          <input placeholder="https://youtube.com..." id="url" name="url" class="form-control" type="url">
        </div>
        <button type="submit" class="btn btn-primary">Submit changes</button>
      </form>
    </article>
  </section>
</main>