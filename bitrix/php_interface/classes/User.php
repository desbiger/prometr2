<?

	class User
	{
		static function Register($email,$pass)
		{
			$USER = new CUser;
			return $USER->add(array(
							'LOGIN' => $email,
							'EMAIL' => $email,
							'PASSWORD' => $pass,
							'PASSWORD_CONFIRM' => $pass
					));
		}

		static function GenPass()
		{
			return randString(8, array(
//					"abcdefghijklnmopqrstuvwxyz",
//					"ABCDEFGHIJKLNMOPQRSTUVWXYZ",
					"0123456789",
			));
		}
	}
 