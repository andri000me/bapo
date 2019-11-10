<div class="login-box">

    <h1 class="text-center">Reset Password</h1> <br><br>

	<div class="login-box-body">
		<?php echo $form->open(); ?>
			<?php if (isset($_SESSION['reset_password_error'])) { ?>
                <div class="alert alert-danger" role="alert"><p></p><p><?php echo $_SESSION['reset_password_error'] ?></p><p></p></div>
            <?php } ?>

			<?php echo $form->bs3_text('Username', 'username'); ?>
			<div class="row">
				<div class="col-xs-12">
					<?php echo $form->bs3_submit('Reset Password', 'btn btn-primary'); ?>
				</div>
			</div>
		<?php echo $form->close(); ?>
        <div class="row"> <br>
            <div class="col-xs-12">
                <a href="/admin/login">Login</a>
            </div>
        </div>
	</div>
</div>
