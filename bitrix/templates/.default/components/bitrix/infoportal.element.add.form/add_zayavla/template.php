<?
    if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<?
//    echo "<pre>Template arParams: "; print_r($arParams); echo "</pre>";
//    echo "<pre>Template arResult: "; print_r($arResult); echo "</pre>";
//exit();
?>
<?
    global $SECTION_ID;
    $sections = array(
        "stroitelstvo" => 5,
        "remont" => 6,
        "arkhitektura-i-dizayn" => 7,
        "stroymaterialy" => 8,
    );
?>
<? //=$SECTION_ID?>
<? if (count($arResult["ERRORS"])): ?>
    <?= ShowError(implode("<br />", $arResult["ERRORS"])) ?>
<? endif ?>
<? if (strlen($arResult["MESSAGE"]) > 0): ?>
    <?= ShowNote($arResult["MESSAGE"]) ?>
<? endif ?>

<!--<div class="content">-->
<form class="form_content" name="iblock_add" action="<?=POST_FORM_ACTION_URI?>" method="post"
      enctype="multipart/form-data">
    <?=bitrix_sessid_post()?>
    <?if ($arParams["MAX_FILE_SIZE"] > 0): ?><input type="hidden" name="MAX_FILE_SIZE"
	                                                value="<?=$arParams["MAX_FILE_SIZE"]?>"/>
    <? endif?>
	<table>
		<tr>
			<td><span class="td7"></span>Заголовок заявки<span class="red">*</span>:
			<td>
				<input value="" name="PROPERTY[NAME][0]" type="text"/>
				<input name="PROPERTY[IBLOCK_SECTION][]" type="hidden"
				       value="<?=$SECTION_ID?>"/>
			</td>
		</tr>
		<tr>
			<td><span class="td1"></span>Ваше имя<span class="red">*</span>:<br/>
				(или название организации)
			</td>
			<td>
				<input value="" type="text"/>
			</td>
		</tr>

		<tr>
			<td><span class="td5"></span>Город<span class="red">*</span>:
			<td>
				<input value="" name="PROPERTY[20][0]" type="text"/>
			</td>
		</tr>
		<tr>
			<td><span class="td5"></span>Улица<span class="red">*</span>:
			<td>
				<input value="" name="PROPERTY[19][0]" type="text"/>
			</td>
		</tr>
		<tr>
			<td><span class="td6"></span>Ближайшее метро:<br/>
				(если есть)
			<td>
				<input value="" name="PROPERTY[18][0]" type="text"/>
			</td>
		</tr>
		<tr>
			<td><span class="td8"></span>Описание работ<span class="red">*</span>:<br/>
				(поподробнее)
			<td>
				<textarea name="PROPERTY[PREVIEW_TEXT][0]"></textarea>
			</td>
		</tr>
		<tr>
			<td>
				<span class="td8"></span>Фото объекта
			</td>
			<td>
				<input type="hidden" name="PROPERTY[9][0]">
				<input type="file" name="PROPERTY_FILE_9_0">
			</td>
		</tr>
		<tr>
			<td><span class="td9"></span>Планируемая дата окончания работ:
			<td>
				<input id="date" type="text"/>
			</td>
		</tr>
		<!--            <tr>-->
		<!--                <td><span class="td10"></span>Городской телефон:-->
		<!--                <td>-->
		<!--                    <input type="text"/>-->
		<!--                </td>-->
		<!--            </tr>-->
		<!--            <tr>-->
		<!--                <td><span class="td11"></span>Мобильный телефон<span class="red">*</span>:-->
		<!--                <td>-->
		<!--                    <input type="text"/>-->
		<!--                </td>-->
		<!--            </tr>-->
		<!--            <tr>-->
		<!--                <td><span class="td12"></span>ICQ:-->
		<!--                <td>-->
		<!--                    <input type="text" class="smallwidth"/>-->
		<!--                    <span class="niceCheck"><input type="checkbox" name="ch1"/></span>-->
		<!--                    <span class="novis">Не показывать в профиле</span>-->
		<!--                </td>-->
		<!--            </tr>-->
		<!--            <tr>-->
		<!--                <td><span class="td13"></span>Skype:-->
		<!--                <td>-->
		<!--                    <input type="text" class="smallwidth"/>-->
		<!--                    <span class="niceCheck"><input type="checkbox" name="ch2"/></span>-->
		<!--                    <span class="novis">Не показывать в профиле</span>-->
		<!--                </td>-->
		<!--            </tr>-->
		<!--            <tr>-->
		<!--                <td><span class="td14"></span>E-mail<span class="red">*</span>:-->
		<!--                <td>-->
		<!--                    <input type="text"/>-->
		<!--                </td>-->
		<!--            </tr>-->
		<!--            <tr>-->
		<!--                <td><span class="td15"></span>Логин<span class="red">*</span>:-->
		<!--                <td>-->
		<!--                    <input type="text"/>-->
		<!--                </td>-->
		<!--            </tr>-->
		<!--            <tr>-->
		<!--                <td><span class="td16"></span>Пароль<span class="red">*</span>:-->
		<!--                <td>-->
		<!--                    <input type="text"/>-->
		<!--                </td>-->
		<!--            </tr>-->
		<tr>
			<td><span class="td17"></span>Введите фразу, указанную<br/>
				на картинке
			<td>
            <?$code=$APPLICATION->CaptchaGetCode();?>
            <input type="hidden" name="captcha_sid" value="<?=$code;?>" />
            <input type="text" name="CAPTCHA">
			</td>
		</tr>
		<tr>
			<td>
			<td>

            <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$code;?>" alt="CAPTCHA" />
			</td>
		</tr>
		<tr>
			<td>
			<td>
				<input type="submit" name="iblock_submit" value="Готово"/>
			</td>
		</tr>
	</table>
    <? if (strlen($arParams["LIST_URL"]) > 0): ?><a
		href="<?=$arParams["LIST_URL"]?>"><?=GetMessage("IBLOCK_FORM_BACK")?></a><? endif ?>
</form>
<!--</div>-->






<? if ($arResult["PROPERTY_LIST_FULL"][$propertyID]["USER_TYPE"] == "DateTime"): ?>
<?
    $APPLICATION->IncludeComponent(
        'bitrix:main.calendar',
        '',
        array(
            'FORM_NAME' => 'iblock_add',
            'INPUT_NAME' => "PROPERTY[" . $propertyID . "][" . $i . "]",
            'INPUT_VALUE' => $value,
        ),
        null,
        array('HIDE_ICONS' => 'Y')
    );
    ?>
<br/>
<? endif ?>

