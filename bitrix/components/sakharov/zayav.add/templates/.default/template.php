<?
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
		die();
	}

	//	var_dump($arResult);
	$email = $arResult['USER']['EMAIL'];
	$name  = $arResult['USER']['NAME'];
	$phone = $arResult['USER']['PERSONAL_PHONE'];
	$phone = $arResult['USER']['PERSONAL_PHONE'];
?>
<!--<pre>--><? //print_r($arResul['USER'])?><!--</pre>-->
<h2>Новая заявка</h2>
<form action = "" method = "post">
	<table class = "new_zayav">
		<tr>
			<td>Ваше имя</td>
			<td><input type = "text" name = "name" value = "<?= $_POST['name'] ?>"/></td>
		</tr>
		<? if (!$arResult['USER']['ID']): ?>
			<tr>
				<td>Элетронная почта</td>
				<td><input type = "text" name = "email" value = "<?= $_POST['email'] ?>"/></td>
			</tr>
		<? endif ?>
		<tr>
			<td>Контактный телефон</td>
			<td><input type = "text" name = "phone" value = "<?= $_POST['phone'] ?>"/></td>
		</tr>
		<tr>
			<td>Город</td>
			<td>
				<select name = "city" id = "">
					<? foreach (City::factory()
							            ->GetList() as $key => $city): ?>
						<option value = "<?= $key ?>"><?= $city ?></option>
					<? endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Раздел</td>
			<td>
				<select name = "section" id = "">
					<? foreach (Section::factory()
							            ->GetList() as $k => $v): ?>
						<option value = "<?= $k ?>"><?= $v ?></option>
					<? endforeach ?>
				</select>
			</td>
		</tr>

		<tr>
			<td>Заголовок заявки</td>
			<td><input type = "text" style = "width: 412px" name = "title"/></td>
		</tr>
		<tr>
			<td>Текст заявки</td>
			<td><textarea name = "text" id = "" style = "width: 412px; height: 200px;"></textarea></td>
		</tr>
		<tr>
			<td>Предположительная стоимость</td>
			<td><input type = "text" name = "price" style = "width: 75px"/> руб.</td>
		</tr>
		<tr>
			<td style = "vertical-align: middle">Фото</td>
			<td>
				<div class = "file_upload"></div>
				<input type = "file" name = "file"/>
			</td>
		</tr>
		<tr>
			<? $code = $APPLICATION->CaptchaGetCode(); ?>
			<td>Введите защитный код

			</td>
			<td>
				<input type = "hidden" name = "captcha_sid" value = "<?= $code; ?>"/>
				<? // Поле для ввода капчи пользователем?>
				<img src = "/bitrix/tools/captcha.php?captcha_sid=<?= $code; ?>" alt = "CAPTCHA" width = "110" height = "33" class =
				"captcha_pic"/>
				<br/>
				<br/>
				<input type = "text" id = "object-20" class = "form-text" name = "captcha_word" value = ""/>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input class = "base_button" type = "submit" value = "Сохранить"/></td>
		</tr>
	</table>
</form>