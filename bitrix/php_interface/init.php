<?
	include('classes/Section.php');
	include('classes/City.php');
	include('classes/Diclare.php');
	include('classes/User.php');

	AddEventHandler("main", "OnAfterUserAdd", "OnAfterUserRegisterHandler");
	AddEventHandler("main", "OnAfterUserRegister", "OnAfterUserRegisterHandler");

	function OnAfterUserRegisterHandler(&$arFields)
	{
		if (intval($arFields["ID"]) > 0) {
			$toSend              = Array();
			$toSend["PASSWORD"]  = $arFields["PASSWORD_CONFIRM"];
			$toSend["EMAIL"]     = $arFields["EMAIL"];
			$toSend["USER_ID"]   = $arFields["ID"];
			$toSend["USER_IP"]   = $arFields["USER_IP"];
			$toSend["USER_HOST"] = $arFields["USER_HOST"];
			$toSend["LOGIN"]     = $arFields["LOGIN"];
			$toSend["NAME"]      = (trim($arFields["NAME"]) == "") ? $toSend["NAME"] = htmlspecialchars('<Не указано>') : $arFields["NAME"];
			$toSend["LAST_NAME"] = (trim($arFields["LAST_NAME"]) == "") ? $toSend["LAST_NAME"] = htmlspecialchars('<Не указано>') : $arFields["LAST_NAME"];
			CEvent::SendImmediate("USER_INFO", SITE_ID, $toSend);
		}
		return $arFields;
	}

	function GetSectionImage($section_id)
	{
		$section = CIBlockSection::GetByID($section_id)
				->GetNext();
		return $section['PICTURE'];
	}

	function GetUserByEmail($email)
	{
		global $DB;
		$q      = "SELECT * FROM b_user WHERE EMAIL = '{$email}'";
		$result = $DB->Query($q)
				->Fetch();
		return (bool)$result['ID'];
	}