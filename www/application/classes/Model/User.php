<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Расширяем модель, убираем username
 */
class Model_User extends Model_Auth_User {

	public function rules()
	{
		return array(
			'password' => array(
				array('not_empty'),
			),
			'email' => array(
				array('not_empty'),
				array('email'),
				array(array($this, 'unique'), array('email', ':value')),
			),
		);
	}

} // End User Model