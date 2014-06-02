<?= View::factory("header") ?>

<?= Form::open(null, array('role'=>'form')) ?>
	<div class="form-group">
		<label for="email">Email:</label>
		<?= Form::input('email', Arr::get($_POST, 'email'), array('type' => 'email', 'class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email address')) ?>
		<?php if (isset($notices['error']['email'])): ?>
		<div class="help-block"><?php echo $notices['error']['email'] ?></div>
		<?php endif ?>
	</div>
	<div class="form-group">
		<label for="password">Password:</label>
		<?= Form::input('password', Arr::get($_POST, 'password'), array('type' => 'password', 'class' => 'form-control', 'id' => 'password', 'placeholder' => '*****')) ?>
		<?php if (isset($notices['error']['_external']['password'])): ?>
		<div class="help-block"><?php echo $notices['error']['_external']['password'] ?></div>
		<?php endif ?>
	</div>
	<div class="form-group">
		<label for="password_confirm">Password confirm:</label>
		<?= Form::input('password_confirm', Arr::get($_POST, 'password_confirm'), array('type' => 'password', 'class' => 'form-control', 'id' => 'password_confirm', 'placeholder' => '*****')) ?>
		<?php if (isset($notices['error']['_external']['password_confirm'])): ?>
		<div class="help-block"><?php echo $notices['error']['_external']['password_confirm'] ?></div>
		<?php endif ?>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary" id="submit">Submit</button>
	</div>
<?= Form::close() ?>

<script>
	jQuery(function() {
		signupValidation.init();
	});
</script>

<?= View::factory("footer") ?>