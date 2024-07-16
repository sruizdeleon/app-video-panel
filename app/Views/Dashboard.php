<main>
  <section class="container">
    <?php if (isset($user)) : ?>
      <h1>Welcome, <?= esc($user->name); ?></h1>
    <?php else : ?>
      <h1>Welcome!</h1>
    <?php endif; ?>
    <?php if (session()->getFlashdata('msg')) : ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>
    <article class="container">
      <?php if ($video) : ?>
        <article class="container">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src=""></iframe>
          </div>
          <iframe width="560" height="315" src="<?= esc($video['url']); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          <h2><?= esc($video['title']); ?></h2>
          <p><?= esc($video['date']); ?></p>
          <a class="btn btn-primary" href="<?= base_url('/management/edit/videos/' . $video['id']) ?>">Edit</a>
        </article>
      <?php else : ?>
        <h2>Haven't you uploaded your favorite video yet? Click add and upload yours.</h2>
        <form id="dashboardVideoForm" name="dashboardVideoForm" action="<?= base_url('/management/create/videos') ?>" method="post">
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>
          <div class="mb-3">
            <label for="url" class="form-label">URL</label>
            <input type="url" class="form-control" id="url" name="url">
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
        <?php endif; ?>
    </article>
  </section>
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