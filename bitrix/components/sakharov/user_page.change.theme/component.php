<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

    if (!CModule::IncludeModule("iblock")) {
        $this->AbortResultCache();
        ShowError("IBLOCK_MODULE_NOT_INSTALLED");
        return false;
    }

    $arFilter = array(
        "IBLOCK_ID" => 6,
        "ACTIVE" => "Y",
        "ACTIVE_DATE" => "Y",
        "CODE" => $_REQUEST['ELEMENT_CODE']
    );

    $rsElement = CIBlockElement::GetList(null, $arFilter)->GetNextElement()->GetProperties();


    $page_user = CUser::GetByID($rsElement['USER']['VALUE'])->Fetch();
    $arResult['USER'] = $page_user;

//    $current_theme = CIblockElement::GetByID($page_user['UF_THEME'])->GetNextElement()->GetProperties();

    $arResult['THEME']['BACKGROUND'] = CFile::GetFileArray($current_theme['BACKGROUND']['VALUE']);
    $arResult['THEME']['H2_COLOR'] = $current_theme['H2_COLOR']['VALUE'];


    $this->IncludeComponentTemplate();

?>