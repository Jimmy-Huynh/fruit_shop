<link href="<?php echo SITE_ROOT;?>public/css/signin.css" rel="stylesheet">

<div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">
        <div class="account-wall">
            <img class="profile-img" src="<?php echo SITE_ROOT;?>public/img/avatar.png"
                 alt="">
            <form class="form-signin" method="POST" action="Login/Login">
                <input name="user" type="text" class="form-control input-sm" placeholder="Email" required autofocus>
                <input name="pass" type="password" class="form-control input-sm" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Sign in</button>
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Remember me
                </label>
                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
            </form>
        </div>
        <a href="<?php echo SITE_ROOT;?>SignUp" class="text-center new-account">Create an account </a>
    </div>
</div>
