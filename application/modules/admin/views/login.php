<div class="login-box">

    <h1 class="text-center">Silahkan Login</h1> <br><br>

	<div class="login-box-body">
		<?php echo $form->open(); ?>
			<?php echo $form->messages(); ?>
			<?php echo $form->bs3_text('Username', 'username', ENVIRONMENT==='development' ? 'webmaster' : ''); ?>
			<?php echo $form->bs3_password('Password', 'password', ENVIRONMENT==='development' ? 'webmaster' : ''); ?>
			<div class="row">
<!--				<div class="col-xs-8">-->
<!--					<div class="checkbox">-->
<!--						<label><input type="checkbox" name="remember"> Remember Me</label>-->
<!--					</div>-->
<!--				</div>-->
				<div class="col-xs-4">
					<?php echo $form->bs3_submit('Login', 'btn btn-primary'); ?>
				</div>
			</div>
		<?php echo $form->close(); ?>
	</div>

</div>