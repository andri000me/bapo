<div class="login-box">

    <h1 class="text-center">Silahkan Login</h1> <br><br>

	<div class="login-box-body">
		<?php echo $form->open(); ?>
			<?php echo $form->messages(); ?>
			<?php echo $form->bs3_text('Username', 'username', ENVIRONMENT==='development' ? 'webmaster' : ''); ?>
			<?php echo $form->bs3_password('Password', 'password', ENVIRONMENT==='development' ? 'webmaster' : ''); ?>
			<div class="row">
				<div class="col-xs-4">
					<?php echo $form->bs3_submit('Login', 'btn btn-primary'); ?>
				</div>
			</div>
		<?php echo $form->close(); ?>
        <div class="row"> <br>
            <div class="col-xs-12">
                <a href="/admin/login/forgot-password">Lupa Password</a>
            </div>
        </div>
	</div>
</div>
