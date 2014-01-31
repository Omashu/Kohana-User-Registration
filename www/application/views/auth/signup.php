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
	var signupValidation = (function($) {
		var self = this;

		this.rules = {
			email : ["^.+@.+$","i"],
			password : function(o) {
				var helpBlock = o.parent('.form-group').find('.help-block');
				if (!helpBlock.length)
				{
					helpBlock = $('<div/>').addClass('help-block');
					o.parent('.form-group').append(helpBlock);
				}
				var score = 0;
				var val = o.val();
				var valLen = val.length;
				var upperLen = val.match(new RegExp("[A-ZА-ЯЁ]","g"));
				if (upperLen) score += 2*upperLen.length;
				var lowerLen = val.match(new RegExp("[a-zа-яё]","g"));
				if (lowerLen) score += 2*lowerLen.length;
				var digitLen = val.match(new RegExp("[0-9]","g"));
				if (digitLen) score += 1*digitLen.length;
				var otherLen = val.match(new RegExp("[^\da-z0-9а-яё]","gi"));
				if (otherLen) score += 3*otherLen.length;
				console.log(score);
				// сложность пароля низкая, средняя, сложный
				if ((score > 8 && score < 12) || score < 8 || valLen < 8)
				{
					helpBlock.text('Сложность пароля: низкая');
				} else if (score > 10 && score < 20)
				{
					helpBlock.text('Сложность пароля: средняя');
				} else if (score > 20)
				{
					helpBlock.text('Сложность пароля: высокая');
				}

				return val.match(new RegExp("^.{8,}$", ""))
			},
			password_confirm : function(o) {
				return self.fields['password'].val() === o.val();
			}
		};

		this.button = null;
		this.fields = {};

		this.init = function()
		{
			this.fields['email'] = $('#email');
			this.fields['password'] = $('#password');
			this.fields['password_confirm'] = $('#password_confirm');
			this.button = $('#submit');

			for (var key in this.fields)
			{
				this.fields[key].keyup(function(o) {
					self.validate();
				});
				this.fields[key].change(function(o) {
					self.validate();
				});
			}
		};

		this.validate = function()
		{
			var status = true;
			var fieldStatus;
			for (var key in this.rules)
			{
				fieldStatus = false;
				if (this.fields[key] !== undefined)
				{
					if (typeof this.rules[key] === 'function')
					{
						if (this.rules[key](this.fields[key]))
						{
							fieldStatus = true;
						}
					} else
					{
						if (this.fields[key].val().match(new RegExp(this.rules[key][0],this.rules[key][1]||"")))
						{
							fieldStatus = true;
						}
					}

					if (fieldStatus)
					{
						this.fields[key].parent('.form-group').addClass('has-success').removeClass('has-error');
					} else
					{
						this.fields[key].parent('.form-group').addClass('has-error').removeClass('has-success');
						status = false;
					}
				}
			}

			if (!status)
			{
				self.button.attr('disabled',true);
			} else
			{
				self.button.attr('disabled',false);
			}
		};

		return this;
	}).call(signupValidation || {}, jQuery);

	jQuery(function() {
		signupValidation.init();
	});
</script>

<?= View::factory("footer") ?>