<main>
  <div class="container">
    <?php if (session()->getFlashdata('msg')) : ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>
    <h2>Register</h2>
    <form name="registerForm" id="registerForm" action="<?= base_url("/management/create/users"); ?>" method="post">
      <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" autocomplete="name">
      </div>
      <div class="form-group">
        <label for="surname">Apellidos</label>
        <input type="text" class="form-control" id="surname" name="surname" autocomplete="family-name">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" autocomplete="username">
      </div>
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
      <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="text" class="form-control" id="avatar" name="avatar" placeholder="E.g.: https://miavatar.com" autocomplete="url">
      </div>
      <div class="form-group">
        <br>
        <button name="button" id="button" type="submit" class="btn btn-primary">Register</button>
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
<script type="text/javascript" src="/app-video-panel/public/js/validations/Register.js"></script>
<script type="text/javascript" src="/app-video-panel/public/js/validations/Events.js"></script>