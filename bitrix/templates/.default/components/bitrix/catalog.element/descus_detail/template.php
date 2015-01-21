<?
	$not_show         = array(
			'PHOTO',
			'STATUS',
			'PHONE',
			'USER',
	);
	$access           = $arResult['PROPERTIES']['STATUS']['VALUE'] ? $arResult['PROPERTIES']['STATUS']['VALUE'] : 70;
	$user_access      = $USER->GetByID($USER->GetID())
			->Fetch();
	$user_access      = $user_access['UF_STATUS'] ? $user_access['UF_STATUS']: 70;
	$user_access_name = CIBlockElement::GetByID($user_access)
			->Fetch();
	if (!$USER->GetID()) {
		include('variants/default.php');
	}
	elseif ($USER->GetID() == $arResult['PROPERTIES']['USER']['VALUE']) {
		include('variants/owner.php');
	}
	elseif ($user_access >= $access) {
		include('variants/with_contacts.php');
	}
	elseif ($user_access < $access) {
		include('variants/without_contacts.php');
	}
