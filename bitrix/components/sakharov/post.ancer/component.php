<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

	if (!CModule::IncludeModule("iblock")) {
		$this->AbortResultCache();
		ShowError("IBLOCK_MODULE_NOT_INSTALLED");
		return false;
	}

	//    --------------------------------------------------------------------------------
	if (isset($_REQUEST['ancer_text']) && $USER->GetLogin() != '' && strlen($_REQUEST['ancer_text']) > 0) {
		$VALUES = array(
			"NAME" => "123",
			"IBLOCK_ID" => $arParams['IBLOCK_ID'],
			"PREVIEW_TEXT" => $_REQUEST['ancer_text'],
			"PROPERTY_VALUES" => array(
				"EXT_ID" => $_REQUEST['ELEMENT_ID']
			)
		);
		$el     = new CIBlockElement();
		if ($el->add($VALUES)) {
			LocalRedirect($_REQUEST['backUrl']);
		}
		;
	}
	//    --------------------------------------------------------------------------------


	CPageOption::SetOptionString("main", "nav_page_in_session", "N");

	if ($arParams["IBLOCK_ID"] < 1) {
		ShowError("IBLOCK_ID IS NOT DEFINED");
		return false;
	}

	if (!isset($arParams["ITEMS_LIMIT"])) {
		$arParams["ITEMS_LIMIT"] = 10;
	}

	$arNavParams = array();

	if ($arParams["ITEMS_LIMIT"] > 0) {
		$arNavParams = array(
			"nPageSize" => $arParams["ITEMS_LIMIT"],
		);
	}

	$arNavigation = CDBResult::GetNavParams($arNavParams);


	$arSort   = array(
		"SORT" => "ASC",
		"ID" => "ASC"
	);
	$arFilter = array(
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"ACTIVE" => "Y",
		"ACTIVE_DATE" => "Y",
		"PROPERTY_" . $arParams['PROPERTY_CODE'] => $arParams['ELEMENT_ID_CONNECT']
	);
	//    $arSelect = array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM", "PREVIEW_TEXT", "PREVIEW_PICTURE");

	$rsElement = CIBlockElement::GetList($arSort, $arFilter, false, $arNavParams);

	if ($arParams["DETAIL_URL"]) {
		$rsElement->SetUrlTemplates($arParams["DETAIL_URL"]);
	}

	while ($obElement = $rsElement->GetNextElement()) {

		$Element   = $obElement->GetFields();
		$user      = CUser::GetByID($Element['CREATED_BY'])
				->Fetch();
		$filter    = array(
			'IBLOCK_ID' => 6,
			'PROPERTY_USER' => $user['ID']
		);
		$tt        = CIBlockElement::GetList(null, $filter)
				->Fetch();
		$arElement = array(
			'NAME' => $Element['NAME'],
			'DATE_CREATE' => $Element['DATE_CREATE'],
			'PREVIEW_TEXT' => $Element['PREVIEW_TEXT'],
			'USER' => array(
				'NAME' => $user['NAME'],
				'LOGIN' => $user['LOGIN'],
				'ID' => $user['ID'],
				'PAGE_URL' => '/masters/' . $tt['CODE'] . '/'
			),

		);

		$arResult["ITEMS"][] = $arElement;
	}

	$arResult["NAV_STRING"] = $rsElement->GetPageNavStringEx($navComponentObject, "��������", "", "");

	$this->IncludeComponentTemplate();

?>