<main>
  <div class="container">
    <h2>Login</h2>
    <?php if (session()->getFlashdata('msg')) : ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>
    <form name="loginForm" id="loginForm" action="<?= base_url("login"); ?>" method="post">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="name@mail.com">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password">
        <span id="btn-password" class="fa fa-fw fa-eye password-icon show-password"></span>
      </div>
      <div class="form-group">
        <br>
        <button name="button" id="button" type="submit" class="btn btn-primary">Login</button>
      </div>
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
<script type="text/javascript" src="/app-video-panel/public/js/events/password/ShowPassword.js"></script>