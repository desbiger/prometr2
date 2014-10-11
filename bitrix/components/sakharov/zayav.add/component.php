<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
	if ($user = $USER->GetID()) {
		$arResult['USER'] = $USER->GetByID($user)
				->Fetch();
		CModule::IncludeModule('iblock');
		$el = new CIBlockElement();
		$fields = array(
			'NAME' => $_POST['name'],
			'NAME' => $_POST['name'],
			'NAME' => $_POST['name'],
			'NAME' => $_POST['name'],
			'NAME' => $_POST['name'],
		);
	}
	else {
		if (GetUserByEmail($_POST['email'])) {
			echo 'Пользователь с таким email уже зарегистрирован в системе';
		}
		else {

		};
	}

	$this->IncludeComponentTemplate();

?>