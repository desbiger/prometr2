<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
	$user             = $USER->GetID();
	$arResult['USER'] = $USER->GetByID($user)
			->Fetch();
	if ($_POST['city']) {
		if ($user = $USER->GetID()) {

			CModule::IncludeModule('iblock');
			$el     = new CIBlockElement();
			$PROPS  = Array(
					'PHONE' => $_POST['phone'],
					'CITY' => $_POST['city'],
					'PRICE' => $_POST['price'],
					'USER' => $user,
					'USER_NAME' => $_POST['name'],
			);
			$fields = array(
					'IBLOCK_ID' => 5,
					'NAME' => $_POST['title'],
					'IBLOCK_SECTION_ID' => $_POST['section'],
					'DETAIL_TEXT' => $_POST['text'],
					'PROPERTY_VALUES' => $PROPS
			);

			if ($id = $el->Add($fields)) {
				$code = Section::factory($_POST['section'])
						->GetSectionCode();
				LocalRedirect('/' . $code . '/' . $id . '/');
			}
			else {
				print_r($el->LAST_ERROR);
			}
		}
		else {
			if (GetUserByEmail($_POST['email'])) {
				echo 'Пользователь с таким email уже зарегистрирован в системе';
			}
			else {

			};
		}
	}


	$this->IncludeComponentTemplate();

?>