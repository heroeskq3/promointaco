<?php
//Section Parameters
$section_tittle      = "Login";
$section_description = null;
$section_restrict    = 0;
$section_navbar      = 0;
$section_sidebar     = 0;
$section_searchbar   = 0;
$section_style       = 0;
$section_homedir     = '../';
?>
<?php require_once 'header.php';?>
<?php
//LOGIN
if (isset($_POST['password']) && isset($_POST['username'])) {

    $login           = class_login($_POST['username'], $_POST['password']);
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
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <p><img src="<?php echo PATH_RESOURCES."/site/".CONFIG_LOGOHEADER; ?>" alt="" height="30"></p>
                        <form role="form" action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="username" type="text" autofocus value="<?php echo $UserName;?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="<?php echo $Password;?>">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="input" class="btn btn-lg btn-success btn-block">Login</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'footer.php';?>