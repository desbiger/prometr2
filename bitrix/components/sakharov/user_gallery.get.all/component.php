<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

    if (!CModule::IncludeModule("iblock")) {
        $this->AbortResultCache();
        ShowError("IBLOCK_MODULE_NOT_INSTALLED");
        return false;
    }
    if (!function_exists('get_array')) {
        function get_array($object, $fields = null, $vol_only = true)
        {
            while ($t = $object->GetNextElement()) {
                $res = $t->GetFields();
                if (is_array($fields)) {
                    $temp = $res;
                    $res = array();
                    foreach ($fields as $vol) {
                        $res[$vol] = $temp[$vol];
                    }
                }
                $res['PROPERTIES'] = $t->GetProperties();
                if ($vol_only) {
                    foreach ($res['PROPERTIES'] as $key => &$val) {
                        $prop = $val;
                        $val = array();
                        $val['~VALUE'] = $prop['VALUE'];

                        if (
                            $key == 'FILES' &&
                            count($val) > 0
                        ) {
                            foreach ($val['~VALUE'] as $value) {
                                $val['VALUE'][] = CFile::GetPath($value);
                            }
                        }
                    }
                }
                $result[] = $res;
            }
            return $result;
        }

    }
    if($arParams['USER'] != ''){
        $dopFilter = $arParams['USER'];
    }else{
        $dopFilter = array();
    }
    $arFilter = array(
        "IBLOCK_ID" => $arParams['IBLOCK_ID'],
        "ACTIVE" => "Y",
        "ACTIVE_DATE" => "Y",
    );
    $arFilter = array_merge($dopFilter,$arFilter);
    $arResult = array();
    $arResult['arFilter'] = $arFilter;
    $arResult['USER'] = $arParams['USER'];
    $arResult['ITEMS'] = get_array(CIBlockElement::GetList(null, $arFilter), array('NAME', 'ID'));

    $cur_user = CUser::GetByID($USER->GetID())->Fetch();
    $arResult['CurenUser'] = $cur_user;

    $this->IncludeComponentTemplate();

?>