<?php include 'header.php'; ?>

    <div id="content" class="container">
        <div id="register_form">
            <h1>Sign Up</h1>
            <form action="<?=site_url('user/do_register')?>" method="post">
                <label for="username">User Name</label>
                <input type="text" name="username" value="<?=set_value('username') ?>"/>
                <label for="email">Email</label>
                <input type="text" name="email" value="<?=set_value('email') ?>" />
                <label for="password">Password</label>
                <input type="password" name="password"/>
                <input type="submit" value="Sign up" name="register"/>
            </form>
        </div>
        <br />
        <div class="error">
            <?php echo validation_errors(); ?>
        </div>
    </div>

<?php include 'footer.php'; ?>