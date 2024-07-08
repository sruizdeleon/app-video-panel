<main>
  <div class="container">
    <h2>Videos Management</h2>
    <p>In this section you can manage videos and their information.</p>
    <a href="<?= base_url('/management/create/videos') ?>" class="btn btn-primary">Create new video</a>
    <?php if (session()->getFlashdata('msg')) : ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Title</th>
          <th scope="col">User ID</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($videos as $video) : ?>
          <tr>
            <th scope="row"><?= esc($video['id']); ?></th>
            <td><?= esc($video['title']); ?></td>
            <td><?= esc($video['user_id']); ?></td>
            <td>
              <a href="<?= base_url('/management/edit/videos/' . $video['id']) ?>" class="btn btn-primary">Edit</a>
              <a href="<?= base_url('/management/delete/videos/' . $video['id']) ?>" class="btn btn-danger">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
  </div>
</main>