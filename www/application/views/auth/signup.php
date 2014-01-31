<?= View::factory("header") ?>

<?= Form::open(null, array('role'=>'form')) ?>
	<div class="form-group">
		<label for="email">Email:</label>
		<input type="email" class="form-control" id="email" name="email" placeholder="Email address">
		<?php if (isset($notices['error']['email'])): ?>
		<div class="help-block"><?php echo $notices['error']['email'] ?></div>
		<?php endif ?>
	</div>
	<div class="form-group">
		<label for="password">Password:</label>
		<input type="password" class="form-control" id="password" name="password" placeholder="*****">
		<?php if (isset($notices['error']['_external']['password'])): ?>
		<div class="help-block"><?php echo $notices['error']['_external']['password'] ?></div>
		<?php endif ?>
	</div>
	<div class="form-group">
		<label for="password_confirm">Password confirm:</label>
		<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="*****">
		<?php if (isset($notices['error']['_external']['password_confirm'])): ?>
		<div class="help-block"><?php echo $notices['error']['_external']['password_confirm'] ?></div>
		<?php endif ?>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
<?= Form::close() ?>

<?= View::factory("footer") ?>