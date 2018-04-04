<?php
if (isset($_POST['password']) && isset($_POST['username'])) {

    $login = class_login($_POST['username'], $_POST['password']);

    $row_login       = $login['response'][0];
    $login_totalRows = $login['rows'];

    if ($login_totalRows) {

        if (!session_id()) {
            session_start();
        }

        $_SESSION['UserId'] = $row_login['Id'];

        header('Location: index.php');
        die();
    } else {
        $error = "login_failed";
    }
}
?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo LANG_PLEASESIGNIN; ?></h3>
                    </div>
                    <div class="panel-body">
                        <center>
                        <p>
                            <img src="<?php echo PATH_RESOURCES . '/logos/' . CONFIG_LOGOHEADER2; ?>" alt="">
                        </p>
                        </center>
                        <form role="form" action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="<?php echo LANG_USERNAME; ?>" name="username" type="text" autofocus value="<?php echo $UserName; ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="<?php echo LANG_PASSWORD; ?>" name="password" type="password" value="<?php echo $Password; ?>">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me"><?php echo LANG_REMEMBERME; ?>
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="input" class="btn btn-lg btn-primary btn-block"><?php echo LANG_LOGINENTER; ?></a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>