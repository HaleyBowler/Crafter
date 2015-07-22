<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>" />
</head>

<body>
    <div id="login_form">
        <form action="<?=site_url('user/login')?>" method="post">
            <label for="email">Email</label>
            <input type="text" name="l_email" value="<?=set_value('l_email') ?>" />
            <label for="password">Password</label>
            <input type="password" name="l_pass"/>
            <input type="submit" value="Sign in" name="signin"/>
        </form>
    </div>
    <div id="content" class="container">
        <div id="register_form">
            <h1>Sign Up</h1>
            <form action="<?=site_url('user/do_register')?>" method="post">
                <div class="form-group">
                <label for="username">User Name</label>
                <input type="text" class="form-control" name="username" value="<?=set_value('username') ?>"/>
                </div>
                <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" value="<?=set_value('email') ?>" />
                </div>
                <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password"/>
                </div>
                <input type="submit" class="btn btn-default" value="Sign up" name="register"/>
                </div>
            </form>
        </div>
        <br />
        <div class="error">
            <?php echo validation_errors(); ?>
        </div>
    </div>