<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <title><?= isset($pageTitle) ? $pageTitle : "Default page" ?></title>
</head>

<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url(); ?>">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php if (isset($user)) : ?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?= base_url("dashboard"); ?>">Dashboard</a>
            </li>
            <?php if ($user->role == 'admin') : ?>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?= base_url("management/users"); ?>">Users Management</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?= base_url("management/videos"); ?>">Video Management</a>
              </li>
            <?php else : ?>
            <?php endif; ?>
          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?= base_url("login"); ?>">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?= base_url("register"); ?>">Register</a>
            </li>
          <?php endif; ?>
        </ul>
        <?php if (isset($user)) : ?>
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
              <form action="<?= base_url("logout") ?>" method="post">
                <button type="submit" class="btn btn-primary">Logout</button>
              </form>
            </li>
          </ul>
        <?php endif; ?>
      </div>
    </div>
  </nav>
</header>