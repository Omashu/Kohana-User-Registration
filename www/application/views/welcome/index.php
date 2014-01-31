<?= View::factory("header") ?>

<?php if (Auth::instance()->logged_in()): ?>
	<?php $explode=explode("@", Auth::instance()->get_user()->email); ?>
	<div class="well">Hello, <?php echo array_shift($explode) ?>!</div>
<?php else: ?>
	<div class="well">Hello, World!</div>
<?php endif; ?>

<?= View::factory("footer") ?>