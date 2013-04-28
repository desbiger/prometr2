<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

    if ($_POST) {
        $arResult['POST'] = $_POST;
        if ($_FILES['PHOTO']) {
            $save = CFile::SaveFile($_FILES['PHOTO'], 'main');
            $personal_photo = CFile::MakeFileArray(CFile::GetPath($save));
        }
        $arResult['PHOTO'] = $personal_photo;
        $fields = array(
            'NAME' => $_POST['NAME'],
            'LAST_NAME' => $_POST['LAST_NAME'],
            'EMAIL' => $_POST['EMAIL'],
            'PERSONAL_PHOTO' => $personal_photo
        );
        $w_user = new CUser();
        $w_user->Update($USER->GetID(), $fields);

//        -----------------------------------------

        if ($_FILES['master_ava']) {
            $save = CFile::SaveFile($_FILES['master_ava']);
            $personal_photo = CFile::MakeFileArray(CFile::GetPath($save));
        }
        $props = array(
            'RAZDEL' => $_POST['RAZDEL']
        );
        $code = Cutil::translit($_POST['MASTER_NAME'], 'ru');
        $fields = array(
            'IBLOCK_ID' => 6,
            'NAME' => $_POST['MASTER_NAME'],
            'CODE' => $code,
            'DETAIL_TEXT' => $_POST['about_master'],
            'DETAIL_PICTURE' => $personal_photo,
        );
        if ($_POST['master_id'] == '') {
            $fields['PROPERTY_VALUES'] = array(
                'USER' => $_REQUEST['master_user'],
                'RAZDEL' => $_REQUEST['RAZDEL']
            );
            $el = new CIBlockElement();
            $el->add($fields);
        } else {
            $el = new CIBlockElement();
            $el->Update((int)$_POST['master_id'], $fields);
            $el->SetPropertyValues((int)$_POST['master_id'], 6, $_POST['RAZDEL'], "RAZDEL");
        }
    }
    if (!CModule::IncludeModule("iblock")) {
        $this->AbortResultCache();
        ShowError("IBLOCK_MODULE_NOT_INSTALLED");
        return false;
    }
    CModule::IncludeModule('my_module');
    if ($USER->GetID() != '') {
        $arResult['USER'] = my::Fetch(CUser::GetByID($USER->GetID()), true);
        $filter = array(
            'IBLOCK_ID' => 6,
            'PROPERTY_USER' => $USER->GetID(),
        );
        $arResult['USER']['UF_THEME'] = my::Return_array(
            CIBlockElement::GetByID($arResult['USER']['UF_THEME'])
        );
        $master = my::Return_array(CIBlockElement::GetList(null, $filter));
        $arResult['MASTER'] = $master[0];
        if ($master['PROP']['PORTFOLIIO'][0] != '') {
            foreach ($master['PROP']['PORTFOLIIO'] as $key => $portfolio) {
                $files = my::Return_array(CIBlockElement::GetByID($portfolio));
                foreach ($files['PROP']['FILES'] as &$photo) {
                    $photo = array(
                        'ID' => $photo,
                        'SRC' => CFile::GetPath($photo)
                    );
                }
                $arResult['MASTER']['PROP']['PORTFOLIO'][$key] = array(
                    'GALLERY_NAME' => $files['NAME'],
                    'GALLERY' => $files['ID'],
                    'FILES' => $files['PROP']['FILES']
                );
            }
        }

        $filter = array(
            'IBLOCK_ID' => 5,
        );
        $razdels = my::Return_array(CiblockSection::GetList(null, $filter));
        foreach ($razdels as $vol) {
            $razdels_array[$vol['ID']] = $vol['NAME'];
        }
        $arResult['RAZDELS'] = $razdels_array;


        if ($_REQUEST['ACTION'] == 'incoming' || !isset($_REQUEST['ACTION'])) {
            $arResult['MESSAGES'] = my::GetMessages($USER->GetID());
        }elseif($_REQUEST['ACTION'] == 'outgoing'){
            $arResult['MESSAGES'] = my::GetOutMessages($USER->GetID());
        }elseif($_REQUEST['ACTION'] == 'basket'){
            $arResult['MESSAGES'] = my::GetMessages($USER->GetID(),false,false);
        }
        $arResult['MESSAGES_NEW'] = my::GetMessages($USER->GetID(), true);

        $arResult['MESS_COUNT'] = array(
            'IN' => count(my::GetMessages($USER->GetID())),
            'OUT' => count(my::GetOutMessages($USER->GetID())),
            'BASKET' => count(my::GetMessages($USER->GetID(),false,false)),
        );
    }


    $this->IncludeComponentTemplate();

?>