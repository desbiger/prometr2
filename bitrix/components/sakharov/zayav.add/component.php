<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
	$user             = $USER->GetID();
	$arResult['USER'] = $USER->GetByID($user)
			->Fetch();
	if ($_POST['city']) {
		if ($user = $USER->GetID()) {
			Diclare::init()
					->Add($user);
		}
		else {
			if (GetUserByEmail($_POST['email'])) {
				echo 'Пользователь с таким email уже зарегистрирован в системе. Авторизируйтесь на сайте, или выбитрите другой emil адрес';
			}
			else {
				$pass = User::GenPass();
				if($new_user = User::Register($_POST['email'],$pass)){
					$USER->Login($_POST['email'],$pass);
					$arResult['ERRORS'] = Diclare::init()->Add($new_user);
				};
			};
		}
	}


	$this->IncludeComponentTemplate();

?>