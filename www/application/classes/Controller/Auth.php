<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Auth extends Controller {

	// регистрация пользователя
	public function action_signup()
	{
		if (Auth::instance()->logged_in())
		{
			$this->redirect(URL::site('/'));
		}
		
		$notices = array();
		try
		{
			$user = ORM::factory("User")
				->create_user($_POST, array('email','password'))
				->add('roles', ORM::factory("Role")->where("name","=","login")->find());

			// авторизуемся
			Auth::instance()->force_login($user->email);

			// success
			$this->redirect(URL::site('/'));

		} catch (ORM_Validation_Exception $e)
		{
			$notices['error'] = $e->errors('models');
		}

		$this->response->body(View::factory("auth/signup", array('notices'=>$notices)));
	}

} // End Auth
