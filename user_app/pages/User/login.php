<div class="container1">
  <header>Login</header>

  <form method="post" enctype="multipart/form-data">
    <?php if (!empty($error) && isset($error)) { ?>

      <div class="alert alert-danger" role="alert">
        <?= $error ?>
      </div>
    <?php } ?>

    <?php if (!empty($success) && isset($error)) { ?>
      <div class="alert alert-success" role="alert">
        <?= $success ?>
      </div>

    <?php } ?>
    <div class="container1">
      <input type="checkbox" id="check">
      <div class="login form">
        <header>Login</header>
      
          <input type="text" placeholder="Enter your email" name="email">
          <input type="password" placeholder="Enter your password" name="password">

          <input type="submit" class="button" value="Login">
          <div class="signup">
            <span class="signup">Don't have an account?
              <a href="..\..\user\user\registration">SignUp</a>
            </span>
          </div>
        </div>
        
      </form>
    </div>
</div>

</div>