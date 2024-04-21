<div id="form-container">
  <?php
  include_once 'class/class.user.php';

  $user = new User();
  if ($user->get_session()) {
    header("location: index.php");
  }
  if (isset($_REQUEST['submit'])) {
    extract($_REQUEST);
    $login = $user->check_login($useremail, $password);
    if ($login) {
      header("location: index.php?page=user");
    } else {
      ?>
      <div id='error_notif'>Wrong email or password.</div>
      <?php
    }
  }
  ?>

  <div id="form-block">
    <h3>login</h3>
    <form method="POST" action="" name="login">
      <div>
        <input type="email" class="input" required name="useremail" placeholder="Valid E-mail" />
      </div>
      <div>
        <input type="password" class="input" required name="password" placeholder="Password" />
      </div>
      <div>
        <input type="submit" name="submit" value="Submit" />
      </div>
    </form>
  </div>
</div>