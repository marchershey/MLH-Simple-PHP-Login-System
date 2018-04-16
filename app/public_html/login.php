<?php
  require_once '../php/init.php';
  require_once '../php/login/submit.login.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?=$global['site']['meta']['description'];?>">
    <meta name="author" content="<?=$global['site']['meta']['author'];?>">
    <meta name="keyword" content="<?=$global['site']['meta']['author'];?>">
    <?=$global['site']['favicon']['enabled'] ? '<link rel="icon" type="image/png" href="'.$global['site']['favicon']['path'].'" />' : '';?>

    <title>Sign In | <?=$global['site']['name']; echo (!empty($global['site']['tagline']) ? ' - '.$global['site']['tagline']:'')?></title>

    <!-- Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">

  </head>

  <body class="login flex-row align-items-center">
    <div class="container mt-">
      <div class="row justify-content-center">
        <div class="col-md-5">
          <div class="card mx-1">
            <div class="card-body p-4">
              <form action="login.php" method="post">
                <h1 class="text-center">Sign in</h1>
                <p class="text-muted text-center pb-2">Sign into your <?=$global['site']['name'];?> account.</p>
                <?php if(!empty($alert)){alert($alert[0], $alert[1]);}?>
                <?php if(empty($alert)){globalAlert();} ?>
                <fieldset class="form-group">
                  <div class="input-group mb-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="usernameIcon">@</span>
                    </div>
                    <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="usernameIcon" value="<?=$user;?>" required>
                  </div>
                  <!-- /.input-group -->
                </fieldset>
                <fieldset class="form-group">
                  <div class="input-group mb-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="passwordIcon"><i class="icon-lock"></i></span>
                    </div>
                    <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="passwordIcon" value="" required>
                  </div>
                  <!-- /.input-group -->
                </fieldset>

                <fieldset class="form-group mb-0">
                  <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                </fieldset>

              </form>
            </div>
            <!-- /.card-body p-4 -->

            <div class="card-footer">
              <div class="row">
                <div class="col-12 text-center">
                  <a href="register.php">Create Account</a>
                </div>
                <!-- /.col-12 .text-center -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card mx-1 -->
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row justify-content-center -->
    </div>
    <!-- /.container -->

    <!-- Javacsript and necessary plugins -->
    <script src="assets/plugins/jquery-3.3.1/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap-4.1.0/dist/js/bootstrap.min.js"></script>

  </body>
</html>
